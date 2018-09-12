<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:41:"./template/b_default/html/index_cate.html";i:1522983892;s:41:"./template/b_default/html/index_base.html";i:1522141170;s:43:"./template/b_default/html/index_header.html";i:1525109310;s:41:"./template/b_default/html/index_menu.html";i:1525071920;s:41:"./template/b_default/html/index_main.html";i:1519712904;s:46:"./template/b_default/html/index_cateright.html";i:1522338664;s:43:"./template/b_default/html/index_footer.html";i:1525135398;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title><?php echo $name; ?> - <?php echo $site_config['site_title']; ?> - <?php echo $site_config['seo_title']; ?></title>


<meta name="keywords" content="<?php echo $site_config['seo_keyword']; ?>">
<meta name="description" content="<?php echo $site_config['seo_description']; ?>"> 

    <link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico">
    <link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="__HOME__/css/font.css">
    <link rel="stylesheet" href="__HOME__/css/global.css">
    <link rel="stylesheet" href="__HOME__/css/tp5page.css"> 
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
</div>  <div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            <li class="layui-hide-xs <?php if($action != 'cate'): ?>layui-this<?php endif; ?>">
                <a href="<?php echo url('bbs/index/index'); ?>">首页</a>
            </li>
            <?php if(is_array($tpto) || $tpto instanceof \think\Collection || $tpto instanceof \think\Paginator): $i = 0; $__LIST__ = $tpto;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li <?php if($name == $vo['name']): ?>class="layui-this" <?php endif; ?>><a href="<?php echo url('bbs/index/cate',array('cate_alias'=>$vo['alias'])); ?>"><?php echo $vo['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block">
                <span class="fly-mid"></span>
            </li>
        </ul>
        <div class="fly-column-right layui-hide-xs">
            <span class="fly-search">
            <i class="layui-icon">&#xe615;</i></span>
            <a href="<?php echo url('bbs/forum/add'); ?>" class="layui-btn">发表新帖</a></div>
        <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
            <span class="fly-search">
                        <i class="layui-icon">&#xe615;</i></span>
            <a href="<?php echo url('bbs/forum/add'); ?>" class="layui-btn">发表新帖</a></div>
    </div>
</div>
<script>
    layui.define(['layer'], function(exports) {
        var $ = layui.jquery,
            layer = layui.layer;
        $('.fly-search').on('click', function() {
            var url = "<?php echo url('bbs/index/search'); ?>";
            layer.open({
                type: 1,
                title: false,
                closeBtn: false,
                shadeClose: true,
                maxWidth: 10000,
                skin: 'fly-layer-search',
                content: ['<form action="' + url + '">', '<input autocomplete="off" placeholder="ID/标题/内容/关键字，回车跳转" type="text" style="width:350px" name="ks">', '</form>'].join(''),
                success: function(layero) {
                    var input = layero.find('input');
                    input.focus();
                    layero.find('form').submit(function() {
                        var val = input.val();
                        if (val.replace(/\s/g, '') === '') {
                            return false;
                        }
                        input.val(input.val());
                    });
                }
            })
        });
    });
</script>
<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">

            <div class="fly-panel" style="margin-bottom: 0;">
    <div class="fly-panel-title fly-filter">
        <a href="<?php echo url('bbs/index/cate',array('cate_alias'=>$action=='cate'?session('forumcate_alias'):'all')); ?>?type=all" <?php if($type == 'all'): ?>class="layui-this" <?php endif; ?>>新帖</a>
        <span class="fly-mid"></span>
        <a href="<?php echo url('bbs/index/cate',array('cate_alias'=>$action=='cate'?session('forumcate_alias'):'all')); ?>?type=newreply" <?php if($type == 'newreply'): ?>class="layui-this" <?php endif; ?>>新回复</a>
        <span class="fly-mid"></span>
        <a href="<?php echo url('bbs/index/cate',array('cate_alias'=>$action=='cate'?session('forumcate_alias'):'all')); ?>?type=hot" <?php if($type == 'hot'): ?>class="layui-this" <?php endif; ?>>热帖</a>
        <span class="fly-mid"></span>
        <a href="<?php echo url('bbs/index/cate',array('cate_alias'=>$action=='cate'?session('forumcate_alias'):'all')); ?>?type=choice" <?php if($type == 'choice'): ?>class="layui-this" <?php endif; ?>>精华</a></div>
    <ul class="fly-list">
        <?php if(is_array($tptcs) || $tptcs instanceof \think\Collection || $tptcs instanceof \think\Paginator): $i = 0; $__LIST__ = $tptcs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li>
            <a href="<?php echo url('user/index/home',array('id'=>$vo['userid'])); ?>" class="fly-avatar">
                <img src="__ROOT__<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>"></a>
            <h2>
                <a class="layui-badge"><?php echo $vo['name']; ?></a>
                <a href="<?php echo url('bbs/index/thread',array('id'=>$vo['id'])); ?>"><?php if($vo['attach']): ?><img src="__PUBLIC__images/attach.png" height="20" title="本帖带有附件"/><?php endif; ?><?php echo $vo['title']; ?></a></h2>
            <div class="fly-list-info">

                <?php if($type == 'newreply'): ?>

                <cite><?php echo $vo['username']; ?></cite> 回复于
                <span><?php echo friendlyDate($vo['time']); ?></span> <?php else: ?>
                <a href="<?php echo url('user/index/home',array('id'=>$vo['userid'])); ?>" link>
                    <cite><?php echo $vo['username']; ?></cite></a>
                <span><?php echo friendlyDate($vo['time']); ?></span>
                <!--<span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻">
                    <i class="iconfont icon-kiss"></i>20</span>-->
                <?php endif; ?>
                <span class="fly-list-nums">
                    <i class="iconfont icon-pinglun1" title="回答"></i><?php echo $vo['reply']; ?></span>
            </div>
            <?php if($vo['settop'] == 1): ?>
            <div class="fly-list-badge"><span class="layui-badge layui-bg-black">置顶</span></div>
            <?php endif; if($vo['choice'] == 1): ?>
            <div class="fly-list-badge"> <span class="layui-badge layui-bg-red">精帖</span> </div>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div style="border-top: 1px dotted #e2e2e2; text-align: center;">
        <?php echo $tptcs->render(); ?>
        <!-- <?php if($action == 'cate'): ?> <?php echo $tptcs->render(); else: ?>
        <div class="laypage-main"> <a href="<?php echo url('index/cate',array('cate_alias'=>'all')); ?>?page=2" class="laypage-next">更多>></a> </div>
        <?php endif; ?> -->
    </div>
</div>

        </div>

        <div class="layui-col-md4">
    <div class="fly-panel">
        <h3 class="fly-panel-title">备忘帖</h3>
        <ul class="fly-panel-main fly-list-static">
            <?php if(is_array($tptcm) || $tptcm instanceof \think\Collection || $tptcm instanceof \think\Paginator): $i = 0; $__LIST__ = $tptcm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url('bbs/index/thread',array('id'=>$vo['id'])); ?>"><?php echo $vo['title']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
    <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">热议帖子</dt> <?php if(is_array($tptch) || $tptch instanceof \think\Collection || $tptch instanceof \think\Paginator): $i = 0; $__LIST__ = $tptch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <dd>
            <a href="<?php echo url('bbs/index/thread',array('id'=>$vo['id'])); ?>"><?php echo $vo['title']; ?> </a>
            <span>
                <i class="iconfont icon-pinglun1"></i> <?php echo $vo['reply']; ?></span>

        </dd>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>

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
    
</body>
<script src="__PUBLIC__/js/home.js"></script>

</html>