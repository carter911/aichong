<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"./template/b_default/html/forum_add.html";i:1523696102;s:41:"./template/b_default/html/index_base.html";i:1522141170;s:43:"./template/b_default/html/index_header.html";i:1525109310;s:43:"./template/b_default/html/index_footer.html";i:1525135398;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title>发布帖子 - <?php echo $site_config['site_title']; ?> - <?php echo $site_config['seo_title']; ?></title>


<meta name="keywords" content="<?php echo $site_config['seo_keyword']; ?>">
<meta name="description" content="<?php echo $site_config['seo_description']; ?>"> 

    <link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico">
    <link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="__HOME__/css/font.css">
    <link rel="stylesheet" href="__HOME__/css/global.css">
    <link rel="stylesheet" href="__HOME__/css/tp5page.css"> 
<link rel="stylesheet" href="__PUBLIC__/plugins/wangEditor/css/wangEditor.min.css">
<style type="text/css">
    .tpt_sels a {
        padding-right: 15px;
        position: relative
    }
    
    .tpt_sels a {
        padding: 0 20px 0 8px;
        color: #3B6268;
        background: #FFFFBA;
        border: 1px #F8E06E solid;
        margin-right: 5px;
        margin-bottom: 5px;
        font-size: 14px;
        height: 26px;
        line-height: 26px;
        display: block;
        float: left
    }
    
    .tpt_pres a.selected {
        padding: 0 8px;
        color: #3B6268;
        background: #FFFFBA;
        border: 1px #F8E06E solid;
        margin-right: 5px;
        margin-bottom: 5px;
        font-size: 14px;
        height: 26px;
        line-height: 26px;
        display: block;
        float: left
    }
    
    .tpt_pres a {
        padding: 0 8px;
        color: #fff;
        background: #5AC7A9;
        border: 1px #5AC7A9 solid;
        margin-right: 5px;
        margin-bottom: 5px;
        font-size: 14px;
        height: 26px;
        line-height: 26px;
        display: block;
        float: left
    }
    
    .tpt_sels a em {
        width: 12px;
        height: 12px;
        font-style: normal;
        display: block;
        position: absolute;
        top: 7px;
        right: 4px;
        z-index: 2;
        background: url(__PUBLIC__/images/sx.png) no-repeat 0 0;
    }
    
    .cl {
        zoom: 1
    }
    
    .cl:after {
        content: '\20';
        display: block;
        height: 0;
        clear: both;
        visibility: hidden
    }
    
    .wangEditor-menu-container .menu-item a {
        padding: 12px 0;
    }
    
    .wangEditor-menu-container .menu-item {
        height: 37px;
        width: 37px;
    }
    
    .wangEditor-menu-container .menu-group {
        padding: 0;
    }
    
    .wangEditor-container {
        border: 1px solid #e6e6e6;
    }
</style>

    <script src="__PUBLIC__/plugins/layui/layui.js"></script>
    <script type="text/javascript" src="__PUBLIC__js/jquery-1.9.1.min.js"></script>
</head>

<body>
    <div class="fly-header layui-bg-green" style="border-bottom: 1px solid #01AAED;">
    <div class="layui-container">
        <a class="fly-logo" href="<?php echo url('bbs/index/index'); ?>" style="top: 0;">
            <img src="__ROOT__<?php echo (isset($site_config['bbslogo']) && ($site_config['bbslogo'] !== '')?$site_config['bbslogo']:'__PUBLIC__images/logo.png'); ?>" style="height:60px" alt="laysns"></a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <?php if(CBOPEN==3): ?>
            <li class="layui-nav-item">
                <a href="<?php echo url('index/index/index'); ?>" target="_self" title="">
                    <i class="layui-icon"></i>CMS首页 </a>
            </li><?php endif; if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pid'] == '1'): ?>
            <li class="layui-nav-item">
                <a href="<?php echo getnavlink($vo['link'],$vo['sid']); ?>" target="<?php echo $vo['target']; ?>" title="<?php echo $vo['alias']; ?>">
                    <i class="layui-icon"><?php echo $vo['icon']; ?></i><?php echo $vo['name']; ?>
                </a>
            </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul class="layui-nav fly-nav-user">
            <input id="uid" type="hidden" value="<?php echo \think\Session::get('userid'); ?>" /> <?php if(\think\Session::get('userid') != ''): ?>
            <!-- 登录后的状态 -->
            <li class="layui-nav-item">
                <a class="fly-nav-avatar" href="javascript:;">
                    <cite class="layui-hide-xs"><?php echo \think\Session::get('username'); ?></cite>

                    <img src="<?php echo getheadurl(\think\Session::get('userhead')); ?>">
                </a>

                <dl class="layui-nav-child">
                    <dd>
                        <a href="<?php echo url('user/index/index'); ?>">
                            <i class="layui-icon">&#xe612;</i>个人中心</a>

                    </dd>

                    <dd>
                        <?php if(CBOPEN==3): ?>
                        <a href="<?php echo url('index/index/index'); ?>">
                            <i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>CMS首页</a>
                        <?php endif; ?>
                    </dd>
                    <hr style="margin: 5px 0;">
                    <dd>
                        <a data-url="<?php echo url('user/login/logout'); ?>" location-url="<?php echo url('bbs/index/index'); ?>" href="javascript:void(0)" class="logi_logout" style="text-align: center;">退出</a></dd>
                </dl>
                <!-- <a href="<?php echo url('user/index/topic'); ?>"><span class="layui-badge" id="number">0</span></a> -->
            </li>
            <script>
                layui.use(['jquery', 'layer'], function() {
                    var $ = layui.jquery;
                    var layer = layui.layer;

                    function getmsgnum() {
                        var elemUser = $('.fly-nav-user');
                        $.getJSON("<?php echo url('user/message/getUnreadMsg'); ?>?", {
                            _: new Date().getTime()
                        }, function(res) {

                            if (res.code == 200 && res.count > 0) {
                                var msgurl = "<?php echo url('user/index/message'); ?>";
                                var msg = $('<a class="fly-nav-msg" href="' + msgurl + '">' + res.count + '</a>');
                                elemUser.append(msg);
                                msg.on('mouseenter', function() {
                                    layer.closeAll('tips');
                                });
                                layer.tips('你有 ' + res.count + ' 条未读消息，点击可查看', msg, {
                                    tips: 3,
                                    // tipsMore: true,
                                    fixed: true,
                                    time: 3000
                                });
                                msg.on('click', function() {
                                    $.post("<?php echo url('user/message/readmsg'); ?>", {}, function(res) {
                                        if (res.status == 0) {
                                            location.href = "<?php echo url('user/index/message'); ?>";
                                        }
                                    });
                                });
                            }

                        });
                    }
                    getmsgnum();
                    //1分钟执行一次
                    setInterval(getmsgnum, 60000);

                });
            </script>
            <?php else: ?>
            <li class="layui-nav-item">
                <a class="iconfont icon-touxiang layui-hide-xs" href="<?php echo url('user/login/index'); ?>"></a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('user/login/index'); ?>">登录</a></li>
            <li class="layui-nav-item">
                <a href="<?php echo url('user/login/reg'); ?>">注册</a></li>
            <!-- <li class="layui-nav-item layui-hide-xs">
                <a href="<?php echo url('user/applogin/qqlogin'); ?>" onclick="layer.msg('正在通过QQ登录', {icon:16, shade: 0.1, time:0})" title="QQ登录" class="iconfont icon-qq"></a>
            </li> -->
            <!--<li class="layui-nav-item layui-hide-xs">
            <a href="/app/weibo/" onclick="layer.msg('正在通过微博登录', {icon:16, shade: 0.1, time:0})" title="微博登录" class="iconfont icon-weibo"></a>
          </li>-->
            <?php endif; ?>
        </ul>
    </div>
</div> 
<div class="layui-container fly-marginTop">
    <div class="fly-panel" pad20="" style="padding-top: 5px;">
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li class="layui-this">发表新帖（BBS）</li>

            </ul>
            <div class="layui-form layui-form-pane" style="padding: 20px 0;">

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">板块</label>
                        <div class="layui-input-block">
                            <select name="tid">
                            <option value="0">请选择版块</option>
                            <?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option <?php if($cid == $vo['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>" ><?php echo $vo['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_title" class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <div class="layui-input-block">
                        <textarea id="textarea" name="content" style="height:400px;width: 100%;"></textarea>
                    </div>
                    <label for="L_content" class="layui-form-label" style="top: -2px;">内容</label>
                </div>
                <div class="layui-form-item">
                    <label for="L_title" class="layui-form-label">浏览方式</label>

                    <div class="layui-input-block">
                        <input type="radio" name="viewtype" lay-filter="linktype" value="0" title="自由浏览" checked/>
                        <input type="radio" name="viewtype" lay-filter="linktype" value="1" title="付费浏览">
                        <input type="radio" name="viewtype" lay-filter="linktype" value="2" title="回复可见">
                    </div>

                </div>

                <div class="layui-form-item" id="viewscore" style="display:none">
                    <label for="L_title" class="layui-form-label">付费积分</label>
                    <div class="layui-input-inline">
                        <input type="number" style="width:100px;text-align:center" name="fee" value="1" min="1" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <?php echo hook('attachlinkadd'); ?>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="forum_add">立即发布</button>
                </div>

            </div>
        </div>
    </div>
</div>
 <?php if(session('userid') > 0): ?>
    <a href="<?php echo url('forum/add'); ?>" class="site-tree-mobile-edit layui-hide">
        <i class="iconfont icon-fabu"></i>
    </a>
    <?php endif; ?> <div class="fly-footer">
    <p>
        <!-- 底部导航 -->
        <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pid'] == '0'): ?>
        <a class="nav-this" href="<?php echo $vo['link']; ?>" target="<?php echo $vo['target']; ?>" title="<?php echo $vo['alias']; ?>">
            <i class="iconfont icon-<?php echo $vo['icon']; ?>"></i><?php echo $vo['name']; ?>
        </a>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </p>

    <p>
        <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/"><?php echo $site_config['site_title']; ?></a> <?php echo date('Y'); ?> &copy; <?php if($site_config['site_copyright'] != ''): ?> Copyright:<?php echo $site_config['site_copyright']; endif; ?> <?php echo $site_config['site_icp']; if($site_config['site_tongji']
        != ''): ?> <?php echo $site_config['site_tongji']; endif; ?>

    </p>
    <p>
        <!-- 个人用户保留下面一句，谢谢 -->
        Powered by <a target="_blank" href="http://www.laysns.com/">LaySNS v<?php echo $site_config['version']; ?></a>
    </p>
</div>
<script>
    //百度推送代码
    (function() {
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        } else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>  
    <!--页面JS脚本-->
    

<script type="text/javascript" src="__PUBLIC__/plugins/wangEditor/js/wangEditor.min.js"></script>
<script type="text/javascript">
    var editor = new wangEditor('textarea');
    $.get("<?php echo url('index/api/getemotion'); ?>", function(data) {
        editor.config.uploadImgUrl = '<?php echo url("index/upload/wangeditor_upimage"); ?>';
        editor.config.uploadImgFileName = 'FileName';
        var emotiondata;
        emotiondata = data;
        emotiondata = JSON.parse(emotiondata);
        editor.config.emotions = emotiondata;
        editor.config.menus = ['bold', 'fontfamily', 'fontsize', 'forecolor', 'link', 'unlink', 'emotion', 'img', 'insertcode', 'video', 'fullscreen'];

        editor.config.pasteText = false;
        editor.create();
    });
</script>
<script>
    layui.use('form', function() {
        var form = layui.form,
            jq = layui.jquery;

        form.on('radio(linktype)', function(data) {
            if (data.value == 1) {
                $("#viewscore").show();
            } else {
                $("#viewscore").hide();
            } //被点击的radio的value值 
        });
        form.on('submit(forum_add)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            var param = data.field;
            jq.post("<?php echo url('bbs/forum/add'); ?>", param, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        location.href = "<?php echo url('bbs/index/index'); ?>";
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
<script src="__PUBLIC__/js/home.js"></script>

</html>