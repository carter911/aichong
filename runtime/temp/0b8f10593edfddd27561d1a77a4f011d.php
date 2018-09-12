<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:97:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/forum_index.html";i:1522244548;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LaySNS后台管理模板</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/main.css" media="all" /> 
<link rel="stylesheet" href="__ADMIN__/css/form.css"> 

    <!--[if lt IE 9]>
    <script src="__CSS__/html5shiv.min.js"></script>
    <script src="__CSS__/respond.min.js"></script>
    <![endif]-->
    <script src="__ADMIN__/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
</head>

<body>

    <!--主体-->
    <div style="margin-bottom:36px;">

        
<div class="admin-main layui-form">
    <div class="layui-field-box">
        <div class="layui-box-searchber" style="overflow: visible">
            <button class="layui-btn layui-btn-sm" data-url="<?php echo url('admin/forum/alldelete'); ?>" lay-submit lay-filter="alldelete">删除选中</button>
            <form class="layui-form-pane" action="<?php echo url('admin/forum/index'); ?>" method="get">

                <div class="layui-form">
                    <div class="layui-inline" style="width:100px">
                        <select name="tid" lay-filter="selecttid">
                                <option value="">栏目分类</option>
                           
                                <?php if(is_array($category_level_list) || $category_level_list instanceof \think\Collection || $category_level_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_level_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option <?php if($tid == $vo['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php if($vo['level'] != '1'): ?>|<?php for($i=1;$i<$vo['level'];$i++){echo ' --';} endif; ?><?php echo $vo['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                              </select>
                    </div>
                    <div class="layui-inline" style="width:100px">
                        <select name="open" lay-filter="selectopen">
                                <option  value="">状态</option>
                                <option <?php if($open == '0'): ?>selected="selected"<?php endif; ?> value="0">隐藏</option>
                                <option <?php if($open == 1): ?>selected="selected"<?php endif; ?> value="1">显示</option>
                              </select>
                    </div>
                    <div class="layui-inline" style="width:100px">
                        <input type="text" placeholder="开始日期" value="<?php echo $startdate; ?>" name="startdate" class="layui-input" id="startdate">
                    </div>
                    <div class="layui-inline" style="width:100px">
                        <input type="text" placeholder="结束日期" value="<?php echo $enddate; ?>" name="enddate" class="layui-input" id="enddate">
                    </div>
                    <div class="layui-inline" style="width:100px">
                        <select name="settop" lay-filter="selectopen">
                                <option  value="">是否置顶</option>
                                <option <?php if($settop == 1): ?>selected="selected"<?php endif; ?> value="1">置顶</option>
                                <option <?php if($settop == '0'): ?>selected="selected"<?php endif; ?> value="0">普通</option>
                              </select>
                    </div>
                    <div class="layui-inline" style="width:100px">
                        <select name="choice" lay-filter="selectopen">
                                <option  value="">是否精选</option>
                                <option <?php if($choice == 1): ?>selected="selected"<?php endif; ?> value="1">精选</option>
                                <option <?php if($choice == '0'): ?>selected="selected"<?php endif; ?> value="0">一般</option>
                              </select>
                    </div>
                    <div class="layui-inline" style="width:100px">
                        <select name="memo" lay-filter="selectmemo">
                                <option  value="">是否备忘</option>
                                <option <?php if($memo == 1): ?>selected="selected"<?php endif; ?> value="1">备忘</option>
                                <option <?php if($memo == '0'): ?>selected="selected"<?php endif; ?> value="0">平常</option>
                              </select>
                    </div>

                    <div class="layui-inline" style="width:100px">
                        <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="关键词" class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">每页条数</label>
                        <div class="layui-inline" style="width:50px"><input type="number" name="perpage" value="<?php echo $perpage; ?>" title placeholder="每页条数" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn  layui-btn-sm">搜索</button>
                    </div>
                </div>



            </form>
        </div>
        <hr>

        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th width="5%" align="center"><input type="checkbox" name="checkAll" lay-filter="checkAll"></th>
                    <th width="5%" align="center">ID</th>
                    <th align="center">帖子标题</th>
                    <th width="60px" style="text-align:center">作者</th>
                    <th width="60px" align="center">是否显示</th>
                    <th width="60px" align="center">是否顶置</th>
                    <th width="60px" align="center">是否精选</th>
                    <th width="60px" align="center">设置备忘</th>
                    <th width="70px" style="text-align:center">所属栏目</th>
                    <th width="80px" style="text-align:center">更新时间</th>
                    <th width="170px" style="text-align:center">操作</th>
                </tr>
            </thead>
            <tbody id="content">
                <?php if(is_array($user_list) || $user_list instanceof \think\Collection || $user_list instanceof \think\Paginator): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td align="center"><input type="checkbox" name="ids[<?php echo $vo['id']; ?>]" lay-filter="checkOne" value="<?php echo $vo['id']; ?>"></td>
                    <td align="center"><?php echo $vo['id']; ?></td>
                    <td style="padding-left: 20px;"><a target="_blank" href=" <?php echo routerurl('bbs/index/thread',array('id'=>$vo['id'])); ?>"><?php echo $vo['title']; ?></a></td>
                    <td align="center"><?php echo $vo['username']; ?></td>
                    <td align="center">
                        <input type="checkbox" name="show" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchopen" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'open']==1 ? 'checked' : ''; ?>>
                    </td>
                    <td align="center">
                        <input type="checkbox" name="show" lay-skin="switch" lay-text="置顶|置顶" lay-filter="switchsettop" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'settop']==1 ? 'checked' : ''; ?>>
                    </td>
                    <td align="center">
                        <input type="checkbox" name="show" lay-skin="switch" lay-text="精选|精选" lay-filter="switchchoice" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'choice']==1 ? 'checked' : ''; ?>>
                    </td>
                    <td align="center">
                        <input type="checkbox" name="memo" lay-skin="switch" lay-text="备忘|备忘" lay-filter="switchmemo" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'memo']==1 ? 'checked' : ''; ?>>
                    </td>
                    <td align="center"><a target="_blank" href="<?php echo url('bbs/index/cate',array('cate_alias'=>$vo['alias'])); ?>"><?php echo $vo['name']; ?></a></td>
                    <td align="center"><?php echo friendlyDate($vo['time']); ?></td>
                    <td align="center">
                        <button class="layui-btn layui-btn-danger layui-btn-sm <?php if($vo['open'] != 1): ?>layui-btn-disabled<?php endif; ?> reward" data-uid="<?php echo $vo['uid']; ?>" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('articles/edit',array('id'=>$vo['uid'])); ?>" <?php if($vo['open'] != 1): ?>disabled="disabled" <?php endif; ?> title="奖励作者积分">奖励</button>

                        <a class="layui-btn layui-btn-normal layui-btn-sm" href="<?php echo url('forum/edit',array('id'=>$vo['id'])); ?>">修改</a>
                        <a class="elementdel layui-btn layui-btn-danger layui-btn-sm" href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/forum/delete',array('id'=>$vo['id'])); ?>" title="删除">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>


</div>

    </div>

    
<div class="btable-paged">
    <div class="layui-main">
        <?php echo $user_list->render(); ?>
    </div>
</div>


    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>

    <!--页面JS脚本-->
    

<script>
    layui.use(['form', 'laydate'], function() {
        var form = layui.form,
            laydate = layui.laydate,
            $form = $('form'),
            jq = layui.jquery;
        form.on('select()', function(data) {
            $form.submit();
        });

        laydate.render({
            elem: '#startdate' //指定元素
                ,
            done: function(value, date) {
                $form.submit();
            }
        });
        laydate.render({
            elem: '#enddate' //指定元素
                ,
            done: function(value, date) {
                $form.submit();
            }
        });
        var status = 0;
        form.on('switch(switchopen)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/forum/toggle'); ?>?id=" + data.value + '&status=' + status + '&name=open';


            jq.get(url, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 2,
                        anim: 6,
                        time: 1000
                    });
                }
            });
            return false;
        });

        form.on('switch(switchchoice)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/forum/toggle'); ?>?id=" + data.value + '&status=' + status + '&name=choice';


            jq.get(url, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        //  location.reload();
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 2,
                        anim: 6,
                        time: 1000
                    });
                }
            });
            return false;
        });
        form.on('switch(switchsettop)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/forum/toggle'); ?>?id=" + data.value + '&status=' + status + '&name=settop';


            jq.get(url, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        //  location.reload();
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 2,
                        anim: 6,
                        time: 1000
                    });
                }
            });
            return false;
        });
        form.on('switch(switchmemo)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/forum/toggle'); ?>?id=" + data.value + '&status=' + status + '&name=memo';


            jq.get(url, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        //  location.reload();
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 2,
                        anim: 6,
                        time: 1000
                    });
                }
            });
            return false;
        });
        $(".reward").on('click', function() {
            var author = $(this).parent().parent().find("td").eq(3).text();
            var fid = $(this).data('id');
            var uid = $(this).data('uid');
            layer.prompt({
                title: '奖励作者' + author
            }, function(val, index) {
                var ival = parseInt(val);
                var url = "<?php echo url('admin/point_note/reward'); ?>";
                if (!isNaN(ival)) {

                    jq.post(url, {
                            type: 'rewardForumAuthor',
                            score: $.trim(val),
                            fid: fid,
                            uid: uid
                        },
                        function(data) {

                            if (data.code == 200) {

                                layer.msg(data.msg, {
                                    icon: 1,
                                    time: 1000
                                }, function() {
                                    //  location.reload();
                                });
                            } else {

                                layer.msg(data.msg, {
                                    icon: 2,
                                    anim: 6,
                                    time: 1000
                                });
                            }
                            layer.close(index);
                        });
                } else {
                    layer.msg(val + "不是数字");

                }
            });

        });


    })
</script>

</body>

</html>