<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:99:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/addons_online.html";i:1525095462;s:90:"/Users/zhongwu/Downloads/fbe93bd98272f0a131acd068580eb5b9/application/admin/view/base.html";i:1517932328;}*/ ?>
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

        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li><a href="<?php echo url('addons/index'); ?>">本地插件</a></li>
                <li class="layui-this">在线插件</li>
            </ul>
        </div>
        <?php if(is_array($info)): ?>
        <table class="layui-table admin-table">
            <thead>
                <tr>
                    <th width="150">名称</th>
                    <th width="100">标识</th>
                    <th>描述</th>
                    <th width="60">价格</th>
                    <th width="80">作者</th>
                    <th width="50">版本</th>
                    <th width="120">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['title']; ?></td>
                    <td><?php echo $vo['addonname']; ?></td>
                    <td><?php echo $vo['description']; ?></td>
                    <td align="center"><?php if($vo['score'] > 0): ?>¥<?php echo $vo['price']; else: ?>免费<?php endif; ?></td>
                    <td><a target="_blank" href="<?php echo (isset($vo['url']) && ($vo['url'] !== '')?$vo['url']:'http://www.laysns.com'); ?>"><?php echo $vo['username']; ?></a></td>
                    <td><?php echo $vo['version']; ?></td>
                    <td>
                        <a class="layui-btn layui-btn-normal layui-btn-sm" target="_blank" href="http://www.laysns.com/plinfo/<?php echo $vo['pid']; ?>.html">详情</a> <?php if($vo['is_down'] == 1): ?><a class="layui-btn layui-btn-disabled layui-btn-sm">已下载</a> <?php elseif($vo['is_down']
                        == 2): ?>
                        <a data-title="<?php echo $vo['title']; ?>" data-fufei="<?php echo $vo['fufei']; ?>" class="layui-btn layui-btn-warm layui-btn-sm  downaddon" href="javascript:;" data-url="<?php echo url('index/handle',array('type'=>'downaddon','verid'=>$vo['id'])); ?>">
                            <span class="button-content">升级</span></a><?php else: ?>
                        <a data-price="<?php echo $vo['price']; ?>" data-score="<?php echo $vo['score']; ?>" data-fufei="<?php echo $vo['fufei']; ?>" data-zhekou="<?php echo $vo['zhekou']; ?>" data-id="<?php echo $vo['id']; ?>" data-title="<?php echo $vo['title']; ?>" class="layui-btn layui-btn-sm  downaddon" href="javascript:;" data-url="<?php echo url('index/handle',array('type'=>'downaddon','verid'=>$vo['id'])); ?>">
                            <span class="button-content"><?php if($vo['fufei']): ?>购买<?php else: ?>下载<?php endif; ?></span></a>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <?php else: ?> <?php echo $info; endif; ?>
    </div>


</div>

    </div>

    

    <script>
        var token = '<?php echo $token; ?>';
    </script> 
    <!--页面JS脚本-->
    
<script>
    layui.use(['layer', 'jquery', 'form'], function() {
        var layer = layui.layer,
            form = layui.form,
            jq = layui.jquery;
        var device = layui.device();
        jq('.downaddon').click(function() {
            var verid = jq(this).data('id');
            var url = jq(this).data('url');
            var isfufei = jq(this).data('fufei');
            var zhekou = jq(this).data('zhekou');
            var price = jq(this).data('price');
            var score = jq(this).data('score');
            var titles = jq(this).data('title');
            var text = jq(this).text();
            if (isfufei == 1) {
                layer.open({
                    type: 1,
                    id: 'LAY_pushcase',
                    title: '下载【' + titles + '】',
                    shadeClose: true,
                    area: (device.ios || device.android) ? ($(window).width() + 'px') : '400px',
                    content: '<div style="margin:10px;text-align:center"><p style="line-height:30px">该插件售价<span style="color:red;font-size:25px"> ¥' + price + ' </span>元</p><button type="button" lay-submit lay-filter="buy" class="layui-btn layui-btn-danger">购买(¥' + price * zhekou + ')</button><button type="button" lay-submit lay-filter="duihuan" class="layui-btn">兑换(' + score * zhekou + '金币)</button></div>',
                    success: function(layero, index) {

                        form.render('radio').on('submit(buy)', function(data) {
                            var a = $("<a href='http://www.laysns.com/api/order/buyplugin.html?upkey=<?php echo $keyvalue; ?>&verid=" + verid + "' target='_blank'>Apple</a>").get(0);
                            var e = document.createEvent('MouseEvents');
                            e.initEvent('click', true, true);
                            a.dispatchEvent(e);
                            layer.close(index);
                            layer.msg('', {
                                time: false,
                                btn: ['已完成支付', '支付遇到问题']
                            }, function() {
                                location.reload();
                            });
                        });
                        form.render('radio').on('submit(duihuan)', function(data) {
                            var loading = layer.load(2, {
                                shade: [0.2, '#000']
                            });
                            jq.getJSON(url, function(data) {
                                layer.close(loading);
                                if (data.code == 200) {
                                    layer.msg('兑换下载成功', {
                                        icon: 1,
                                        time: 1000
                                    }, function() {
                                        location.reload();
                                    });
                                } else {
                                    layer.msg(data.msg, {
                                        icon: 2,
                                        anim: 6,
                                        time: 1000
                                    });
                                    layer.close(index);
                                }
                            });
                        });
                    }
                });
            } else {
                layer.confirm('您可以免费下载：' + titles, {
                    title: '下载提示',
                    btn: ['确定', '取消'] //按钮
                }, function(index) {
                    var loading = layer.load(2, {
                        shade: [0.2, '#000']
                    });
                    jq.getJSON(url, function(data) {
                        layer.close(loading);
                        if (data.code == 200) {
                            layer.msg(text + '成功', {
                                icon: 1,
                                time: 1000
                            }, function() {
                                location.reload();
                            });
                        } else {
                            layer.msg(data.msg, {
                                icon: 2,
                                anim: 6,
                                time: 1000
                            });
                        }
                    });
                });
            }
        });

    });
</script>

</body>

</html>