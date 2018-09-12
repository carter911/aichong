<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/Users/zhongwu/Downloads/aichong/application/admin/view/usergrade_add.html";i:1515742390;s:65:"/Users/zhongwu/Downloads/aichong/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        

    <!--tab标签-->
    <div class="layui-tab-brief">
    
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" data-url="<?php echo url('admin/usergrade/save'); ?>"  localtion-url="<?php echo url('usergrade/index'); ?>" >
                    <div class="layui-form-item">
                        <label class="layui-form-label">名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name"  required lay-verify="required" placeholder="请输入等级名称" class="layui-input">
                        </div>
                    </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">积分</label>
                        <div class="layui-input-inline">
                            <input type="number" name="score"  required lay-verify="required" placeholder="积分为整数" class="layui-input">
                        </div>
                    </div>

                 
                    <div class="btable-paged" >
				<div class="layui-main">
                    <div class="formbtngroup">
<button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="formadd">添加</button>
<button onclick="history.go(-1);return false;" class="layui-btn layui-btn-primary layui-btn-sm">返回</button>
</div>
</div>
        </div>
                </form>
            </div>
        </div>
    </div>


    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/formadd.js"></script>

    <!--页面JS脚本-->
    
</body>

</html>