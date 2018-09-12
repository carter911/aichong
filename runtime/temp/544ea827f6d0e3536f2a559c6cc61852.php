<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:42:"./template/c_default/html/index_index.html";i:1525137020;s:41:"./template/c_default/html/index_base.html";i:1523632546;s:43:"./template/c_default/html/index_header.html";i:1525053782;s:41:"./template/c_default/html/index_sign.html";i:1525133392;s:43:"./template/c_default/html/index_footer.html";i:1525110792;}*/ ?>
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
<link rel="stylesheet" href="__HOME__/css/index.css">
<script src="__HOME__/js/index.js"></script>
<div class="container index">
    <div class="serch2 col-xs-12 visible-xs visible-sm">
        <form action="<?php echo url('index/index/search'); ?>">
            <input type="text" name="ks" required="required" value="<?php echo input('ks');?>" class="serch_text2 col-xs-9" placeholder="请输入搜索的关键字" />
            <input type="submit" class="serch_btn2 layui-icon col-xs-3" value="&#xe615;" />
        </form>
    </div>
    <div class="tg_phb clearfix">
        <ul class="right clearfix col-xs-12">
            <?php if(is_array($member) || $member instanceof \think\Collection || $member instanceof \think\Paginator): $k = 0; $__LIST__ = $member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo ): $mod = ($k % 2 );++$k;?>
            <li class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                <a href="<?php echo url('user/index/home',array('id'=>$vo['id'])); ?>">
                    <p><?php if($k <= 4): ?><img src="__HOME__/images/hate_<?php echo $k; ?>.png" class="top" /><?php endif; ?>
                        <img src="<?php echo getheadurl($vo['userhead']); ?>" title="累计投稿<?php echo $vo['forumnum']; ?>篇" class="yh_txs" /></p>
                    <span><?php echo $vo['username']; ?></span></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="leftbottom"><img src="__HOME__/images/left2.png" /></div>
        <div class="righttop"><img src="__HOME__/images/right2.png" /></div>
    </div>
    <div class="today col-xs-12 col-md-8 ">
        <div class="today_title ">
            <a class="today_t ">
                <span class="layui-icon ">&#xe637;</span>
                <font>最近更新</font>
            </a>
            <a class="today_a " href="<?php echo url('index/articles/lists'); ?>">更多</a>
        </div>
        <div class="today_container ">
            <ul class="jc_list clearfix ">
                <?php if(is_array($article_new) || $article_new instanceof \think\Collection || $article_new instanceof \think\Paginator): $i = 0; $__LIST__ = $article_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo ): $mod = ($i % 2 );++$i;?>
                <li class="col-sm-6 col-xs-12 clearfix ">
                    <a href="<?php echo url('user/index/home',array('id'=>$vo['uid'])); ?>" target="_blank " title="点击查看作者">
                        <img src="<?php echo getheadurl($vo['userhead']); ?>" class="jc_list_logo " />
                    </a>
                    <a href="<?php echo url( 'index/index/'.$vo['template'],array( 'id'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>" class="col-xs-8"><?php echo mb_substr($vo['title'],0,20,'utf-8'); ?></a>
                    <em class="old_time col-xs-2" <?php if(date( 'Ymd') == date( 'Ymd',$vo['time'])): ?>style="color:red" <?php endif; ?>><?php echo date('m-d',$vo['time']); ?></em>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!-- 今日更新 -->
    <div class="user_login col-xs-12 col-md-4 visible-md visible-lg">
        <div class="login col-xs-12 clearfix">
            <?php if(\think\Session::get('userid') != ''): ?>
            <div class="user_success">
                <a href="<?php echo url('user/index/index'); ?>">
                    <img src="<?php echo getheadurl(\think\Session::get('userhead')); ?>" class="success_logo" data-ljz="false" />
                </a>
                <span class="success_nick">
					<a href="<?php echo url('user/index/index'); ?>" target="_blank" style="margin-right:20px;max-width:70%;"><?php echo \think\Session::get('username'); ?></a>
					<a  data-url="<?php echo url('user/login/logout'); ?>" location-url="<?php echo url('index/index/index'); ?>" class="logi_logout" href="javascript:void(0)">退出</a>
				</span>
                <div class="success_vip clearfix">
                    <span class="success_vipgrade">账号类型：
						<i ><?php echo getgradenamebyid(\think\Session::get('grades')); ?></i>
					</span>
                    <span class="success_viptime">余额：
						<i id="pointnum"><?php echo \think\Session::get('point'); ?></i> <?php echo JF_NAME; ?>
					</span>
                </div>

                 <?php if($site_config['open_sign'] == 1): ?>

<div class="clearfix" style="height:50px;text-align:center">
    <div class="fly-panel-main fly-signin-main">
        <i class="layui-icon fly-loading">&#xe63d;</i>
    </div>
</div>

<script>
    layui.use(['form', 'layer'], function() {
        var layer = layui.layer;
        var $ = layui.jquery;
        var jifenname = "<?php echo JF_NAME; ?>";
        var uid = "<?php echo session('userid'); ?>";
        if (uid != '') {
            $.get("<?php echo url('user/sign/todayData'); ?>", function(data) {


                if (data.is_sign == 1) {

                    $('.fly-signin-main').html('<button class="layui-btn layui-btn-disabled">今日已签到</button>');

                } else {
                    $('.fly-signin-main').html('<button id="LAY_signin" class="layui-btn layui-btn-danger">今日签到</button><span> 可获得<cite>' + data.will_getscore + '</cite>' + jifenname + '</span>');

                    $("#LAY_signin").on("click", function() {

                        $.getJSON("<?php echo url('user/sign/sign'); ?>", function(data) {

                            if (data.code == 200) {
                                $('.fly-signin-main').html('<button class="layui-btn layui-btn-disabled">今日已签到</button><span> 获得了<cite>' + data.score + '</cite>' + jifenname + '</span>');
                                $('#pointnum').text((Number($('#pointnum').text()) + data.score));
                                if (data.msg != '') {
                                    layer.msg(data.msg, {
                                        icon: 6,
                                        time: 5000
                                    });
                                }
                            } else {
                                layer.msg(data.msg);
                            }
                        });
                    });
                }
            });
        } else {
            $('.fly-signin-main').html('<button class="layui-btn layui-btn-danger" id="LAY_signin">签到得' + jifenname + '</button>');
            $("#LAY_signin").on("click", function() {
                layer.msg('请先登录');
            });
        }

        //查看签到积分规则
        $("#LAY_signinHelp").on("click", function() {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            var url = "<?php echo url('user/sign/getsignrule'); ?>";


            $.getJSON(url, function(data) {
                $str = '';
                $.each(data.msg, function(k, v) {
                    $str += '<tr><td>≥' + v.days + '</td><td>' + v.score + '</td></tr>';
                });
                var content = '<div class="layui-text" style="padding: 20px;">' +
                    '<blockquote class="layui-elem-quote">“签到”可获得社区' + jifenname + '，规则如下</blockquote>' +
                    '<table class="layui-table">' +
                    '<thead>' +
                    '<tr><th>连续签到天数</th><th>每天可获' + jifenname + '</th></tr>' +
                    '</thead>' +
                    '<tbody>' +
                    $str +
                    '</tbody>' +
                    '</table>' +
                    '<ul>' +
                    '<li style="color: #FF5722;">新年期间签到额外赠送最高99金币</li>' +
                    '<li>中间若有间隔，则连续天数重新计算</li>' +
                    // '<li style="color: #FF5722;">不可利用程序自动签到，否则' + jifenname + '清零</li>' +
                    '</ul></div>'
                layer.open({
                    type: 1,
                    title: '签到说明',
                    area: '300px',
                    shade: 0.8,
                    shadeClose: true,
                    content: content,
                    success: function(index, layero) {
                        //do something
                        layer.close(loading); //如果设定了yes回调，需进行手工关闭
                    }
                });
            });
        });

        //查看积分榜单
        $("#LAY_signinTop").on("click", function() {

            var signlisturl = "<?php echo url('user/sign/lists'); ?>";

            layer.open({
                type: 2,
                title: '签到活跃榜 - TOP 20',
                shade: 0.8,
                area: ['300px', '430px'], //宽高
                scrollbar: false,
                shadeClose: true,
                content: signlisturl,
            });
        });
    });
</script>

<?php endif; ?>

                <a href="<?php echo url('index/articles/add'); ?>" target="_blank" class="strat_vip">
                    <span class="glyphicon glyphicon-edit" style="margin-right:8px;top:2px;"></span>我要投稿</a>
                <fieldset class="col-xs-10">
                    <legend>尊贵账号特权</legend>
                </fieldset>
                <ul class="tequan1 clearfix col-xs-10">
                    <li class="clearfix">
                        <div>
                            <i style="width: 57px; height: 38px; background-position: -53px 0;"></i>
                            <span>过滤部分广告</span>
                        </div>
                        <div class="liright">
                            <i style="width: 51px; height: 40px; background-position: -111px 0;"></i>
                            <span>免费领赞</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div>
                            <i style="width: 66px; height: 55px; background-position: -274px 0;"></i>
                            <span>投稿优先审核</span>
                        </div>
                        <div class="liright">
                            <i style="width: 54px; height: 55px; background-position: -341px 0;"></i>
                            <span>下载提速</span>
                        </div>
                    </li>
                </ul>
            </div>
            <?php else: ?>
            <div class="user_bad">
                <a class="btn_login col-xs-10" href="<?php echo url('user/login/index'); ?>">立即登录</a>
                <a href="<?php echo url('index/articles/add'); ?>" class="vip_btn col-xs-10">投稿作品</a>
                <fieldset class="col-xs-10">
                    <legend>拥有账号特权</legend>
                </fieldset>
                <ul class="tequan clearfix col-xs-10">
                    <li class="clearfix">
                        <div>
                            <i style="background-position: center -389px;"></i>
                            <span>上传教程</span>
                        </div>
                        <div class="liright">
                            <i style="background-position: center -360px;"></i>
                            <span>投递文章</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div>
                            <i style="background-position: center -180px；"></i>
                            <span>积分兑换</span>
                        </div>
                        <div class="liright">
                            <i style="background-position: center -263px;"></i>
                            <span>每日签到</span>
                        </div>
                    </li>
                </ul>
                <ul class="tequan1 clearfix col-xs-10">
                    <li class="clearfix">
                        <div>
                            <i style="width: 57px; height: 38px; background-position: -53px 0;"></i>
                            <span>过滤部分广告</span>
                        </div>
                        <div class="liright">
                            <i style="width: 51px; height: 40px; background-position: -111px 0;"></i>
                            <span>免费领赞</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div>
                            <i style="width: 66px; height: 55px; background-position: -274px 0;"></i>
                            <span>投稿优先审核</span>
                        </div>
                        <div class="liright">
                            <i style="width: 54px; height: 55px; background-position: -341px 0;"></i>
                            <span>下载提速</span>
                        </div>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- 用户登录框 -->

    <div class="updata_list col-xs-12">
        <?php if(is_array($artbycatelist) || $artbycatelist instanceof \think\Collection || $artbycatelist instanceof \think\Paginator): $i = 0; $__LIST__ = $artbycatelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="g-class-cont col-xs-12 col-md-4">
            <dl>
                <dt>
					<i></i>
					<a style="background:<?php echo $vo['background']; ?>" href="<?php echo url('index/articles/lists',array('cate_alias'=>$vo['alias'])); ?>"><?php echo $vo['name']; ?></a>
					<i></i>
				</dt>
                <dd>
                    <?php if(is_array($vo['artlists']) || $vo['artlists'] instanceof \think\Collection || $vo['artlists'] instanceof \think\Paginator): $k = 0; $__LIST__ = $vo['artlists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                    <a href="<?php echo url( 'index/index/'.$vo['template'],array( 'id'=>$v['id'])); ?>" target="_blank">
                        <strong><?php echo $v['title']; ?></strong>
                        <b></b>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
            </dl>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    <?php if(is_array($article_pic) || $article_pic instanceof \think\Collection || $article_pic instanceof \think\Paginator): $i = 0; $__LIST__ = $article_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="qqtouxiang col-xs-12">
        <div class="tx_head">
            <div class="tx_left col-xs-12 col-md-3 col-lg-2" style="background:<?php echo $vo['background']; ?>">
                <i class="layui-icon"><?php echo $vo['icon']; ?></i>
                <a href="<?php echo url('index/articles/lists',array('cate_alias'=>$vo['alias'])); ?>"><?php echo $vo['name']; ?></a>
            </div>
            <a class="tx_right col-xs-1 visible-lg visible-md" href="<?php echo url('index/articles/lists',array('cate_alias'=>$vo['alias'])); ?>">更多
			</a>
        </div>
        <div class="tx_container clearfix">
            <ul class="tx_img clearfix col-md-8 col-xs-12">


                <?php if(is_array($vo['artlists']) || $vo['artlists'] instanceof \think\Collection || $vo['artlists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['artlists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url( 'index/index/'.$vo['template'],array( 'id'=>$v['id'])); ?>" target="_blank">
                        <img src="<?php echo $v['coverpic']?$v['coverpic'].'thumb.png':DEF_COVER; ?>" alt="<?php echo $v['title']; ?>" />
                        <span><?php echo $v['title']; ?></span>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <ul class="tx_text clearfix col-md-4 col-xs-12">
                <?php if(is_array($vo['artlists']) || $vo['artlists'] instanceof \think\Collection || $vo['artlists'] instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($vo['artlists']) ? array_slice($vo['artlists'],0,7, true) : $vo['artlists']->slice(0,7, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                <li> <span><?php echo $k; ?></span><a href="<?php echo url( 'index/index/'.$vo['template'],array( 'id'=>$v['id'])); ?>" target="_blank"><?php echo $v['title']; ?></a> </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 排行榜结束和推荐 -->
    <div class="phb_index col-xs-12 clearfix">
        <div class="phb_shu col-xs-12 col-md-4">
            <div class="head_title">
                <div>
                    <i class="layui-icon"></i>最近30天点击榜</div>
            </div>

            <ul class="phb_cont clearfix ">
                <?php if(is_array($art_top30) || $art_top30 instanceof \think\Collection || $art_top30 instanceof \think\Paginator): $k = 0; $__LIST__ = $art_top30;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <li><i><?php echo $k; ?></i><a href="<?php echo url( 'index/index/'.$vo['template'],array( 'id'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>" target="_blank"><?php echo $vo['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="phb_other col-xs-12 col-md-8">
            <div id="app_goods" class="phb_other1">
                <div class="head_title">
                    <div>
                        <i class="layui-icon"></i><?php if($site_config['open_taoke'] == 1): ?>今日淘宝天猫优惠商品<?php else: ?>站长精选<?php endif; ?></div>
                    <?php if($site_config['open_taoke'] == 0): ?> <a href="<?php echo url( 'index/articles/choice'); ?>" target="_blank" class="youhuiright">
                    更多 </a><?php endif; ?>
                </div>
                <ul class="shop_list clearfix" id="youhuiquan"><?php if($site_config['open_taoke'] == 1): ?>

                    <script>
                        layui.use('layer', function() {

                            $.getJSON("<?php echo url('index/api/gettaoke'); ?>", {},
                                function(res) {

                                    if (res.code == 200) {
                                        var a = res.data;
                                        var html = '';
                                        for (x in a) {
                                            html += ' <li class="col-xs-12 col-md-6"><div class="shop_left"><img src="' + a[x].pic + '" alt="' + a[x].title + '" class="shop_logo"></div><div class="shop_right"><h4>' + a[x].title + '</h4><span><k style="font-size: 23px; color: #FF5722;">¥' + Math.ceil(a[x].price - a[x].quan, 2) + '</k> <font style="text-decoration:line-through">' + a[x].price + '元</font></span><a href="' + a[x].link + '" title="' + a[x].title + '" target="_blank">领券购买</a></div></li>';
                                            //  html += '<li style="margin-top: 0;">' + a[x].title + '，满' + a[x].manjian + '减￥' + a[x].value + '</li>';
                                        }

                                        $("#youhuiquan").html(html);
                                    }

                                }, {
                                    type: 'get'
                                });


                        });
                    </script>

                    <?php else: if(is_array($art_choice) || $art_choice instanceof \think\Collection || $art_choice instanceof \think\Paginator): $i = 0; $__LIST__ = $art_choice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="col-xs-12 col-md-6">
                        <div class="shop_left">
                            <img src="<?php echo $vo['coverpic']?$vo['coverpic'].'thumb.png':DEF_COVER; ?>" alt="<?php echo $vo['title']; ?>" class="shop_logo">
                        </div>
                        <div class="shop_right">
                            <h4><?php echo $vo['title']; ?></h4>
                            <span><?php echo $vo['view']; ?><font>℃</font></span>
                            <a href="<?php echo url( 'index/index/'.$vo['template'],array( 'id'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>" target="_blank">查看详情</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 排行榜结束和推荐 结束 -->
    <?php echo hook('friendlinkshow',array('onwhere'=>'cms')); ?>
</div>
<div class="eventCode"></div>
<ul class="danmulist clearfix hidden-xs hidden-sm"> </ul>
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