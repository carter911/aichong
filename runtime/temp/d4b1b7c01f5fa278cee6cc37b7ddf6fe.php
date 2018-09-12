<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/Users/zhongwu/Downloads/aichong/application/admin/view/index_adminindex.html";i:1536731350;}*/ ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>LaySNS后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="__ADMIN__/images/favicon.ico">
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/globa.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">

</head>

<body>
    <div class="layui-layout layui-layout-admin" style="border-bottom: solid 5px #1aa094;">
        <div class="layui-header header header-demo">
            <div class="layui-main">
                <div class="admin-login-box">
                    <a class="logo" style="left: 0;">
                        <span style="font-size: 30px;">爱宠社区</span>
                    </a>
                    <div class="admin-side-toggle">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="admin-side-full">
                        <i class="fa fa-life-bouy" aria-hidden="true"></i>
                    </div>
                </div>
                <ul class="layui-nav admin-header-item">
                    <li class="layui-nav-item">
                        <a class="update_cache" href="javascript:void(0)">清除缓存</a>
                    </li>
                    <li class="layui-nav-item">
                        <a href="<?php echo routerurl('index/index/index'); ?>" target="_blank">浏览首页</a>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:;" class="admin-header-user">
                            <img src="__ADMIN__/images/default.png" />
                            <span><?php echo session('admin_name'); ?></span>
                        </a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a id="changemima" href="javascript:;" data-url="<?php echo url('admin/change_password/diachange_password'); ?>">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i> 修改密码</a>
                            </dd>

                            <dd>
                                <a class="logi_logout" href="javascript:void(0)">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <ul class="layui-nav admin-header-item-mobile">
                    <li class="layui-nav-item">
                        <a class="logi_logout" href="javascript:void(0)">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="layui-side layui-bg-black" id="admin-side">

            <div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
        </div>

        <div class="layui-body" style="bottom: 0;border-left: solid 2px #1AA094;" id="admin-body">
            <div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab" style="margin:0px">
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        <i class="fa fa-dashboard" aria-hidden="true"></i>
                        <cite>控制面板</cite>
                    </li>
                </ul>
                <div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
                    <div class="layui-tab-item layui-show">
                        <iframe src="<?php echo url('index/home'); ?>"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>

        <!--锁屏模板 start-->
        <script type="text/template" id="lock-temp">
            <div class="admin-header-lock" id="lock-box">
                <div class="admin-header-lock-img">
                    <img src="__ADMIN__/images/default.png" />
                </div>
                <div class="admin-header-lock-name" id="lockUserName">beginner</div>
                <input type="text" class="admin-header-lock-input" value="输入密码解锁.." name="lockPwd" id="lockPwd" />
                <button class="layui-btn layui-btn-sm" id="unlock">解锁</button>
            </div>
        </script>
        <!--锁屏模板 end -->

        <script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
        <script>
            var navs = '<?php echo $menu; ?>';

            navs = JSON.parse(navs);
            var adminname = "<?php echo session('admin_name'); ?>";
            var logout = "<?php echo url('login/logout'); ?>";
            var lockurl = "<?php echo url('login/locker'); ?>";
        </script>

        <script type="text/javascript" src="__ADMIN__/js/index.js"></script>


        <script type="text/javascript">
            layui.use(['layer', 'element', 'jquery', 'form'], function() {
                var layer = layui.layer,
                    element = layui.element,
                    jq = layui.jquery,
                    form = layui.form;
                jq('#changemima').on('click', function() {


                    layer.open({
                        type: 2,
                        offset: ['100px', '30%'],
                        area: ['600px', '400px'],
                        content: jq(this).data('url'),

                        btnAlign: 'r',
                        closeBtn: 1

                        ,
                        cancel: function() {
                            //右上角关闭回调

                            //return false 开启该代码可禁止点击该按钮关闭
                        }
                    });
                });

                jq('.update_cache').click(function() {
                    loading = layer.load(2, {
                        shade: [0.2, '#000']
                    });
                    jq.getJSON('<?php echo url("System/clear"); ?>', function(data) {
                        if (data.code == 200) {
                            layer.close(loading);
                            layer.msg(data.msg, {
                                icon: 1,
                                time: 1000
                            }, function() {
                                location.reload();
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
                });

                jq('.logi_logout').click(function() {
                    loading = layer.load(2, {
                        shade: [0.2, '#000']
                    });
                    jq.getJSON('<?php echo url("login/logout"); ?>', function(data) {
                        if (data.code == 200) {
                            layer.close(loading);
                            layer.msg(data.msg, {
                                icon: 1,
                                time: 1000
                            }, function() {
                                location.href = '<?php echo url("login/index"); ?>';
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
                });

            });
        </script>
    </div>
</body>

</html>