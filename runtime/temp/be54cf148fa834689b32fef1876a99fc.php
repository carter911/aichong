<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/system_ota.html";i:1524969904;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">

        <li class="layui-this">OTA配置</li>
    </ul>
</div>

<form class="layui-form form-container" data-url="<?php echo url('admin/system/updateota'); ?>" localtion-url="<?php echo url('system/ota'); ?>">

    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <div class="layui-form-item">
                <label class="layui-form-label">UpdateUrl</label>
                <div class="layui-input-inline">
                    <input type="text" name="updateurl" required lay-verify="required" value="<?php echo (isset($ota_info['updateurl']) && ($ota_info['updateurl'] !== '')?$ota_info['updateurl']:'http://www.laysns.com/api/index/update'); ?>" autocomplete="off" class="layui-input" style="width:300px">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">UpdateKey</label>
                <div class="layui-input-inline">
                    <input type="text" name="updatekey" required lay-verify="required" value="<?php echo (isset($ota_info['updatekey']) && ($ota_info['updatekey'] !== '')?$ota_info['updatekey']:''); ?>" autocomplete="off" class="layui-input" style="width:300px">
                </div>
                <div class="label-tint">点击 <a href="http://www.laysns.com/apps/developer/myupkey.html" target="_blank">http://www.laysns.com/apps/developer/myupkey</a> 去申请</div>

            </div>

        </div>
    </div>
    <div class="formbtngroup">
        <button class="layui-btn layui-btn-sm" lay-submit="" type="submit" lay-filter="formadd">保存</button>
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