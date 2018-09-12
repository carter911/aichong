<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:98:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/system_taoke.html";i:1524840328;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<form class="layui-form form-container" data-url="<?php echo url('admin/system/updatetaoke'); ?>" localtion-url="<?php echo url('system/siteConfig'); ?>">

    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <div class="layui-form-item">
                <label class="layui-form-label">推广方式</label>
                <div class="layui-input-inline">
                    <input type="radio" name="taoke[type]" value="1" title="API" <?php if(@$taoke['type'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="taoke[type]" value="2" title="网站" <?php if(@$taoke['type'] == 2): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">领券商品API</label>
                <div class="layui-input-block">
                    <input type="text" name="taoke[quan_api]" value="<?php echo (isset($taoke['quan_api']) && ($taoke['quan_api'] !== '')?$taoke['quan_api']:''); ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="label-tint">点击 <a href="http://www.dataoke.com/" target="_blank">http://www.dataoke.com/</a> 申请</div>

            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">CMS网站</label>
                <div class="layui-input-inline">
                    <input type="text" name="taoke[url]" value="<?php echo (isset($taoke['url']) && ($taoke['url'] !== '')?$taoke['url']:''); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

        </div>
    </div>
    <div class="formbtngroup">
        <button id="creatlink" class="layui-btn layui-btn-sm" lay-submit="" type="submit" lay-filter="formadd">保存</button>
        <button onclick="history.go(-1);return false;" class="layui-btn layui-btn-primary layui-btn-sm">返回</button>
    </div>
</form>


    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/formadd.js"></script>


    <!--页面JS脚本-->
    
</body>

</html>