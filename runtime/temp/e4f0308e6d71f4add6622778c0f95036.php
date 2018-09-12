<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:103:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/articlecate_index.html";i:1523465838;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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
        <a href="<?php echo url('admin/articlecate/add'); ?>" class="layui-btn layui-btn-sm" id="add">
            <i class="layui-icon">&#xe608;</i> 添加栏目
        </a>

        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th width="5%" align="center">ID</th>
                    <th width="20%" align="center">栏目名称</th>
                    <th width="10%" align="center">首页文字展示</th>
                    <th width="10%" align="center">首页图片展示</th>
                    <th width="15%" align="center">基本操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($category_level_list) || $category_level_list instanceof \think\Collection || $category_level_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_level_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td align="center"><?php echo $vo['id']; ?></td>
                    <td style="padding-left: 20px;"><?php if($vo['level'] != '1'): ?>|<?php for($i=1;$i
                        <$vo[ 'level'];$i++){echo ' --';} endif; ?> <?php echo $vo['name']; ?></td>
                            <td align="center">

                                <input type="checkbox" name="textshow" lay-skin="switch" lay-text="展示|隐藏" lay-filter="switchtextshow" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'hometextshow']==1 ? 'checked' : ''; ?>>
                            </td>
                            <td align="center">

                                <input type="checkbox" name="picshow" lay-skin="switch" lay-text="展示|隐藏" lay-filter="switchpicshow" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'homepicshow']==1 ? 'checked' : ''; ?>>
                            </td>
                            <td align="center">
                                <a class="layui-btn layui-btn-normal layui-btn-sm" href="<?php echo url('admin/articlecate/edit',array('id'=>$vo['id'])); ?>">修改</a>
                                <a href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/articlecate/delete',array('id'=>$vo['id'])); ?>" data-opt="del" class="elementdel layui-btn layui-btn-danger layui-btn-sm ajax-delete">删除</a>
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


        //jq('.btable-paged').eq(1).hide();
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
            var url = "<?php echo url('admin/articlecate/updatestatus'); ?>?id=" + data.value + '&status=' + status + '&name=sidebar';


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
        var status = 0;
        form.on('switch(switchtextshow)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/articlecate/updatestatus'); ?>?id=" + data.value + '&status=' + status + '&name=hometextshow';


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
        form.on('switch(switchpicshow)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/articlecate/updatestatus'); ?>?id=" + data.value + '&status=' + status + '&name=homepicshow';
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
    })
</script>

</body>

</html>