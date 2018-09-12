<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/nav_index.html";i:1515742390;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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
    <!--tab标签-->
    <div class="layui-field-box layui-form">
    <a href="<?php echo url('admin/nav/add'); ?>" class="layui-btn layui-btn-sm" id="add">
					<i class="layui-icon">&#xe608;</i> 添加导航
				</a>
    <table class="layui-table admin-table">
                    <thead>
                    <tr>
                        <th style="width: 30px;">ID</th>
                        <th style="width: 30px;">排序</th>
                        <th>导航名称</th>
                        <th>链接</th>
                         <th>位置</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): if( count($nav_list)==0 ) : echo "" ;else: foreach($nav_list as $key=>$vo): ?>
                    <tr>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['sort']; ?></td>
                        <td><?php echo $vo['name']; ?></td>
                        <td><?php echo getnavlink($vo['link'],$vo['sid']); ?></td>
                        <td><?php echo $vo['pid']==1 ? '顶部' : '底部'; ?></td>
                        <td><input type="checkbox" name="status" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchTest"  value="<?php echo $vo['id']; ?>" <?php echo $vo['status']==1 ? 'checked' : ''; ?>></td>
                        <td>
                            
                            <a href="<?php echo url('admin/nav/edit',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
                            <a  href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/nav/delete',array('id'=>$vo['id'])); ?>" data-opt="del"  class="elementdel layui-btn layui-btn-danger layui-btn-sm ajax-delete">删除</a>
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
	<?php echo $nav_list->render(); ?>
</div>
</div>
 

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>
 
    <!--页面JS脚本-->
    
    <script>
layui.use(['form'],function(){
  var form = layui.form
  ,jq = layui.jquery;


 //jq('.btable-paged').eq(1).hide();
 var status=0;
 form.on('switch(switchTest)', function(data){
	  loading = layer.load(2, {
	      shade: [0.2,'#000']
	    });
	    if(data.elem.checked){
	    	status=1;
	    }else{
	    	status=0;
	    }
	    var url="<?php echo url('admin/nav/updatestatus'); ?>?id="+data.value+'&status='+status ;
	   
	    
	    jq.get(url,function(data){
	    	
	      if(data.code == 200){
	        layer.close(loading);
	        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
	        //  location.reload();
	        });
	      }else{
	        layer.close(loading);
	        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
	      }
	    });
	    return false;
	  });

})
</script>
 
</body>

</html>