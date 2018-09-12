<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:99:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/comment_index.html";i:1518075508;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LaySNS后台管理模板</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/main.css" media="all" /> 
<link rel="stylesheet" href="__ADMIN__/css/form.css"> 

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
            <button class="layui-btn layui-btn-sm" data-url="<?php echo url('admin/comment/alldelete'); ?>" lay-submit lay-filter="alldelete">删除选中</button>
        </div>
        <hr>
        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th width="5%" align="center"><input type="checkbox" name="checkAll" lay-filter="checkAll"></th>
                    <th width="5%" align="center">ID</th>
                    <th width="30%" align="center">评论内容</th>
                    <th width="30%" align="center">所属帖子</th>
                    <th width="10%" align="center">所属会员</th>
                    <th width="10%" align="center">评论时间</th>
                    <th width="10%" align="center">基本操作</th>
                </tr>
            </thead>
            <tbody id="content">
                <?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td align="center"><input type="checkbox" name="ids[<?php echo $vo['id']; ?>]" lay-filter="checkOne" value="<?php echo $vo['id']; ?>"></td>
                    <td align="center"><?php echo $vo['id']; ?></td>
                    <td style="padding-left: 20px;">
                        <a target="_blank" href="<?php echo url('bbs/index/thread',array('id'=>$vo['fid'])); ?>">
                            <?php echo mb_substr(strip_tags($vo['content']), 0, 35, 'utf-8');?>...</a>
                    </td>
                    <td style="padding-left: 20px;"><a target="_blank" href="<?php echo url('bbs/index/thread',array('id'=>$vo['fid'])); ?>"><?php echo $vo['title']; ?></a></td>
                    <td align="center"><a target="_blank" href="<?php echo url('bbs/user/home',array('id'=>$vo['uid'])); ?>"><?php echo $vo['username']; ?></a></td>
                    <td align="center"><?php echo friendlyDate($vo['time']); ?></td>
                    <td align="center">
                        <a class="elementdel layui-btn layui-btn-danger layui-btn-sm" href="javascript:;" data-id="<?php echo $vo['id']; ?>" data-url="<?php echo url('admin/comment/delete',array('id'=>$vo['id'])); ?>" title="删除">删除</a>

                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>


</div>

    </div>

    
<div class="btable-paged">
    <div class="layui-main">
        <?php echo $tptc->render(); ?>
    </div>
</div>


    <script>
        var token = '<?php echo $token; ?>';
    </script> 
<script type="text/javascript" src="__ADMIN__/js/delelement.js"></script>

    <!--页面JS脚本-->
    
</body>

</html>