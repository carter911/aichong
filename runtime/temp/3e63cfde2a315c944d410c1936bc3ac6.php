<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/Users/zhongwu/Downloads/aichong/application/admin/view/index_home.html";i:1536731504;s:65:"/Users/zhongwu/Downloads/aichong/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<div class="tpt—index fly-panel fly-panel-user">
    <blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">欢迎使用爱宠社区综合系统 <span style="color:#FF5722;"><?php echo $shouquanname; ?></span></blockquote>
    <blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">系统信息：</blockquote>
    <table width="100%">
        <tr>
            <td width="110px">程序版本</td>
            <td>爱宠社区综合系统</td>
        </tr>
        <tr>
            <td>服务器类型</td>
            <td><?php echo php_uname('s'); ?></td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td><?php echo PHP_VERSION; ?></td>
        </tr>
        <tr>
            <td>Zend版本</td>
            <td><?php echo Zend_Version(); ?></td>
        </tr>
        <tr>
            <td>服务器解译引擎</td>
            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
        </tr>
        <tr>
            <td>服务器语言</td>
            <td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td>
        </tr>
        <tr>
            <td>服务器Web端口</td>
            <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
        </tr>
        <tr>
            <td>服务器上传文件大小限制</td>
            <td>upload_max_files：<?php echo ini_get('post_max_size'); ?> / post_max_size：<?php echo ini_get('upload_max_filesize'); ?></td>
        </tr>
    </table>
    <blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">开发团队：</blockquote>
    <table width="100%">
        <tr>
            <td width="110px">版权所有</td>
            <td>爱宠社区</td>
        </tr>
    </table>
</div>

    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
    <!--页面JS脚本-->
    
<script>
    layui.use(['layer', 'jquery'], function() {
        var jq = layui.jquery;

        jq('#hiddenbq').on('click', function() {
            var url = jq(this).data('url');
            var loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            jq.getJSON(url, function(data) {
                layer.close(loading);

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
        jq('#update').click(function() {
            var url = jq(this).data('url');
            layer.confirm('升级之前请先备份好自己修改过的模板文件？', {
                btn: ['已备份好', '没有'] //按钮
            }, function(index) {
                layer.close(index);
                var loading = layer.load(2, {
                    shade: [0.2, '#000']
                });
                jq.getJSON(url, function(data) {
                    layer.close(loading);

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
                return false;
            }, function(index) {
                layer.close(index);
            });

        });
    });
    console.log('采集秘钥为：<?php echo session_id();?>');
</script>

</body>

</html>