<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/Users/zhongwu/Downloads/aichong/application/admin/view/user_index.html";i:1522543022;s:65:"/Users/zhongwu/Downloads/aichong/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        
<div class="admin-main layui-form">
    <div class="layui-field-box">
        <div class="layui-box-searchber">
            <a href="<?php echo url('admin/user/add'); ?>" class="layui-btn layui-btn-sm" id="add" style="float:left">
                <i class="layui-icon">&#xe608;</i> 添加用户
            </a>
            <form class="layui-form layui-form-pane" action="<?php echo url('admin/user/index'); ?>" method="get">
                <div class="layui-inline">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" value="<?php echo session('userkeyword'); ?>" placeholder="请输入关键词" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn  layui-btn-sm">搜索</button>
                </div>
            </form>
        </div>
        <hr>
        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th style="width: 30px;">ID</th>
                    <th>用户名</th>
                    <th>手机</th>
                    <th>状态</th>
                    <th>发文免审</th>
                    <th>创建时间</th>
                    <th>最后登录时间</th>
                    <th>最后登录IP</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($user_list) || $user_list instanceof \think\Collection || $user_list instanceof \think\Paginator): if( count($user_list)==0 ) : echo "" ;else: foreach($user_list as $key=>$vo): ?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['username']; ?></td>
                    <td><?php echo $vo['mobile']; ?></td>
                    <td><?php echo $vo['status']>=1 ? '启用' : '禁用'; ?></td>
                    <td align="center">
                        <input type="checkbox" lay-skin="switch" lay-text="免审|一般" lay-filter="switchdeveloper" value="<?php echo $vo['id']; ?>" <?php echo $vo[ 'developer']==1 ? 'checked' : ''; ?>>


                        </a>
                    </td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['regtime']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['last_login_time']); ?></td>
                    <td><?php echo $vo['last_login_ip']; ?></td>
                    <td>
                        <a href="<?php echo url('admin/user/edit',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
                        <a href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/user/delete',['id'=>$vo['id']]); ?>" data-opt="del" class="elementdel layui-btn layui-btn-danger layui-btn-sm ajax-delete">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <!--分页-->

    </div>
</div>

    </div>

    
<div class="btable-paged">
    <div class="layui-main">
        <?php echo $user_list->render(); ?>
    </div>
</div>


    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>
<script>
    layui.use('form', function() {
        var form = layui.form,
            jq = layui.jquery;
        form.on('switch(switchdeveloper)', function(data) {
            loading = layer.load(2, {
                shade: [0.2, '#000']
            });
            if (data.elem.checked) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo url('admin/user/toggle'); ?>?id=" + data.value + '&status=' + status + '&name=developer';


            jq.get(url, function(data) {

                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        //  location.reload();
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {
                        icon: 2,
                        anim: 6,
                        time: 1000
                    });
                }
            });
            return false;
        });
    });
</script>

    <!--页面JS脚本-->
    
</body>

</html>