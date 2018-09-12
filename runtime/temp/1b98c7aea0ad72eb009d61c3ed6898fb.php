<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:101:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/system_template.html";i:1522425538;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<link rel="stylesheet" href="__ADMIN__/css/template.css">
<div class="admin-main">
    <div class="layui-field-box layui-form">

        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">管理模板</li>
                <li><a href="<?php echo url('system/temponline'); ?>">在线模板</a></li>
            </ul>
        </div>

        <div id="theme" style="padding:0 20px">
            <div class="enable">
                <h2>当前启用的模板</h2>

                <dl>
                    <p><img src="__ROOT__<?php echo $cms_tpl['image']; ?>"></p>
                    <dt><?php echo $cms_tpl['name']; ?></dt>
                    <dd>版本：<?php echo $cms_tpl['version']; ?></dd>
                    <dd>作者：<a href="http://www.laysns.com/home/<?php echo (isset($cms_tpl['userid']) && ($cms_tpl['userid'] !== '')?$cms_tpl['userid']:47); ?>.html" target="_blank"><?php echo $cms_tpl['author']; ?></a></dd>
                    <dd>简介：<?php echo $cms_tpl['description']; ?></dd>
                </dl>

                <dl>
                    <p><img src="__ROOT__<?php echo $bbs_tpl['image']; ?>"></p>
                    <dt><?php echo $bbs_tpl['name']; ?></dt>
                    <dd>版本：<?php echo $bbs_tpl['version']; ?></dd>
                    <dd>作者：<a href="http://www.laysns.com/home/<?php echo (isset($bbs_tpl['userid']) && ($bbs_tpl['userid'] !== '')?$bbs_tpl['userid']:47); ?>.html" target="_blank"><?php echo $bbs_tpl['author']; ?></a></dd>
                    <dd>简介：<?php echo $bbs_tpl['description']; ?></dd>
                </dl>
                <dl>
                    <p><img src="__ROOT__<?php echo $user_tpl['image']; ?>"></p>
                    <dt><?php echo $user_tpl['name']; ?></dt>
                    <dd>版本：<?php echo $user_tpl['version']; ?></dd>
                    <dd>作者：<a href="http://www.laysns.com/home/<?php echo (isset($user_tpl['userid']) && ($user_tpl['userid'] !== '')?$user_tpl['userid']:47); ?>.html" target="_blank"><?php echo $user_tpl['author']; ?></a></dd>
                    <dd>简介：<?php echo $user_tpl['description']; ?></dd>
                </dl>

            </div>

            <div class="themeList">
                <h2>可用模板</h2>
                <?php if(is_array($theme_list) || $theme_list instanceof \think\Collection || $theme_list instanceof \think\Paginator): if( count($theme_list)==0 ) : echo "" ;else: foreach($theme_list as $key=>$vo): ?>
                <dl>
                    <p>
                        <a target="_blank" href="http://www.laysns.com/plinfo/<?php echo $vo['pid']; ?>.html"><img src="__ROOT__<?php echo $vo['image']; ?>"></a>
                    </p>
                    <dt><?php echo $vo['name']; ?> <?php echo $vo['version']; ?></dt>
                    <dd>作者：<a href="http://www.laysns.com/home/<?php echo (isset($vo['userid']) && ($vo['userid'] !== '')?$vo['userid']:47); ?>.html" target="_blank"><?php echo $vo['author']; ?></a></dd>
                    <dd class="btnList"><a href="javascript:;" data-url="<?php echo url('system/deltpl',array('tpl_name'=>$vo['tpl_name'])); ?>" class="del">删除</a> <span><a href="javascript:;" data-url="<?php echo url('system/usetpl',array('tpl_name'=>$vo['tpl_name'])); ?>" class='usetpl'>启用</a> <a target="_blank" href="http://www.laysns.com/plinfo/<?php echo $vo['pid']; ?>.html">预览模板</a></span></dd>
                </dl>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
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

        jq('.anzhuang').click(function() {
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
        jq('.usetpl').click(function() {

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
        jq('.del').click(function() {

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