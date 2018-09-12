<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:44:"./template/u_default/html/index_article.html";i:1523549922;s:41:"./template/u_default/html/index_base.html";i:1524152192;s:43:"./template/u_default/html/index_header.html";i:1525109310;s:41:"./template/u_default/html/index_menu.html";i:1522394742;s:43:"./template/u_default/html/index_footer.html";i:1522981432;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title>我的文章 - <?php echo $site_config['site_title']; ?> - <?php echo $site_config['seo_title']; ?></title>


<meta name="keywords" content="<?php echo $site_config['seo_keyword']; ?>">
<meta name="description" content="<?php echo $site_config['seo_description']; ?>"> 

    <link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico">
    <link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="__PUBLIC__/css/font.css">
    <link rel="stylesheet" href="__PUBLIC__/css/globall.css"> 
    <script src="__PUBLIC__/plugins/layui/layui.js"></script>

</head>

<body>
    <div class="fly-header layui-bg-cyan" style="border-bottom: 1px solid #01AAED;">
    <div class="layui-container">
        <a class="fly-logo" href="<?php echo url((CBOPEN==2?'bbs':'index').'/index/index'); ?>" style="top: 0;">
            <img src="__ROOT__<?php echo (isset($site_config['uclogo']) && ($site_config['uclogo'] !== '')?$site_config['uclogo']:'__PUBLIC__images/logo.png'); ?>" alt="laysns" style="height:60px" /></a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <?php if(CBOPEN==3||CBOPEN==1): ?>
            <li class="layui-nav-item">
                <a href="<?php echo url('index/index/index'); ?>" target="_self" title="">
                    <i class="layui-icon"></i>CMS首页 </a>
            </li><?php endif; if(CBOPEN==3||CBOPEN==2): ?>
            <li class="layui-nav-item">
                <a href="<?php echo url('bbs/index/index'); ?>" target="_self" title="">
                    <i class="layui-icon"></i>社区首页 </a>
            </li>
            <?php endif; if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pid'] == '1'): ?>
            <li class="layui-nav-item">
                <a href="<?php echo getnavlink($vo['link'],$vo['sid']); ?>" target="<?php echo $vo['target']; ?>" title="<?php echo $vo['alias']; ?>">
                    <i class="layui-icon"><?php echo $vo['icon']; ?></i><?php echo $vo['name']; ?>
                </a>
            </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul class="layui-nav fly-nav-user">
            <?php if(\think\Session::get('userid') != ''): ?>
            <!-- 登录后的状态 -->
            <li class="layui-nav-item">
                <a class="fly-nav-avatar" href="javascript:;">
                    <cite class="layui-hide-xs"><?php echo \think\Session::get('username'); ?></cite>

                    <img src="<?php echo getheadurl(\think\Session::get('userhead')); ?>"></a>

                <dl class="layui-nav-child">
                    <dd>
                        <a href="<?php echo url('user/index/index'); ?>">
                            <i class="layui-icon">&#xe612;</i>个人中心</a>

                    </dd><?php if(CBOPEN==3||CBOPEN==1): ?>
                    <dd>
                        <a href="<?php echo url('index/index/index'); ?>">
                            <i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>CMS首页</a>
                    </dd><?php endif; if(CBOPEN==3||CBOPEN==2): ?>
                    <dd>
                        <a href="<?php echo url('bbs/index/index'); ?>">
                            <i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>进入社区</a>
                    </dd><?php endif; ?>

                    <hr style="margin: 5px 0;">
                    <dd>
                        <a data-url="<?php echo url('user/login/logout'); ?>" location-url="<?php echo url('bbs/index/index'); ?>" href="javascript:void(0)" class="logi_logout" style="text-align: center;">退出</a></dd>
                </dl>
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
            <li class="layui-nav-item"><a href="<?php echo url('user/login/index'); ?>">登录</a></li>
            <li class="layui-nav-item"><a href="<?php echo url('user/login/reg'); ?>">注册</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div> 
<div class="layui-container fly-marginTop fly-user-main">
    <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/home',array('id'=>$uid)); ?>">
            <i class="layui-icon">&#xe609;</i> 我的主页
        </a>
    </li>
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/index'); ?>">
            <i class="layui-icon">&#xe612;</i> 个人中心
        </a>
    </li>
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/set'); ?>">
            <i class="layui-icon">&#xe620;</i> 基本设置
        </a>
    </li>
    <?php if(CBOPEN==3||CBOPEN==2): ?>
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/topic'); ?>">
            <i class="layui-icon">&#xe705;</i> 我的帖子
        </a>
    </li>
    <?php endif; if(CBOPEN==3||CBOPEN==1): ?>
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/article'); ?>">
            <i class="layui-icon">&#xe705;</i> 我的文章
        </a>
    </li>
    <?php endif; ?>
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/comment'); ?>">
            <i class="layui-icon">&#xe63c;</i> 我的回复
        </a>
    </li>
    <li class="layui-nav-item">
        <a href="<?php echo url('user/index/message'); ?>">
            <i class="layui-icon">&#xe611;</i> 我的消息
        </a>
    </li>
</ul>
<script>
    layui.use(['jquery', 'element'], function() {
        var jq = layui.jquery;
        var element = layui.element;
        //显示当前tab
        if (location.hash) {
            element.tabChange('user', location.hash.replace(/^#/, ''));
        }

        element.on('tab(user)', function() {
            var othis = jq(this),
                layid = othis.attr('lay-id');
            if (layid) {
                location.hash = layid;
            }
        });

        var treeMobile = jq('.site-tree-mobile'),
            shadeMobile = jq('.site-mobile-shade');

        treeMobile.on('click', function() {
            jq('body').addClass('site-mobile');
        });

        shadeMobile.on('click', function() {
            jq('body').removeClass('site-mobile');
        });
        //----------动态添加导航active样式--------------
        var _nava = jq('.layui-nav .layui-nav-item a');
        var _url = window.location.href;
        var _host = window.location.host;
        for (var i = 0; i < _nava.length; i++) {
            var _astr = _nava.eq(i).attr('href');
            // alert(_astr);
            if (_url.indexOf(_astr) != -1) {

                _nava.eq(i).addClass('layui-this').siblings().removeClass('layui-this');
            } else if (_url == ('http://' + _host + '/')) {
                _nava.eq(0).addClass('layui-this').siblings().removeClass('layui-this');
            }
        }
        //----------动态添加导航active样式结束------------
    })
</script>
<div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
</div>
<div class="site-mobile-shade"></div>
    <div class="fly-panel fly-panel-user" pad20>
        <!--
    <div class="fly-msg" style="margin-top: 15px;">
      您的邮箱尚未验证，这比较影响您的帐号安全，<a href="activate.html">立即去激活？</a>
    </div>
    -->
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title" id="LAY_mine">
                <li data-type="mine-jie" lay-id="index" class="layui-this">我发的文章（
                    <span><?php echo $count; ?></span>）</li>
                <li lay-id="collection">我收藏的文章（<?php echo $count_collect; ?>）</li>
                <li><a href="<?php echo url('index/articles/add'); ?>">发布文章</a></li>
            </ul>
            <div class="layui-tab-content" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">

                    <table id="demo" lay-filter="test"></table>

                </div>
                <div class="layui-tab-item">
                    <table id="myCollection" lay-filter="test11"></table>

                    <script type="text/javascript">
                        //帖子收藏
                        layui.use(['form', 'laytpl', 'form', 'element', 'table', 'util'], function() {
                            var form = layui.form,
                                jq = layui.jquery;
                            var util = layui.util;
                            var laytpl = layui.laytpl;

                            var element = layui.element;

                            var table = layui.table;

                            //我发表的文章
                            table.render({
                                elem: '#demo',
                                url: "<?php echo url('index/api/getMyItem'); ?>" //数据接口
                                    ,
                                method: 'post',
                                where: {
                                    item: 'article'
                                },
                                cols: [
                                    [{
                                        field: 'title',
                                        title: '文章标题',
                                        minWidth: 300,
                                        templet: '<div><a href="{{d.template}}/{{ d.id }}.html" target="_blank" class="layui-table-link">{{ d.title }}</a></div>'
                                    }, {
                                        title: '栏目',
                                        width: 100,
                                        templet: '<div><span style="font-size: 12px;">{{d.catename}}</span></div>'
                                    }, {
                                        field: 'open',
                                        title: '状态',
                                        width: 100,
                                        align: 'center',
                                        templet: function(d) {
                                            if (d.open == 1) {
                                                return '<span style="color: #999;">正常</span>';
                                            } else if (d.open == 0) {
                                                return '<span style="color: #ccc;">待审核</span>';
                                            } else {
                                                return '<span style="color: #FF5722;">站长禁显</span>'
                                            }
                                        }
                                    }, {
                                        field: 'time',
                                        title: '发表时间',
                                        width: 120,
                                        align: 'center',
                                        templet: '<div>{{ layui.util.timeAgo(d.time*1000, 1) }}</div>'
                                    }, {
                                        title: '数据',
                                        width: 60,
                                        templet: '<div><span style="font-size: 12px;">{{d.view}}阅</span></div>'
                                    }, {
                                        title: '操作',
                                        width: 100,
                                        templet: function(d) {
                                            return d.open == 1 ? '<a class="layui-btn layui-btn-sm" href="/artedit/' + d.id + '" target="_blank">编辑</a>' : ''
                                        }
                                    }]
                                ],
                                page: true,
                                skin: 'line'
                            });
                            //我收藏的文章
                            table.render({
                                elem: '#myCollection',
                                url: "<?php echo url('index/api/getMyCollect'); ?>" //数据接口
                                    ,
                                method: 'post',
                                where: {
                                    ctype: 3,
                                    item: 'article'
                                },
                                cols: [
                                    [{
                                        field: 'title',
                                        title: '文章标题',
                                        minWidth: 300,
                                        templet: '<div><a href="{{d.template}}/{{ d.fid }}.html" target="_blank" class="layui-table-link">{{ d.title }}</a></div>'

                                    }, {
                                        field: 'username',
                                        title: '作者',
                                        minWidth: 300,
                                        templet: '<div><a href="/home/{{ d.zuid }}.html" target="_blank" class="layui-table-link">{{ d.username }}</a></div>'
                                    }, {
                                        field: 'time',
                                        title: '收藏时间',
                                        width: 120,
                                        align: 'center',
                                        templet: '<div>{{ layui.util.timeAgo(d.time*1000, 1) }}</div>'
                                    }]
                                ],
                                page: true,
                                skin: 'line'
                            });



                            jq('.discollect').click(function() {

                                var idnum = jq(this).data('id');
                                var obj = jq(this);
                                layer.confirm('取消收藏', {
                                    icon: 3,
                                    title: '提示'
                                }, function(index) {

                                    jq.post('<?php echo url("index/api/zan_collect"); ?>', {
                                        'zan_collect': 'collect',
                                        'id': idnum,
                                        'type': 1
                                    }, function(data) {
                                        if (data.code == 201) {
                                            jq(obj).parent().remove();
                                            layer.msg(data.msg, {
                                                icon: 1,
                                                time: 1000
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
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="fly-footer">
    <p>
        <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/"><?php echo $site_config['site_title']; ?></a> <?php echo date('Y'); ?> &copy;
        <!-- 个人用户保留下面一句，谢谢 -->
        <a target="_blank" href="http://www.laysns.com/">LaySNS v<?php echo $site_config['version']; ?></a>
    </p>
    <!-- 底部导航 -->
    <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <p>
        <?php if($vo['pid'] == '0'): ?>
        <a class="nav-this" href="<?php echo $vo['link']; ?>" target="<?php echo $vo['target']; ?>" title="<?php echo $vo['alias']; ?>">
            <i class="iconfont icon-<?php echo $vo['icon']; ?>"></i><?php echo $vo['name']; ?>
        </a>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </p>
    <!-- 底部导航结束 -->
    <p>
        <?php if($site_config['site_copyright'] != ''): ?> Copyright:<?php echo $site_config['site_copyright']; endif; ?> <?php echo $site_config['site_icp']; if($site_config['site_tongji'] != ''): ?> <?php echo $site_config['site_tongji']; endif; ?>
    </p>
</div>  
    <!--页面JS脚本-->
    
</body>
<script src="__PUBLIC__/js/home.js"></script>

</html>