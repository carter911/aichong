<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:99:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/articles_edit.html";i:1525080844;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LaySNS后台管理模板</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/main.css" media="all" /> 
<link rel="stylesheet" href="__ADMIN__/plugins/wangEditor/css/wangEditor.min.css">
<style type="text/css">
    .wangEditor-menu-container .menu-item a {
        padding: 12px 0;
    }
    
    .wangEditor-menu-container .menu-item {
        height: 37px;
        width: 37px;
    }
    
    .wangEditor-menu-container .menu-group {
        padding: 0;
    }
    
    .wangEditor-container {
        border: 1px solid #e6e6e6;
    }
</style>


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
            <form class="layui-form form-container" data-url="<?php echo url('admin/articles/update'); ?>" localtion-url="<?php echo url('articles/index'); ?>">
                <div class="layui-row layui-col-space15 layui-form-item">
                    <div class="layui-col-md3">
                        <label class="layui-form-label">所在专栏</label>
                        <div class="layui-input-block">
                            <select lay-verify="required" name="tid" lay-filter="tid"> 
                                    <?php if(is_array($tptcs) || $tptcs instanceof \think\Collection || $tptcs instanceof \think\Paginator): $i = 0; $__LIST__ = $tptcs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option <?php if($tptca['tid'] == $vo['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php if($vo['level'] != '1'): ?>|<?php for($i=1;$i<$vo['level'];$i++){echo ' --';} endif; ?><?php echo $vo['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                 </select>
                        </div>
                    </div>
                    <div class="layui-col-md9">
                        <label for="L_title" class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" id="L_title" name="title" value="<?php echo $tptca['title']; ?>" required="" lay-verify="required" autocomplete="off" class="layui-input" />
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">

                    <label class="layui-form-label">封面</label>


                    <div class="layui-input-inline">
                        <button type="button" class="layui-btn" id="image">
                                            <i class="layui-icon">&#xe67c;</i>上传图片
                                        </button>
                        <input type="text" name="coverpic" value="<?php echo $tptca['coverpic']; ?>" class="layui-input" style="position: absolute;left: 111px;top: 0px;width: 500px;">
                    </div>

                </div>
                <div class="layui-form-item">

                    <label class="layui-form-label"></label>

                    <div class="layui-upload-list">
                        <?php if($tptca['coverpic']): ?>
                        <img class="layui-upload-img" id="picshow" style="max-height: 200px" src="__ROOT__<?php echo $tptca['coverpic']; ?>thumb.png"> <?php endif; ?>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top: 20px;margin-bottom: 10px;">
                    <div class="layui-inline">
                        <label class="layui-form-label">外链地址</label>
                        <div class="layui-inline" style="margin-left:0px;">
                            <input name="outlink" type="text" placeholder="点击标题可直接跳转（需以http或开头）" value="<?php echo $tptca['outlink']; ?>" autocomplete="off" class="layui-input" style="width: 400px;float: left;">
                        </div>
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <textarea id="textarea" name="content" style="height:300px;width: 100%;">
      <?php echo $tptca['content']; ?></textarea>
                    </div>
                </div>
                <?php echo hook('attachlinkadd',array('id'=>$tptca['id'],'type'=>1)); ?>
                <input type="hidden" name="id" value="<?php echo $tptca['id']; ?>">
                <div class="btable-paged">
                    <div class="layui-main">
                        <div class="formbtngroup">
                            <div class="layui-input-inline">
                                <input type="radio" name="open" value="1" title="同意" <?php if($tptca['open'] == '1'): ?>checked<?php endif; ?>>
                                <input type="radio" name="open" value="2" title="不同意" <?php if($tptca['open'] == '2'): ?>checked<?php endif; ?>> <input type="radio" name="open" value="-1" title="关闭" <?php if($tptca['open'] == '-1'): ?>checked<?php endif; ?>>
                            </div>

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
<script type="text/javascript" src="__ADMIN__/plugins/wangEditor/js/wangEditor.min.js"></script>
<script type="text/javascript">
    var editor = new wangEditor('textarea');
    editor.config.uploadImgUrl = '<?php echo url("system/doUploadPic"); ?>';
    editor.config.uploadImgFileName = 'FileName';

    editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
        if (item === 'eraser') {
            return null;
        }
        if (item === 'video') {
            return null;
        }
        if (item === 'location') {
            return null;
        }
        return item;
    });
    editor.config.pasteText = false;
    editor.create();


    layui.use(['form', 'upload'], function() {
        var form = layui.form,
            upload = layui.upload,
            jq = layui.jquery;

        upload.render({
            elem: '#image',
            url: "<?php echo url('upload/upimage'); ?>",
            before: function(obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result) {
                    jq('#picshow').attr('src', result); //图片链接（base64）
                });
            },
            done: function(res) {

                if (res.code == '200') {
                    jq('input[name=coverpic]').val(res.headpath);
                    return layer.msg('上传成功');
                } else {

                    return layer.msg(res.msg);
                }

            }
        });
    });
</script>


    <!--页面JS脚本-->
    
</body>

</html>