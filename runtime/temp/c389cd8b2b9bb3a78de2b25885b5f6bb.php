<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:98:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/addons_index.html";i:1522721106;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">本地插件</li>
                <li><a href="<?php echo url('addons/online'); ?>">在线插件</a></li>
            </ul>
        </div>

        <?php if($list == 0): ?>
        <blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">还未有任何插件</blockquote>
        <?php else: ?>

        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th width="100">名称</th>
                    <th>标识</th>
                    <th width="400">描述</th>
                    <th width="50">状态</th>
                    <th>作者</th>
                    <th width="50">版本</th>
                    <th width="200">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                <tr>
                    <td><?php echo $vo['title']; ?></td>
                    <td><?php echo $vo['name']; ?></td>
                    <td><?php echo $vo['description']; ?></td>
                    <td><?php echo (isset($vo['status_text']) && ($vo['status_text'] !== '')?$vo['status_text']:"未安装"); ?></td>
                    <td><a target="_blank" href="<?php echo (isset($vo['url']) && ($vo['url'] !== '')?$vo['url']:'http://www.laysns.com'); ?>"><?php echo $vo['author']; ?></a></td>
                    <td><?php echo $vo['version']; ?></td>
                    <td>
                        <?php if($vo['uninstall'] == '0'): if($vo['config'] != 'null'): ?>
                        <a class="layui-btn layui-btn-normal layui-btn-sm" href="<?php echo url('addons/config',array('id'=>$vo['id'])); ?>"> <span class="button-content"> 设置</span></a>
                        <?php endif; ?>


                        <a class="layui-btn layui-btn-danger layui-btn-sm caozuo" href="javascript:;" data-adminlist="<?php echo $vo['has_adminlist']; ?>" data-uurl="<?php echo url('addons/adminlist',array('name'=>$vo['name'])); ?>" data-url="<?php echo url('addons/uninstall',array('id'=>$vo['id'])); ?>" zs-name="<?php echo $vo['name']; ?>">
                            <span class="button-content"> 卸载</span></a>

                        <?php else: ?>
                        <a class="layui-btn layui-btn-success layui-btn-sm  caozuo" href="javascript:;" data-adminlist="<?php echo $vo['has_adminlist']; ?>" data-uurl="<?php echo url('addons/adminlist',array('name'=>$vo['name'])); ?>" data-url="<?php echo url('addons/install',array('addon_name'=>$vo['name'])); ?>">
                            <span class="button-content"> 安装</span></a>
                        <a class="layui-btn layui-btn-warm layui-btn-sm  caozuo" href="javascript:;" data-adminlist="<?php echo $vo['has_adminlist']; ?>" data-uurl="<?php echo url('addons/adminlist',array('name'=>$vo['name'])); ?>" data-url="<?php echo url('addons/deladdon',array('addon_name'=>$vo['name'])); ?>">
                            <span class="button-content"> 删除</span></a>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <?php endif; ?>

    </div>


</div>

    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
    <!--页面JS脚本-->
    
<script>
    layui.use(['layer', 'jquery', 'form'], function() {
        var layer = layui.layer,
            form = layui.form,
            jq = layui.jquery;

        jq('.caozuo').click(function() {
            var url = jq(this).data('url');
            jq.getJSON(url, function(data) {


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
            });
        });



    });
</script>

</body>

</html>