<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:99:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/message_index.html";i:1515742390;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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
				<a href="<?php echo url('admin/message/add'); ?>" class="layui-btn layui-btn-sm" id="add">
					<i class="layui-icon">&#xe608;</i> 添加系统消息
				</a>
				<table class="layui-table admin-table">
				<thead>
                    <tr>
                        <th style="width: 30px;">ID</th>
                        <th>时间</th>
                        <th>发送者</th>
                         <th>发送对象</th>
                        <th>类型</th>
                        <th>内容</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($slide_category_list) || $slide_category_list instanceof \think\Collection || $slide_category_list instanceof \think\Paginator): if( count($slide_category_list)==0 ) : echo "" ;else: foreach($slide_category_list as $key=>$vo): ?>
                    <tr>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo friendlyDate($vo['time']); ?></td>
                        <td><?php echo getusernamebyid($vo['uid']); ?></td>
                         <td><?php echo getusernamebyid($vo['touid']); ?></td>
                          <td><?php echo $vo['type']==1 ? '系统消息' : '帖子动态'; ?></td>
                          <td><?php echo $vo['content']; ?></td>
                        <td>
                          
                            <a href="<?php echo url('admin/message/edit',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
                            <a href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/message/delete',array('id'=>$vo['id'])); ?>" data-opt="del"  class="elementdel layui-btn layui-btn-danger layui-btn-sm ajax-delete">删除</a>
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
	<?php echo $slide_category_list->render(); ?>
</div>
</div>
 

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>
 
    <!--页面JS脚本-->
    
</body>

</html>