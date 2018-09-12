<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/system_pay.html";i:1524150388;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<form class="layui-form form-container" data-url="<?php echo url('admin/system/updatepay'); ?>" localtion-url="<?php echo url('system/siteConfig'); ?>">

    <div class="layui-form-item">
        <label class="layui-form-label" style="width:150px">支付方式</label>
        <div class="layui-input-block">
            <input type="radio" name="paytype" value="1" title="柚子支付" <?php if(@$pay_info['paytype'] == 1): ?>checked<?php endif; ?>>

            <input type="radio" name="paytype" value="2" title="支付宝" <?php if(@$pay_info['paytype'] == 2): ?>checked<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item" style="display:none">
        <div>
            <label style="width:150px" class="layui-form-label">支付接口地址：</label>
            <div class="layui-input-block">

                <input type="text" style="width:350px" name="apiurl" class="layui-input" value="http://www.youzipay.com/">

            </div>
        </div>
        <div class="label-tint">
            第三方支付平台支付接口地址 </div>
    </div>

    <div class="layui-form-item">



        <div>
            <label style="width:150px" class="layui-form-label">ID：</label>
            <div class="layui-input-block">

                <input type="text" style="width:450px" name="partner" class="layui-input" value="<?php echo (isset($pay_info['partner']) && ($pay_info['partner'] !== '')?$pay_info['partner']:''); ?>">

            </div>
        </div>
        <div class="label-tint">
            柚子支付请填 商户ID （点击<a href="http://www.youzipay.com/" target="_blank">柚子支付官网申请</a> ）
            <br /> 支付宝用户请填 合作身份者ID，签约账号，以2088开头（点击<a href="https://b.alipay.com/signing/productSet.htm" target="_blank">支付宝商家中心申请</a>）
        </div>


    </div>

    <div class="layui-form-item">
        <div>
            <label style="width:150px" class="layui-form-label">Key：</label>
            <div class="layui-input-block">

                <input type="text" style="width:350px" name="key" class="layui-input" value="<?php echo (isset($pay_info['key']) && ($pay_info['key'] !== '')?$pay_info['key']:''); ?>">

            </div>
        </div>
        <div class="label-tint">
            由数字和字母组成的32位字符串 </div>

    </div>

    <div class="layui-form-item">
        <div>
            <label style="width:150px" class="layui-form-label">网站名称</label>
            <div class="layui-input-block">

                <input type="text" style="width:350px" name="sitename" class="layui-input" value="<?php echo (isset($pay_info['sitename']) && ($pay_info['sitename'] !== '')?$pay_info['sitename']:''); ?>">
            </div>
        </div>
        <div class="label-tint">
            您在柚子支付平台填写的商户名称（支付宝支付的不必填） </div>
    </div>

    <div class="layui-form-item">
        <div>
            <label style="width:150px" class="layui-form-label">兑换比例：</label>
            <div class="layui-input-block">

                <input type="text" style="width:350px" name="scorenum" class="layui-input" value="<?php echo (isset($pay_info['scorenum']) && ($pay_info['scorenum'] !== '')?$pay_info['scorenum']:'10'); ?>">

            </div>
        </div>
        <div class="label-tint">
            例如填写10表示1元人民币兑换10积分 </div>
    </div>

    <div class="layui-form-item">
        <div>
            <label style="width:150px" class="layui-form-label">最少充值限制：</label>
            <div class="layui-input-block">

                <input type="text" style="width:350px" name="minnum" class="layui-input" value="<?php echo (isset($pay_info['minnum']) && ($pay_info['minnum'] !== '')?$pay_info['minnum']:'1'); ?>">

            </div>
        </div>
        <div class="label-tint">
            例如填写1表示最少充值1元 </div>


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

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/formadd.js"></script>


    <!--页面JS脚本-->
    
</body>

</html>