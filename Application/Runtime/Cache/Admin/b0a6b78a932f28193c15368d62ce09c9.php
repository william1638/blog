<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>标签列表</title>
        <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">
</head>

<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>tid</th>
        <th>标签名</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['tid']); ?></td>
            <td><?php echo ($v['tname']); ?></td>
            <td> <a href="<?php echo U('Admin/Tag/edit',array('tid'=>$v['tid']));?>">修改</a> | <a href="javascript:void(0)" attr-id=<?php echo ($v["tid"]); ?> id="blog-delete">删除</a></td>
        </tr><?php endforeach; endif; ?>
</table>
<!--<bootstrapjs/>-->
<script src="/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="/index.php/Home/User/logout";
</script>
<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/Public/static/js/html5shiv.min.js"></script>
<script src="/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/Public/static/pace/pace.min.js"></script>
<!--<script src="/Template/default/Home/Public/js/index.js"></script>-->


<!-- 百度页面自动提交开始 -->

<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/admin/login.js"></script>
<script src="/Public/js/admin/common.js"></script>
</body>
<script>
    var SCOPE={
        'delete_url' : '/Admin/Tag/delete',
    }

</script>
</html>