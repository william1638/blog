<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>分类列表</title>
        <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">
</head>

<body>
<form action="<?php echo U('Admin/Category/sort');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th width="10%">cid</th>
            <th width="10%">排序</th>
            <th width="15%">分类名</th>
            <th width="25%">关键词</th>
            <th width="25%">描述</th>
            <th width="15%">操作</th>
        </tr>
        </thead>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($v["cid"]); ?></td>

                <td>
                    <input class="form-control" type="text" name="<?php echo ($v['cid']); ?>" value="<?php echo ($v["sort"]); ?>">
                </td>
                <td><?php echo ($v["cname"]); ?></td>
                <td><?php echo ($v["keywords"]); ?></td>
                <td><?php echo ($v["description"]); ?></td>
                <td> <a href="<?php echo U('Admin/Category/add',array('cid'=>$v['cid']));?>">添加子分类</a> | <a href="<?php echo U('Admin/Category/edit',array('cid'=>$v['cid']));?>">修改</a> | <a href="javascript:void(0)"  id="blog-delete" attr-id="<?php echo ($v["cid"]); ?>">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <tr>
            <td></td>
            <td>
                <input class="btn btn-success" id="sortButton" type="button" value="排序">
            </td>
        </tr>
    </table>
</form>

</body>
<script>
    var SCOPE ={
        'delete_url' : "/Admin/Category/delete",
        'sort_url'  : "/Admin/Category/sort",
        'jump_url'  : "/Admin/Category/index"
    }

</script>
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
</html>