<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:101:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/forumcate_index.html";i:1523466302;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LaySNS后台管理模板</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/main.css" media="all" /> 

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

        
<div class="admin-main">
    <div class="layui-field-box layui-form">
        <a href="<?php echo url('admin/forumcate/add'); ?>" class="layui-btn layui-btn-sm" id="add">
            <i class="layui-icon">&#xe608;</i> 添加板块
        </a>
        <a href="javascript:;" data-id='0' data-uids="<?php echo $superbanzhu; ?>" class="layui-btn layui-btn-sm banzhu">
            <i class="layui-icon">&#xe608;</i> 设置超级版主
        </a>
        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th width="5%" align="center">ID</th>
                    <th align="center">板块名称</th>
                    <th width="10%" align="center">是否显示</th>
                    <th width="10%" align="center">板块图片</th>
                    <th width="20%" align="center">板块连接</th>
                    <th width="10%" align="center">版主</th>
                    <th width="200" align="center">基本操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($category_level_list) || $category_level_list instanceof \think\Collection || $category_level_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_level_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td align="center"><?php echo $vo['id']; ?></td>
                    <td style="padding-left: 20px;"><a target="_blank" href="<?php echo url('bbs/index/view',array('cate_alias'=>$vo['alias'])); ?>"><?php if($vo['level'] != '1'): ?>|<?php for($i=1;$i<$vo['level'];$i++){echo ' --';} endif; ?> <?php echo $vo['name']; ?></a></td>
                    <td align="center">

                        <input type="checkbox" name="show" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchshow" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'show']==1 ? 'checked' : ''; ?>>
                    </td>

                    <td align="center"><?php if($vo['pic'] != ''): ?><img style="border: 1px solid #CDCDCD;padding: 3px;border-radius: 2px;" src="__ROOT__<?php echo $vo['pic']; ?>" height="25"><?php else: ?>暂无图片<?php endif; ?></td>
                    <td style="padding-left: 20px;"><?php echo url('bbs/index/view',array('cate_alias'=>$vo['alias'])); ?></td>
                    <td align="center"><?php echo $vo['bauzhu']; ?></td>
                    <td align="left">
                        <a class="layui-btn layui-btn-normal layui-btn-sm" href="<?php echo url('forumcate/edit',array('id'=>$vo['id'])); ?>">修改</a>
                        <a href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/forumcate/delete',array('id'=>$vo['id'])); ?>" data-opt="del" class="elementdel layui-btn layui-btn-danger layui-btn-sm ajax-delete">删除</a> <?php if($vo['tid'] == 0): ?><a class="layui-btn layui-btn-sm banzhu"
                            href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-uids="<?php echo $vo['uids']; ?>">设置版主</a><?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>

    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>

    <!--页面JS脚本-->
    
<script>
    layui.use(['form'], function() {
        var form = layui.form,
            jq = layui.jquery;
        var status = 0;
        form.on('switch(switchTest)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/forumcate/updatestatus'); ?>?id=" + data.value + '&status=' + status + '&name=sidebar';


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
        var status = 0;
        form.on('switch(switchshow)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/forumcate/updatestatus'); ?>?id=" + data.value + '&status=' + status + '&name=show';


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

        jq('.banzhu').on('click', function() {
            var cid = jq(this).data('id');
            var olduids = jq(this).data('uids');
            var url = "<?php echo url('forumcate/setbanzhu'); ?>";
            layer.prompt({
                title: '请输入用户ID,多个请用英文逗号分隔',
                value: olduids
            }, function(uids, index) {

                jq.post(url, {
                    cid: cid,
                    uids: uids
                }, function(data) {

                    if (data.code == 200) {

                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        }, function() {
                            location.reload();
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
            });
        })
    })
</script>

</body>

</html>