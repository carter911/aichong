<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:97:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/site_config.html";i:1525135894;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<link rel="stylesheet" href="__ADMIN__/plugins/wangEditor/css/wangEditor.min.css">
<style type="text/css">
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
    
    .tpt_sels a em {
        width: 12px;
        height: 12px;
        font-style: normal;
        display: block;
        position: absolute;
        top: 7px;
        right: 4px;
        z-index: 2;
        background: url(__ADMIN__/images/sx.png) no-repeat 0 0;
    }
</style>

<!--tab标签-->
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">SEO配置</li>
        <li>基本配置</li>
        <li>显示配置</li>
        <li>邮箱配置</li>
        <li>积分规则</li>
        <li>服务配置</li>
        <li><a target="_self" href="<?php echo url('admin/system/ota'); ?>">OTA配置</a></li>
    </ul>


    <form class="layui-form form-container layui-tab-content" data-url="<?php echo url('admin/system/updateSiteConfig'); ?>" localtion-url="<?php echo url('admin/system/siteConfig'); ?>">

        <div class="layui-tab-item layui-show">

            <div class="layui-form-item">
                <label class="layui-form-label">网站标题</label>
                <div class="layui-input-inline">
                    <input type="text" name="site_config[site_title]" value="<?php echo (isset($site_config['site_title']) && ($site_config['site_title'] !== '')?$site_config['site_title']:''); ?>" required lay-verify="required" placeholder="请输入网站标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">网站Logo</label>
                <div class="layui-input-inline">
                    <button type="button" class="layui-btn uploadlogo" data-id="cms">上传CMS Logo</button>
                </div>
                <div class="layui-input-inline">
                    <button type="button" class="layui-btn uploadlogo" data-id="bbs">上传BBS Logo</button>
                </div>
                <div class="layui-input-inline">
                    <button type="button" class="layui-btn uploadlogo" data-id="uc">上传用户中心 Logo</button>
                </div>
            </div>
            <div class="layui-upload-list">
                <label class="layui-form-label"></label>
                <input type="hidden" name="site_config[cmslogo]" value="<?php echo (isset($site_config['cmslogo']) && ($site_config['cmslogo'] !== '')?$site_config['cmslogo']:''); ?>" id="cmsval" />
                <input type="hidden" name="site_config[bbslogo]" value="<?php echo (isset($site_config['bbslogo']) && ($site_config['bbslogo'] !== '')?$site_config['bbslogo']:''); ?>" id="bbsval" />
                <input type="hidden" name="site_config[uclogo]" value="<?php echo (isset($site_config['uclogo']) && ($site_config['uclogo'] !== '')?$site_config['uclogo']:''); ?>" id="ucval" />
                <img class="layui-upload-img" id="cmspic" src="__ROOT__<?php echo (isset($site_config['cmslogo']) && ($site_config['cmslogo'] !== '')?$site_config['cmslogo']:''); ?>" style="width: 170px;height:100px;margin-right:25px">
                <img class="layui-upload-img" id="bbspic" src="__ROOT__<?php echo (isset($site_config['bbslogo']) && ($site_config['bbslogo'] !== '')?$site_config['bbslogo']:''); ?>" style="width: 170px;height:100px;margin-right:25px">
                <img class="layui-upload-img" id="ucpic" src="__ROOT__<?php echo (isset($site_config['uclogo']) && ($site_config['uclogo'] !== '')?$site_config['uclogo']:''); ?>" style="width: 170px;height:100px">
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">SEO标题</label>
                <div class="layui-input-block">
                    <input type="text" name="site_config[seo_title]" value="<?php echo (isset($site_config['seo_title']) && ($site_config['seo_title'] !== '')?$site_config['seo_title']:''); ?>" placeholder="请输入SEO标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">SEO关键字</label>
                <div class="layui-input-block">
                    <input type="text" name="site_config[seo_keyword]" value="<?php echo (isset($site_config['seo_keyword']) && ($site_config['seo_keyword'] !== '')?$site_config['seo_keyword']:''); ?>" placeholder="请输入SEO关键字" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">SEO说明</label>
                <div class="layui-input-block">
                    <textarea name="site_config[seo_description]" placeholder="请输入SEO说明" class="layui-textarea"><?php echo (isset($site_config['seo_description']) && ($site_config['seo_description'] !== '')?$site_config['seo_description']:''); ?></textarea>
                </div>
            </div>




            <div class="layui-form-item">
                <label class="layui-form-label">版权信息</label>
                <div class="layui-input-block">
                    <input type="text" name="site_config[site_copyright]" value="<?php echo (isset($site_config['site_copyright']) && ($site_config['site_copyright'] !== '')?$site_config['site_copyright']:''); ?>" placeholder="请输入版权信息" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">ICP备案号</label>
                <div class="layui-input-block">
                    <input type="text" name="site_config[site_icp]" value="<?php echo (isset($site_config['site_icp']) && ($site_config['site_icp'] !== '')?$site_config['site_icp']:''); ?>" placeholder="请输入版权信息" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">统计代码</label>
                <div class="layui-input-block">
                    <textarea name="site_config[site_tongji]" placeholder="请输入统计代码" class="layui-textarea"><?php echo (isset($site_config['site_tongji']) && ($site_config['site_tongji'] !== '')?$site_config['site_tongji']:''); ?></textarea>
                </div>
            </div>


        </div>
        <div class="layui-tab-item">

            <div class="layui-form-item">
                <div class="layui-form-item">
                    <label class="layui-form-label">CMS/BBS</label>
                    <div class="layui-input-block">
                        <input type="radio" name="site_config[cb_open]" value="3" title="全开" <?php if($site_config['cb_open'] == 3): ?>checked<?php endif; ?>>
                        <input type="radio" name="site_config[cb_open]" value="1" title="只开CMS" <?php if($site_config['cb_open'] == 1): ?>checked<?php endif; ?>>
                        <input type="radio" name="site_config[cb_open]" value="2" title="只开BBS" <?php if($site_config['cb_open'] == 2): ?>checked<?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">开启DeBug</label>
                    <div class="layui-input-block">
                        <input type="radio" name="site_config[site_wjt]" value="1" title="开启" <?php if($site_config['site_wjt'] == 1): ?>checked<?php endif; ?>>
                        <input type="radio" name="site_config[site_wjt]" value="0" title="关闭" <?php if($site_config['site_wjt'] == 0): ?>checked<?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">会员注册</label>
                    <div class="layui-input-inline">
                        <input type="radio" name="site_config[user_reg]" value="1" title="开启" <?php if($site_config['user_reg'] == 1): ?>checked<?php endif; ?>>
                        <input type="radio" name="site_config[user_reg]" value="0" title="关闭" <?php if($site_config['user_reg'] == 0): ?>checked<?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发文章审核</label>
                    <div class="layui-input-inline">
                        <input type="radio" name="site_config[article_sh]" value="0" title="开启" <?php if($site_config['article_sh'] == 0): ?>checked<?php endif; ?>>
                        <input type="radio" name="site_config[article_sh]" value="1" title="关闭" <?php if($site_config['article_sh'] == 1): ?>checked<?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发帖审核</label>
                    <div class="layui-input-inline">
                        <input type="radio" name="site_config[forum_sh]" value="0" title="开启" <?php if($site_config['forum_sh'] == 0): ?>checked<?php endif; ?>>
                        <input type="radio" name="site_config[forum_sh]" value="1" title="关闭" <?php if($site_config['forum_sh'] == 1): ?>checked<?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div>
                        <label class="layui-form-label">邮箱验证</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="site_config[email_sh]" value="0" title="开启" <?php if($site_config['email_sh'] == 0): ?>checked<?php endif; ?>>
                            <input type="radio" name="site_config[email_sh]" value="1" title="关闭" <?php if($site_config['email_sh'] == 1): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    <div class="label-tint">开启邮箱验证后，未激活邮箱的用户无法发帖和评论</div>
                </div>

                <div class="layui-form-item">
                    <div>
                        <label class="layui-form-label">验证码场景</label>
                        <div class="layui-input-inline">
                            <input type="text" name="site_config[site_yzm]" value="<?php echo (isset($site_config['site_yzm']) && ($site_config['site_yzm'] !== '')?$site_config['site_yzm']:''); ?>" required lay-verify="required" placeholder="验证码场景" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="label-tint">1\注册2\登录3\忘记密码4\后台登录[填写数字时用半角括号隔开，否则无效。如1,2]</div>
                </div>

                <div class="layui-form-item">
                    <div>
                        <label class="layui-form-label">缩略图宽度</label>
                        <div class="layui-input-inline">
                            <input type="number" name="site_config[thumb_width]" value="<?php echo (isset($site_config['thumb_width']) && ($site_config['thumb_width'] !== '')?$site_config['thumb_width']:'400'); ?>" required lay-verify="required" placeholder="验证码场景" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="label-tint">单位：px;对于图片上传到本地有效</div>
                </div>
                <div class="layui-form-item">
                    <div>
                        <label class="layui-form-label">上传后缀</label>
                        <div class="layui-input-inline">
                            <input type="text" name="site_config[upext]" value="<?php echo (isset($site_config['upext']) && ($site_config['upext'] !== '')?$site_config['upext']:'jpg,png,bmp,rar,zip'); ?>" required lay-verify="required" placeholder="上传文件后缀" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="label-tint">jpg,png,bmp,rar,zip</div>
                </div>
                <div class="layui-form-item">
                    <div>
                        <label class="layui-form-label">上传大小限制</label>
                        <div class="layui-input-inline">
                            <input type="text" name="site_config[upsize]" value="<?php echo (isset($site_config['upsize']) && ($site_config['upsize'] !== '')?$site_config['upsize']:'5*1024*1024'); ?>" required lay-verify="required" placeholder="上传文件后缀" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="label-tint">字节数，1M=1*1024*1024</div>
                </div>

            </div>
        </div>

        <div class="layui-tab-item">
            <fieldset class="layui-elem-field layui-field-title">
                <legend>CMS相关条数控制</legend>
            </fieldset>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width:90px">首页最近更新</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_home_newlist]" value="<?php echo (isset($site_config['c_home_newlist']) && ($site_config['c_home_newlist'] !== '')?$site_config['c_home_newlist']:20); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">首页文字栏目</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_home_text]" value="<?php echo (isset($site_config['c_home_text']) && ($site_config['c_home_text'] !== '')?$site_config['c_home_text']:10); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">首页图片栏目</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_home_pic]" value="<?php echo (isset($site_config['c_home_pic']) && ($site_config['c_home_pic'] !== '')?$site_config['c_home_pic']:10); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width:90px">列表页主体</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_list_main]" value="<?php echo (isset($site_config['c_list_main']) && ($site_config['c_list_main'] !== '')?$site_config['c_list_main']:10); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">列表页排行榜</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_list_phb]" value="<?php echo (isset($site_config['c_list_phb']) && ($site_config['c_list_phb'] !== '')?$site_config['c_list_phb']:10); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">列表页推荐</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_list_choice]" value="<?php echo (isset($site_config['c_list_choice']) && ($site_config['c_list_choice'] !== '')?$site_config['c_list_choice']:10); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width:90px">详情页主体</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_view_main]" value="<?php echo (isset($site_config['c_view_main']) && ($site_config['c_view_main'] !== '')?$site_config['c_view_main']:15); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">详情页排行榜</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[c_view_phb]" value="<?php echo (isset($site_config['c_view_phb']) && ($site_config['c_view_phb'] !== '')?$site_config['c_view_phb']:10); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <fieldset class="layui-elem-field layui-field-title">
                <legend>BBS相关条数控制</legend>
            </fieldset>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width:90px">首页置顶数</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_home_settop]" value="<?php echo (isset($site_config['b_home_settop']) && ($site_config['b_home_settop'] !== '')?$site_config['b_home_settop']:5); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">首页主体</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_home_main]" value="<?php echo (isset($site_config['b_home_main']) && ($site_config['b_home_main'] !== '')?$site_config['b_home_main']:15); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">首页回帖榜</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_home_phb]" value="<?php echo (isset($site_config['b_home_phb']) && ($site_config['b_home_phb'] !== '')?$site_config['b_home_phb']:12); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">首页热议</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_home_hot]" value="<?php echo (isset($site_config['b_home_hot']) && ($site_config['b_home_hot'] !== '')?$site_config['b_home_hot']:15); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width:90px">板块页主体</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_list_main]" value="<?php echo (isset($site_config['b_list_main']) && ($site_config['b_list_main'] !== '')?$site_config['b_list_main']:15); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">板块页热议</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_list_hot]" value="<?php echo (isset($site_config['b_list_hot']) && ($site_config['b_list_hot'] !== '')?$site_config['b_list_hot']:15); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">板块页发帖榜</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_list_phb]" value="<?php echo (isset($site_config['b_list_phb']) && ($site_config['b_list_phb'] !== '')?$site_config['b_list_phb']:12); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width:90px">帖子页回帖数</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_view_reply]" value="<?php echo (isset($site_config['b_view_reply']) && ($site_config['b_view_reply'] !== '')?$site_config['b_view_reply']:5); ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="width:90px">帖子页热议</label>
                <div class="layui-input-inline" style="width:50px">
                    <input type="number" name="site_config[b_view_hot]" value="<?php echo (isset($site_config['b_view_hot']) && ($site_config['b_view_hot'] !== '')?$site_config['b_view_hot']:15); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-tab-item">

            <div class="layui-form-item">
                <label class="layui-form-label">SMTP 服务器</label>
                <div class="layui-input-inline">
                    <input type="text" name="site_config[smtp_server]" value="<?php echo (isset($site_config['smtp_server']) && ($site_config['smtp_server'] !== '')?$site_config['smtp_server']:''); ?>" placeholder="SMTP 服务器" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">SMTP服务器的端口号</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[smtp_port]" value="<?php echo (isset($site_config['smtp_port']) && ($site_config['smtp_port'] !== '')?$site_config['smtp_port']:''); ?>" placeholder="SMTP服务器的端口号" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">SMTP服务器用户名</label>
                <div class="layui-input-inline">
                    <input type="text" name="site_config[smtp_user]" value="<?php echo (isset($site_config['smtp_user']) && ($site_config['smtp_user'] !== '')?$site_config['smtp_user']:''); ?>" placeholder="SMTP服务器用户名" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">SMTP服务器密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="site_config[smtp_pass]" value="<?php echo (isset($site_config['smtp_pass']) && ($site_config['smtp_pass'] !== '')?$site_config['smtp_pass']:''); ?>" placeholder="SMTP服务器密码" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">邮箱激活邮件模板</label>
                <div class="layui-input-block">

                    <textarea id="jihuo" name="site_config[mail_tpl_active]" style="width:100%;height:100px">
                      <?php echo (isset($site_config['mail_tpl_active']) && ($site_config['mail_tpl_active'] !== '')?$site_config['mail_tpl_active']:''); ?></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">找回密码邮件模板</label>
                <div class="layui-input-block">

                    <textarea id="givepwd" name="site_config[mail_tpl_resetpwd]" style="width:100%;height:100px">
                      <?php echo (isset($site_config['mail_tpl_resetpwd']) && ($site_config['mail_tpl_resetpwd'] !== '')?$site_config['mail_tpl_resetpwd']:''); ?></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">站长邮箱</label>
                <div class="layui-input-inline">
                    <input type="text" id="J_email" name="site_config[smtp_cs]" value="<?php echo (isset($site_config['smtp_cs']) && ($site_config['smtp_cs'] !== '')?$site_config['smtp_cs']:''); ?>" placeholder="邮件地址为空时，默认使用后台默认邮件测试地址" autocomplete="off" class="layui-input">
                </div>
                <input type="button" id="J_mail_test" value="发送测试邮件" class="layui-btn layui-btn">
            </div>


        </div>
        <div class="layui-tab-item">
            <div class="layui-form-item">
                <label class="layui-form-label">积分名称</label>
                <div class="layui-input-inline">
                    <input type="text" name="site_config[jifen_name]" value="<?php echo (isset($site_config['jifen_name']) && ($site_config['jifen_name'] !== '')?$site_config['jifen_name']:'积分'); ?>" placeholder="请填写积分的别名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱验证</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[jifen_email]" value="<?php echo (isset($site_config['jifen_email']) && ($site_config['jifen_email'] !== '')?$site_config['jifen_email']:'0'); ?>" placeholder="请填写整数" min="0" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">注册</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[jifen_reg]" value="<?php echo (isset($site_config['jifen_reg']) && ($site_config['jifen_reg'] !== '')?$site_config['jifen_reg']:'0'); ?>" placeholder="请填写整数" min="0" autocomplete="off" class="layui-input">
                </div>

            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">登录</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[jifen_login]" value="<?php echo (isset($site_config['jifen_login']) && ($site_config['jifen_login'] !== '')?$site_config['jifen_login']:'0'); ?>" placeholder="请填写整数" min="0" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">发布帖子</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[jifen_add]" value="<?php echo (isset($site_config['jifen_add']) && ($site_config['jifen_add'] !== '')?$site_config['jifen_add']:'0'); ?>" placeholder="请填写整数" min="0" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">回复帖子</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[jifen_comment]" value="<?php echo (isset($site_config['jifen_comment']) && ($site_config['jifen_comment'] !== '')?$site_config['jifen_comment']:'0'); ?>" placeholder="请填写整数" min="0" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">发布文章</label>
                <div class="layui-input-inline">
                    <input type="number" name="site_config[jifen_artadd]" value="<?php echo (isset($site_config['jifen_artadd']) && ($site_config['jifen_artadd'] !== '')?$site_config['jifen_artadd']:'0'); ?>" placeholder="请填写整数" min="0" autocomplete="off" class="layui-input">
                </div>
            </div>

        </div>

        <div class="layui-tab-item">
            <div class="layui-form-item">
                <label class="layui-form-label">淘客推广</label>
                <div class="layui-input-inline">
                    <input type="radio" name="site_config[open_taoke]" value="1" title="开启" <?php if(@$site_config['open_taoke'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="site_config[open_taoke]" value="0" title="关闭" <?php if(@$site_config['open_taoke'] == 0): ?>checked<?php endif; ?>>
                </div>
                <!--<input type="button"   value="积分规则" class="layui-btn layui-btn">-->
                <a href="<?php echo url('admin/system/taoke'); ?>" class="layui-btn layui-btn" style="float:left">
                    淘客配置
                </a>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">开启签到</label>
                <div class="layui-input-inline">
                    <input type="radio" name="site_config[open_sign]" value="1" title="开启" <?php if($site_config['open_sign'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="site_config[open_sign]" value="0" title="关闭" <?php if($site_config['open_sign'] == 0): ?>checked<?php endif; ?>>
                </div>
                <!--<input type="button"   value="积分规则" class="layui-btn layui-btn">-->
                <a href="<?php echo url('admin/system/signrule'); ?>" class="layui-btn layui-btn" style="float:left">
                    积分规则
                </a>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">QQ登录</label>
                <div class="layui-input-inline">
                    <input type="radio" name="site_config[open_qqlogin]" value="1" title="开启" <?php if($site_config['open_qqlogin'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="site_config[open_qqlogin]" value="0" title="关闭" <?php if($site_config['open_qqlogin'] == 0): ?>checked<?php endif; ?>>
                </div>
                <!--<input type="button"   value="积分规则" class="layui-btn layui-btn">-->
                <a href="<?php echo url('admin/system/qqlogin'); ?>" class="layui-btn layui-btn" style="float:left">
                    QQ登录配置
                </a>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">七牛存储</label>
                <div class="layui-input-inline">
                    <input type="radio" name="site_config[open_7niu]" value="1" title="开启" <?php if(@$site_config['open_7niu'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="site_config[open_7niu]" value="0" title="关闭" <?php if(@$site_config['open_7niu'] == 0): ?>checked<?php endif; ?>>
                </div>
                <!--<input type="button"   value="积分规则" class="layui-btn layui-btn">-->
                <a href="<?php echo url('admin/system/qiniu'); ?>" class="layui-btn layui-btn" style="float:left">
                    七牛配置
                </a>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">在线充值</label>
                <div class="layui-input-inline">
                    <input type="radio" name="site_config[open_pay]" value="1" title="开启" <?php if(@$site_config['open_pay'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="site_config[open_pay]" value="0" title="关闭" <?php if(@$site_config['open_pay'] == 0): ?>checked<?php endif; ?>>
                </div>
                <!--<input type="button"   value="积分规则" class="layui-btn layui-btn">-->
                <a href="<?php echo url('admin/system/pay'); ?>" class="layui-btn layui-btn" style="float:left">
                    支付配置
                </a>
            </div>
        </div>
        <div class="btable-paged">
            <div class="layui-main">
                <div class="formbtngroup">
                    <button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="formadd">提交</button>
                    <button onclick="history.go(-1);return false;" class="layui-btn layui-btn-primary layui-btn-sm">返回</button>
                </div>
            </div>
        </div>
    </form>





</div>

    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/formadd.js"></script>
<script type="text/javascript" src="__ADMIN__/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="__ADMIN__/plugins/wangEditor/js/wangEditor.min.js"></script>
<script type="text/javascript">
    var editor1 = new wangEditor('jihuo');
    var editor2 = new wangEditor('givepwd');
    editor1.config.menus = editor2.config.menus = [
        'source',
        '|', // '|' 是菜单组的分割线
        'bold',
        'underline',
        'italic',
        'strikethrough',
        'eraser',
        'forecolor',
        'bgcolor'
    ];
    editor1.create();
    editor2.create();

    // 避免上面编辑器的 dropPanel 被下面的编辑器遮挡，保证下面的编辑器的 z-index 要小于上面的编辑器
    editor1.$editorContainer.css('z-index', 20)
    editor2.$editorContainer.css('z-index', 10)
</script> 
    <!--页面JS脚本-->
    

<script>
    layui.use(['element', 'jquery', 'upload'], function() {
        var ajax_mail_test = "<?php echo url('system/ajax_mail_test'); ?>";
        var element = layui.element,
            upload = layui.upload,
            $ = layui.jquery; //导航的hover效果、二级菜单等功能，需要依赖element模块
        upload.render({
            elem: '.uploadlogo',
            url: '<?php echo url("upload/upimage"); ?>',
            done: function(res, index, upload) {

                if (res.code == '200') {

                    var item = this.item;
                    // console.log('222222');
                    // console.log(item); //获取当前触发上传的元素，layui 2.1.0 新增
                    // jq('input[name=pic]').val(res.path);
                    var btnid = item.data('id');
                    var rurl = "__ROOT__";
                    $('#' + btnid + 'val').val(res.path);

                    $('#' + btnid + 'pic').attr('src', rurl + res.path);

                    return layer.msg('上传成功');
                } else {

                    return layer.msg(res.msg);
                }
            }
        });
        $('#tpt_input').keydown(function(e) {
            if (e.which === 13) {
                $("#tpt_btn").click();
                e.preventDefault();
                return false;
            }
        });
        $('#J_mail_test').click(function() {
            var email = $('#J_email').val();

            if (email == '') {
                layer.msg('邮箱为空', {
                    icon: 2,
                    time: 1000
                }, function() {

                });

                //  return false;
            }
            $.post(ajax_mail_test, {
                email: email
            }, function(result) {

                if (result.code == 1) {

                    layer.msg(result.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {

                    });
                } else {
                    layer.msg(result.msg, {
                        icon: 2,
                        time: 1000
                    }, function() {

                    });
                }
            });
        });
    });
</script> 
</body>

</html>