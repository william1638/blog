<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
        <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">
</head>

<body>
<form action="" method="post" id="blog-form">
    <table class="table table-bordered table-hover" >
        <tr>
            <th>分类名</th>
            <td>
                <input class="form-control modal-sm" type="text" name="cname">
            </td>
        </tr>
        <tr>
            <th>所属栏目</th>
            <td>
                <select class="form-control modal-sm" name="pid">
                    <option value="0">顶级栏目</option>
                    <?php if(is_array($data)): foreach($data as $k=>$v): ?><option value="<?php echo ($v['cid']); ?>" <?php if($cid == $v['cid']): ?>selected="selected"<?php endif; ?> ><?php echo ($v['_name']); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>排序</th>
            <td>
                <input class="form-control modal-sm" type="text" name="sort">
            </td>
        </tr>
        <tr>
            <th>关键词</th>
            <td>
                <input class="form-control modal-sm" type="text" name="keywords">
            </td>
        </tr>
        <tr>
            <th>描述</th>
            <td>
                <textarea class="form-control modal-sm" name="description"></textarea>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="button" value="提交" id="blog-button-submit">
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
<script>
    var SCOPE = {
        save_url : '/Admin/Category/add',
        jump_url : '/Admin/Category/index'
    };

</script>
</body>

</html>