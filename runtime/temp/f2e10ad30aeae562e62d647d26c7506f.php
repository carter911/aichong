<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/Users/zhongwu/Downloads/aichong/application/admin/view/admin_user_edit.html";i:1519787738;s:65:"/Users/zhongwu/Downloads/aichong/application/admin/view/base.html";i:1517932328;}*/ ?>
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
            <form class="layui-form form-container" data-url="<?php echo url('admin/admin_user/update'); ?>" localtion-url="<?php echo url('admin/admin_user/index'); ?>">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" value="<?php echo $admin_user['username']; ?>" required lay-verify="required" placeholder="请输入用户名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">重复密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="confirm_password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-inline">
                        <input type="radio" name="status" value="1" title="启用" <?php if($admin_user['status']==1): ?> checked="checked" <?php endif; ?>>
                        <input type="radio" name="status" value="0" title="禁用" <?php if($admin_user['status']==0): ?> checked="checked" <?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属权限组</label>
                    <div class="layui-input-inline">
                        <select name="group_id" lay-verify="required">
                                <?php if(is_array($auth_group_list) || $auth_group_list instanceof \think\Collection || $auth_group_list instanceof \think\Paginator): if( count($auth_group_list)==0 ) : echo "" ;else: foreach($auth_group_list as $key=>$vo): ?>
                                <option value="<?php echo $vo['id']; ?>" <?php if($admin_user['group_id']==$vo['id']): ?> selected="selected"<?php endif; ?>><?php echo $vo['title']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $admin_user['id']; ?>">
                <div class="btable-paged">
                    <div class="layui-main">
                        <div class="formbtngroup">
                            <button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="formadd">更新</button>
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