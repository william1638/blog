<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>添加标签</title>
        <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">
</head>

<body>
<form action="" method="post" id="blog-form">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <input type="hidden" name="tid" value="<?php echo ($data['tid']); ?>">
        <tr>
            <th>标签名</th>
            <td>
                <input class="form-control modal-sm" type="text" name="tname" value="<?php echo ($data['tname']); ?>">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" id="blog-button-submit" type="button" value="修改">
            </td>
        </tr>
    </table>
</form>
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
        "save_url" :　"/Admin/Tag/edit",
        "jump_url" : "/Admin/Tag/index"
    }

</script>


</html>