<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"./template/c_default/html/articles_add.html";i:1525088158;s:41:"./template/c_default/html/index_base.html";i:1523632546;s:43:"./template/c_default/html/index_header.html";i:1525053782;s:43:"./template/c_default/html/index_footer.html";i:1525110792;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title>发布文章 - <?php echo $site_config['site_title']; ?> - <?php echo $site_config['seo_title']; ?></title>


<meta name="keywords" content="<?php echo $site_config['seo_keyword']; ?>">
<meta name="description" content="<?php echo $site_config['seo_description']; ?>"> 
    <link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico">
    <link rel="stylesheet" href="__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="__HOME__/css/public.css"> 
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
<div class="layui-container fly-marginTop">
    <div class="fly-panel" pad20="" style="padding-top: 5px;">
        <div class="layui-form layui-form-pane">
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li class="layui-this">发布文章（CMS）</li>

                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">

                        <div class="layui-row layui-col-space15 layui-form-item">
                            <div class="layui-col-md3">
                                <label class="layui-form-label">所在专栏</label>
                                <div class="layui-input-block">
                                    <select lay-verify="required" name="tid" lay-filter="tid"> 
							<?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                             <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                             <?php endforeach; endif; else: echo "" ;endif; ?>
					 </select>
                                </div>
                            </div>
                            <div class="layui-col-md9">
                                <label for="L_title" class="layui-form-label">标题</label>
                                <div class="layui-input-block">
                                    <input type="text" id="L_title" name="title" required="" lay-verify="required" autocomplete="off" class="layui-input" />
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">

                            <label class="layui-form-label">封面</label>


                            <div class="layui-input-inline">
                                <button type="button" class="layui-btn" id="image">
                                                    <i class="layui-icon">&#xe67c;</i>上传图片
                                </button>

                                <input type="text" name="coverpic" class="layui-input" style="position: absolute;left: 111px;top: 0px;width: 500px;">
                            </div>
                        </div>
                        <div class="layui-upload-list">
                            <img class="layui-upload-img" id="picshow" style="max-height: 200px">
                            <p id="demoText"></p>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <div class="layui-input-block">
                                <textarea name="description" placeholder="内容提要" class="layui-textarea fly-editor" style="height: 60px;"></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <div class="layui-input-block">
                                <textarea id="textarea" name="content" required="" lay-verify="required" placeholder="详细描述" class="layui-textarea fly-editor" style="height: 260px;"></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="L_title" class="layui-form-label">关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="kewords" autocomplete="off" placeholder="多个关键词之间以逗号（,）分割" class="layui-input" />
                            </div>
                        </div>
                        <?php echo hook('attachlinkadd'); ?>
                        <input id="attachsize" name="size" type="hidden" />
                        <div class="layui-form-item">
                            <button class="layui-btn" lay-filter="forum_add" lay-submit="">立即发布</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    

<script type="text/javascript" src="__PUBLIC__/plugins/wangEditor/js/wangEditor.js"></script>

<script type="text/javascript">
    var editor = new wangEditor('textarea');
    $.getJSON("<?php echo url('index/api/getemotion'); ?>", function(data) {
        editor.config.uploadImgUrl = '<?php echo url("index/upload/wangeditor_upimage"); ?>';
        editor.config.uploadImgFileName = 'FileName';
        var emotiondata;
        emotiondata = data;
        emotiondata = JSON.parse(emotiondata);
        editor.config.emotions = emotiondata;
        editor.config.menus = ['bold', 'fontfamily', 'fontsize', 'forecolor', 'link', 'unlink', 'emotion', 'img', 'insertcode', 'fullscreen'];

        editor.config.pasteText = false;
        editor.create();
    });
</script>
<script>
    layui.use(['form', 'upload'], function() {
        var form = layui.form,
            upload = layui.upload,
            jq = layui.jquery;

        upload.render({
            elem: '#image',
            url: "<?php echo url('index/upload/upimage'); ?>",
            before: function(obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result) {
                    jq('#picshow').attr('src', result); //图片链接（base64）
                });
            },
            done: function(res) {

                if (res.code == '200') {
                    jq('input[name=coverpic]').val(res.headpath);
                    return layer.msg('上传成功');
                } else {

                    return layer.msg(res.msg);
                }

            }
        });
        form.verify({
            titlea: function(value) {
                if (value.length < 5) {
                    return '标题必须大于5位';
                }
            },
            titleb: function(value) {
                if (value.length > 32) {
                    return '标题必须小于32位';
                }
            }
        });

        form.on('submit(forum_add)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            //  data.filed.content=jq('#textarea').val();
            var param = data.field;

            jq.post("<?php echo url('index/articles/add'); ?>", param, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        location.href = "<?php echo url('user/index/article'); ?>";
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

</html>