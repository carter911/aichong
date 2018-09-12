<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/Users/zhongwu/Downloads/aichong/application/admin/view/admin_user_index.html";i:1515742390;s:65:"/Users/zhongwu/Downloads/aichong/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<div class="admin-main">

		
				
		
			
				
				<div class="layui-field-box layui-form">
				<a href="<?php echo url('admin/admin_user/add'); ?>" class="layui-btn layui-btn-sm" id="add">
					<i class="layui-icon">&#xe608;</i> 添加管理员
				</a>
			<!-- <a href="#" class="layui-btn layui-btn-sm" id="import" >
					<i class="layui-icon">&#xe608;</i> 导入信息
				</a>
				<a href="#" class="layui-btn layui-btn-sm">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出信息
				</a>
				<a href="#" class="layui-btn layui-btn-sm" id="getSelected">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i> 获取全选信息
				</a>
				<a href="javascript:;" class="layui-btn layui-btn-sm" id="search">
					<i class="layui-icon">&#xe615;</i> 搜索
				</a> -->	
					<table class="layui-table admin-table">
						<thead>
							   <tr>
                        <th style="width: 30px;">ID</th>
                        <th>用户名</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>最后登录时间</th>
                        <th>最后登录IP</th>
                        <th>操作</th>
                    </tr>
						</thead>
						<tbody id="content">
						    <?php if(is_array($admin_user_list) || $admin_user_list instanceof \think\Collection || $admin_user_list instanceof \think\Paginator): $i = 0; $__LIST__ = $admin_user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                 
                    <tr>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['username']; ?></td>
                        <td><?php echo $vo['status']==1 ? '启用' : '禁用'; ?></td>
                        <td><?php echo $vo['create_time']; ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$vo['last_login_time']); ?></td>
                        <td><?php echo $vo['last_login_ip']; ?></td>
                      <td>
				
					<a href="<?php echo url('admin/admin_user/edit',array('id'=>$vo['id'])); ?>" data-name="<?php echo $vo['id']; ?>" data-opt="edit" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
					<a href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/admin_user/delete',array('id'=>$vo['id'])); ?>" data-opt="del"  class="elementdel layui-btn layui-btn-danger layui-btn-sm">删除</a>
				</td>
                    </tr>
                   <?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
		
			
		</div>
 
    </div>

    
<div class="btable-paged" >
<div class="layui-main">
<?php echo $admin_user_list->render(); ?>
</div>
</div>
   

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>
 
    <!--页面JS脚本-->
    
</body>

</html>