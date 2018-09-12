<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:45:"./template/c_default/html/articles_lists.html";i:1525081014;s:41:"./template/c_default/html/index_base.html";i:1523632546;s:43:"./template/c_default/html/index_header.html";i:1525053782;s:43:"./template/c_default/html/index_footer.html";i:1525110792;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title><?php echo $site_config['site_title']; ?> - <?php echo $site_config['seo_title']; ?></title>

<meta name="keywords" content="<?php echo $site_config['seo_keyword']; ?>">
<meta name="description" content="<?php echo $site_config['seo_description']; ?>"> 
    <link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico">
    <link rel="stylesheet" href="__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="__HOME__/css/public.css"> 
    <script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
    <script src="__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/plugins/layui/layui.js"></script>
    <script src="__HOME__/js/public.js"></script>
    <script src="__HOME__/js/dropdown.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="header visible-md visible-lg">
    <div class="container clearfix">
        <span><?php echo $site_config['seo_title']; ?></span>
        <ul class="clearfix">
            <?php if(\think\Session::get('userid') != ''): ?>
            <li>欢迎你，<a class="loginall" title="点击进入个人中心" href="<?php echo url('user/index/index'); ?>"><?php echo \think\Session::get('username'); ?></a></li>
            <?php else: ?>
            <li><a class="loginall" href="<?php echo url('user/login/index'); ?>">登录</a></li>
            <li><a class="regall" href="<?php echo url('user/login/reg'); ?>">注册</a></li>
            <?php endif; ?>
            <li><a href="<?php echo url('index/articles/add'); ?>">我要投稿</a></li>
            <?php if(CBOPEN==3): ?>
            <li><a href="<?php echo url('bbs/index/index'); ?>">进入社区</a></li><?php endif; ?>
        </ul>
    </div>
</div>

<div class="logo clearfix container visible-md visible-lg">
    <a href="<?php echo url('index/index/index'); ?>" class="logoimg col-xs-3"><img src="__ROOT__<?php echo (isset($site_config['cmslogo']) && ($site_config['cmslogo'] !== '')?$site_config['cmslogo']:'__PUBLIC__images/logo.png'); ?>" width="100%" height="104px" alt="LOGO" /></a>
    <!-- <img src="/img/yxcz.png" class="col-xs-3 yxcz" alt="宣传语" /> -->
    <div class="serch col-xs-6">
        <form action="<?php echo url('index/index/search'); ?>">
            <input type="text" required="required" name="ks" value="<?php echo input('ks');?>" class="serch_text col-xs-9" placeholder="请输入搜索的关键字" />
            <input type="submit" class="serch_btn layui-icon col-xs-3" value="&#xe615;" />
        </form>

    </div>
</div>

<nav class="navlan">
    <div class="container">
        <div class="visible-xs visible-sm nav_phone">
            <a class="phone_logo_text" href="<?php echo url('index/index/index'); ?>"><?php echo $site_config['site_title']; ?></a>
            <div class="phone_list_btn">
                <span class="icon-bar" style="margin:0"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
        </div>
        <ul class="nav_list clearfix">
            <div class="clearfix">
                <?php if(\think\Session::get('userid') != ''): ?>
                <li class="phone_touxiang visible-xs visible-sm">
                    <img src="<?php echo getheadurl(\think\Session::get('userhead')); ?>" width="100px" height="100px" alt="用户头像" />
                </li>
                <li class="phone_user_login col-md-2 col-sm-12 visible-xs visible-sm"><a href="<?php echo url('user/index/index'); ?>">欢迎你，<?php echo \think\Session::get('username'); ?></a></li>
                <?php else: ?>
                <li class="phone_touxiang visible-xs visible-sm">
                    <img src="/public/images/default.png" width="100px" height="100px" alt="用户头像" />
                </li>
                <li class="phone_user_login col-md-2 col-sm-12 visible-xs visible-sm"><a href="<?php echo url('user/login/index'); ?>">您好，请先登录账号</a></li>
                <?php endif; ?>
                <!-- 头像功能 -->
                <li class="col-md-2 col-sm-12"><a href="<?php echo url('index/index/index'); ?>"><i class="glyphicon glyphicon-home"></i>网站首页</a></li>
                <?php if(CBOPEN==3): ?>
                <li class="col-md-2 col-sm-12"><a href="<?php echo url('bbs/index/index'); ?>"><i class="glyphicon glyphicon-home"></i>社区</a></li><?php endif; if(is_array($cmsnav) || $cmsnav instanceof \think\Collection || $cmsnav instanceof \think\Paginator): $i = 0; $__LIST__ = $cmsnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pid'] == '1'): ?>

                <!-- <li class="col-md-2 col-sm-12">
                    <a href="https://www.qqzhizun.com/sort/qqsoft" class="dropdown-toggle" data-target="#" data-hover="dropdown" aria-expanded="false">软件教程 <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right animate">
                        <li><a href="http://qqzhizun.com/sort/qqrj">QQ软件</a></li>
                        <li><a href="http://qqzhizun.com/sort/hdrj">活动软件</a></li>
                        <li><a href="http://qqzhizun.com/sort/yyrj">应用软件</a></li>
                        <li><a href="http://qqzhizun.com/sort/sjrj">手机软件</a></li>
                    </ul>
                </li> -->
                <li class="col-md-2 col-sm-12">
                    <a href="<?php echo getnavlink($vo['link'],$vo['sid']); ?>" target="<?php echo $vo['target']; ?>" title="<?php echo $vo['alias']; ?>">
                        <i class="glyphicon glyphicon-home"></i><?php echo $vo['name']; ?></a>
                </li>

                <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                <li class="col-md-2 col-sm-12 visible-xs visible-sm"><a href="<?php echo url('user/index/index'); ?>"><i class="glyphicon glyphicon-user"></i>个人中心</a></li>
            </div>
        </ul>
    </div>
</nav> 
<link rel="stylesheet" href="__HOME__/css/lists.css">
<div class="container weizhi_now visible-md visible-lg">
    当前位置：<a href="<?php echo url('index/index/index'); ?>"><span class="layui-icon" style="margin-right:5px;">&#xe68e;</span>首页</a> <?php if($cateinfo['showall'] == '1'): ?> - <a href="<?php echo url('index/articles/lists'); ?>">全部列表</a> <?php endif; ?> - <?php echo $cateinfo['catename']; ?>列表
</div>
<div class="serch2 col-xs-12 visible-xs visible-sm">
    <input type="text" class="serch_text2 col-xs-9" placeholder="请输入您想搜索的资源软件">
    <input type="submit" class="serch_btn2 layui-icon col-xs-3" value="">
</div>
<div class="container clearfix list_true">
    <div class="list_left col-md-8 col-xs-12">
        <h3 class="list_title"><i class="layui-icon">&#xe609;</i><?php echo $cateinfo['catename']; ?>列表</h3>
        <ul class="list_ul clearfix">

            <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo ): $mod = ($i % 2 );++$i;?>
            <li class="col-xs-12 clearfix">
                <a href="<?php echo url( 'index/index/'.($cateinfo['showall']?$cateinfo['template']:$vo['template']),array( 'id'=>$vo['id'])); ?>" target="_blank">
                    <div class="col-xs-3 lists_left">
                        <!-- <img src="<?php echo $vo['coverpic']?$vo['coverpic']:WEB_URL.'/public/images/default_cover.png';?>" title="<?php echo $vo['title']; ?>" /> -->
                        <img src="<?php echo $vo['coverpic']?$vo['coverpic'].'thumb.png':DEF_COVER; ?>" title="<?php echo $vo['title']; ?>" />

                    </div>
                    <div class="col-xs-9 lists_right">
                        <div class="lists_right_title"><?php if($cateinfo['showall'] == '0'): ?>[<?php echo $vo['name']; ?>]<?php endif; ?> <?php echo $vo['title']; ?></div>
                        <span class="col-xs-12 col-sm-4">时间：<?php echo friendlyDate($vo['time']); ?></span><span class="hidden-xs col-sm-4">作者：<?php echo $vo['username']; ?></span><span class="hidden-xs col-sm-4">热度：<img src="__HOME__/images/s4.gif" /></span>
                        <p class="hidden-xs col-xs-12"><?php echo msubstr(clearcontent($vo['description']),0,120); ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>

        <div id="fanyetools" data-pages="5540">
            <div style="text-align: center;">
                <?php echo $article_list->render(); ?>
            </div>
        </div>
    </div>
    <div class="list_right col-md-4 col-xs-12 visible-md visible-lg">
        <h3 class="list_title">阅读排行榜</h3>
        <ul class="list_ph_ul">

            <?php if(is_array($artphb) || $artphb instanceof \think\Collection || $artphb instanceof \think\Paginator): $k = 0; $__LIST__ = $artphb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
            <li>
                <a href="<?php echo url( 'index/index/'.($cateinfo['showall']?$cateinfo['template']:$vo['template']),array( 'id'=>$vo['id'])); ?>" target="_blank"> <i><?php echo $k; ?></i>
                    <p><?php echo $vo['title']; ?></p>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

        <h3 class="list_title" style="margin-top:20px;">站长推荐</h3>
        <ul class="list_ph_ul">

            <?php if(is_array($artchoice) || $artchoice instanceof \think\Collection || $artchoice instanceof \think\Paginator): $k = 0; $__LIST__ = $artchoice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
            <li>
                <a href="<?php echo url( 'index/index/'.($cateinfo['showall']?$cateinfo['template']:$vo['template']),array( 'id'=>$vo['id'])); ?>" target="_blank"> <i><?php echo $k; ?></i>
                    <p><?php echo $vo['title']; ?></p>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>

 <div class="footer">
    <div class="container clearfix">
        <a href="/" class="footer_shuiyin visible-md visible-lg col-sm-3"><img src="<?php if($site_config['cmslogo']): ?> __ROOT__<?php echo $site_config['cmslogo']; else: ?>__PUBLIC__images/logocms.png<?php endif; ?>" width="293" height="104" /></a>
        <ul class="footer_list clearfix col-sm-9 col-xs-12">
            <?php if(is_array($cmsnav) || $cmsnav instanceof \think\Collection || $cmsnav instanceof \think\Paginator): $i = 0; $__LIST__ = $cmsnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pid'] == '0'): ?>
            <li class="col-sm-2 col-xs-2">
                <a href="<?php echo getnavlink($vo['link'],$vo['sid']); ?>" target="<?php echo $vo['target']; ?>" title="<?php echo $vo['alias']; ?>">
                    <i class="layui-icon"><?php echo $vo['icon']; ?></i><?php echo $vo['name']; ?><span class="hidden-xs"><?php echo $vo['alias']; ?></span>
            </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li class="col-xs-12"><a>Copyright <span class="hidden-xs"> <?php echo $_SERVER['SERVER_NAME']; ?></span> <?php echo $site_config['site_title']; ?> <?php echo $site_config['site_copyright']; ?> <?php echo $site_config['site_icp']; ?><span class="hidden-xs"> 
               <?php echo $site_config['site_tongji']; ?>
            </li>
            <li class="col-xs-12">
                <!-- 个人用户保留下面一句，谢谢 -->
                Powered by<a target="_blank" href="http://www.laysns.com/"> LaySNS v<?php echo $site_config['version']; ?></span></a>
            </li>
        </ul>
    </div>
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
    </div>
    
    <script src="__PUBLIC__/js/default.js"></script>
    <!--页面JS脚本-->

    
</body>

</html>