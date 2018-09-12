<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:93:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/nav_add.html";i:1515742390;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        

    <div class="layui-tab-brief">

        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" data-url="<?php echo url('admin/nav/save'); ?>"  localtion-url="<?php echo url('nav/index'); ?>">
                    
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">导航名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" value="" required  lay-verify="required" placeholder="请输入导航名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">别名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="alias" value="" placeholder="（选填）请输入导航别名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                       
                       <div> <div class="layui-input-inline">
                            <input type="text" name="link" value="" placeholder="" class="layui-input"></div>  </div>
                           <div class="label-tint">带参数的本地连接用半角逗号隔开,如版块id为1，则访问版块输入index/view,id,1</div> 
                      
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">链接属性</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="sid" value="1" title="内部" checked="checked">
                            <input type="radio" name="sid" value="0" title="外部">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图标</label>
                        <div class="layui-input-inline">
                            <input type="text" name="icon" value="" placeholder="（选填）如：fa fa-home" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">导航位置</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="pid" value="1" title="顶部" checked="checked">
                            <input type="radio" name="pid" value="0" title="底部">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="status" value="1" title="显示" checked="checked">
                            <input type="radio" name="status" value="0" title="隐藏">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">打开方式</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="target" value="_self" title="默认" checked="checked">
                            <input type="radio" name="target" value="_blank" title="新窗口">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="sort" value="0" required  lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="btable-paged" >
				<div class="layui-main">
                    <div class="formbtngroup">
<button  class="layui-btn layui-btn-sm" lay-submit="" lay-filter="formadd">添加</button>
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