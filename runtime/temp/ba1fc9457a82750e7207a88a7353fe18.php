<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:44:"./template/c_default/html/index_article.html";i:1525076974;s:41:"./template/c_default/html/index_base.html";i:1523632546;s:43:"./template/c_default/html/index_header.html";i:1525053782;s:44:"./template/c_default/html/index_comment.html";i:1525104272;s:43:"./template/c_default/html/index_footer.html";i:1525110792;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title><?php echo strip_tags($t['title']); ?> - <?php echo $site_config['site_title']; ?></title>

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
<link rel="stylesheet" href="__HOME__/css/article.css">
<div class="container weizhi_now visible-md visible-lg">
    当前位置：
    <a href="<?php echo url('index/index/index'); ?>">
        <span class="layui-icon" style="margin-right:5px;">&#xe68e;</span>首页</a> -
    <a href="<?php echo url('index/articles/lists',array('cate_alias'=>$t['alias'])); ?>"><?php echo $t['name']; ?></a> - <?php echo $t['title']; ?>
</div>
<div class="container clearfix" style="padding:0px 8px;">
    <div class="article-left col-xs-12 col-md-9">

        <div class="col-md-12">
            <h3 class="article_title"><?php echo $t['title']; ?></h3>
            <div class="article_ini clearfix">
                <a class="hidden-xs">时间：</a>
                <span class="ar_time"><?php echo date('Y-m-d',$t['time']); ?></span>
                <a>作者：</a>
                <a class="ar_author" href="<?php echo url('user/index/home',array('id'=>$t['userid'])); ?>" target="_blank"><?php echo $t['username']; ?></a>
                <a>浏览：</a>
                <span class="ar_person"><?php echo $t['view']; ?></span> <?php if($t['userid'] != session('userid') && session('userid') != ''): ?>
                <a href="javaScript:void(0)" data-id="<?php echo $t['id']; ?>" class="shoucang" style="border:1px solid #CAE1FF;padding:5px"><?php if($iscollect == 1): ?>取消收藏<?php else: ?>收藏本文<?php endif; ?></a> <?php endif; ?>
            </div>
            <hr class="hx" />
            <div class="article_wenz">
                <!-- 开始文章内容-->
                <!-- <p>
                <img src="<?php echo $t['coverpic']; ?>" title="<?php echo $t['title']; ?>" />
            </p> -->

                <p><?php echo htmlspecialchars_decode($t['content']); ?></p>
                <!--文章内容结束-->
                <?php echo hook('attachlinkshow',array('id'=>$t['id'],'type'=>1)); ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fly-panel detail-box" id="flyReply" style="padding:10px">
    <a name="comment"> </a>
    <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
        <legend>评论</legend>
    </fieldset>
    <div class="layui-form layui-form-pane">
        <form>
            <div class="layui-form-item layui-form-text">
                <div class="layui-input-block">
                    <span id="huifu"></span>
                    <textarea id="comment" name="content" style="display: none;" placeholder="既然来了，何不留下你的足迹？"></textarea>

                    <!-- <textarea id="textarea" name="content" class="layui-textarea" required lay-verify="required"></textarea> -->
                    <input type="hidden" name="tid" value="0" id="tid" />
                </div>
            </div>
            <div class="layui-form-item" style="text-align:right">
                <button class="layui-btn layui-bg-blue" lay-submit="" lay-filter="comment_add">提交评论</button>
            </div>
        </form>
    </div>
    <ul class="jieda" id="jieda">
        <?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li id="tpt<?php echo $vo['id']; ?>" class="jieda-daan">

            <div class="detail-about detail-about-reply">
                <a class="fly-avatar" href="<?php echo url('user/index/home',array('id'=>$vo['userid'])); ?>">
                    <img src="__ROOT__<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>" /> </a>
                <div class="fly-detail-user">
                    <a href="<?php echo url('user/index/home',array('id'=>$vo['userid'])); ?>" class="fly-link">
                        <cite class="username"><?php if($vo['uid'] == session('userid')): ?>我<?php else: ?><?php echo $vo['username']; endif; if($vo['uid'] == $t['userid']): ?> [作者]<?php endif; ?></cite>
                    </a>
                    <!-- <span style="color:#5FB878">(管理员)</span>  -->
                </div>
                <div class="detail-hits">
                    <span><?php echo friendlyDate($vo['time']); ?></span>
                </div>
                <i class="iconfont icon-caina" style="display:none" title="最佳答案"></i>
            </div>
            <div class="detail-body jieda-body">
                <p><?php echo htmlspecialchars_decode($vo['content']); ?></p>
                <?php if($vo['tid'] > 0): ?>
                <div class="home-dacontent">
                    <?php echo getcommentbyid($vo['tid']); ?>
                </div>

                <?php endif; ?>

            </div>
            <!-- <div class="jieda-reply">

                <span class="jieda-zan <?php if(in_array($vo['id'],$commentzan)): ?>zanok<?php endif; ?>" data-id="<?php echo $vo['id']; ?>" type="zan">
        <i class="iconfont icon-zan"></i>
        <em><?php echo $vo['zan']; ?></em>
      </span>
                <span type="reply" data-id="<?php echo $vo['id']; ?>">
        <i class="iconfont icon-svgmoban53"></i>
        回复</span>

            </div> -->
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
    <div class="pages"><?php echo $tptc->render(); ?></div>
    <div style="text-align: center">
    </div>

</div>
<script>
    layui.use(['form', 'layedit'], function() {
        var form = layui.form,
            jq = layui.jquery;
        var layedit = layui.layedit;
        var index = layedit.build('comment', {
            height: 100,
            tool: ['face']
        });
        form.on('submit(comment_add)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });

            var param = data.field;
            param.content = layedit.getContent(index);
            jq.post('<?php echo url("index/artcomment/add",array("id"=>$t['id'])); ?>', param, function(data) {
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
            return false;
        });
    });
</script>
        </div>
    </div>

    <div class="article-right1 col-xs-12 col-md-3">
        <div class="article-right">
            <span class="ar_rtitle">
				<i class="glyphicon glyphicon-user"></i>本文作者</span>
            <div class="ar_athuor">
                <a href="<?php echo url('user/index/home',array('id'=>$t['userid'])); ?>" target="_blank">
                    <img src="<?php echo getheadurl($t['userhead']); ?>" />
                </a>
            </div>

            <span class="ar_rtitle">
				<i class="glyphicon glyphicon-signal"></i>阅读排行</span>
            <ul class="arph_list clearfix">
                <?php if(is_array($artphb) || $artphb instanceof \think\Collection || $artphb instanceof \think\Paginator): $i = 0; $__LIST__ = $artphb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url( 'index/index/'.$t['template'],array( 'id'=>$vo['id'])); ?>" target="_blank"><?php echo $vo['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>


            <span class="ar_rtitle">
				<i class="glyphicon glyphicon-th-list"></i>文章推荐</span>
            <ul class="arph_list tuijian clearfix">
                <?php if(is_array($artchoice) || $artchoice instanceof \think\Collection || $artchoice instanceof \think\Paginator): $i = 0; $__LIST__ = $artchoice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url( 'index/index/'.$t['template'],array( 'id'=>$vo['id'])); ?>" target="_blank"><?php echo $vo['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

    </div>
</div>
<script>
    layui.use('form', function() {
        var form = layui.form,
            jq = layui.jquery;

        //收藏
        jq('.shoucang').click(function() {
            var idnum = jq(this).data('id');
            var obj = jq(this);
            jq.post('<?php echo url("index/api/zan_collect"); ?>', {
                'zan_collect': 'collect',
                'id': idnum,
                'type': 3
            }, function(data) {
                if (data.code == 200) {
                    if (data.res == '减') {
                        //  jq(obj).removeClass('layui-btn-danger');
                        obj.html("收藏本文");
                    } else {
                        //  jq(obj).addClass('layui-btn-danger');
                        obj.html('<e>取消收藏</e>');
                    }
                }
            });
        });

    });
</script>
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