<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>添加文章</title>
        <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">
    <icheckcss/>
</head>

<body>

<form class="form-group" action="" id="blog-form" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <tr>
            <th width="80px">所属分类</th>
            <td>
                <select class="form-control modal-sm" name="cid">
                    <?php if(is_array($allCategory)): foreach($allCategory as $key=>$v): ?><option value="<?php echo ($v['cid']); ?>"><?php echo ($v['_name']); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>标题</th>
            <td>
                <input class="form-control modal-sm" type="text" name="title">
            </td>
        </tr>
        <tr>
            <th>作者</th>
            <td>
                <input class="form-control modal-sm" type="text" name="author" value="<?php echo (C("AUTHOR")); ?>">
            </td>
        </tr>
        <tr>
            <th>标签</th>
            <td>
                <?php if(is_array($allTag)): foreach($allTag as $key=>$v): ?><span class="inputword"><?php echo ($v['tname']); ?></span>
                    <input class="icheck" type="checkbox" name="tids[]" value="<?php echo ($v['tid']); ?>"> &emsp;<?php endforeach; endif; ?>
            </td>
        </tr>
        <tr>
            <th>关键词</th>
            <td>
                <input class="form-control modal-sm" placeholder="多个关键词用顿号分隔" type="text" name="keywords">
            </td>
        </tr>
        <tr>
            <th>描述</th>
            <td>
                <textarea class="form-control modal-sm" name="description" rows="7" placeholder="可以不填，如不填；则截取文章内容前300字为描述"></textarea>
            </td>
        </tr>
        <tr>
            <th>内容</th>
            <td>
                <!-- 加载编辑器的容器 -->
                <script id="container" name="content" type="text/plain">

                </script>
                <!-- 配置文件 -->
                <script type="text/javascript" src="/Public/static/ueditor1_4_3/ueditor.config.js"></script>
                <!-- 编辑器源码文件 -->
                <script type="text/javascript" src="/Public/static/ueditor1_4_3/ueditor.all.js"></script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                </script>
            </td>
        </tr>
        <tr>
            <th>是否原创</th>
            <td> <span class="inputword">是</span>
                <input class="icheck" type="radio" name="is_original" value="1" checked="checked"> &emsp; <span class="inputword">否</span>
                <input class="icheck" type="radio" name="is_original" value="0">
            </td>
        </tr>
        <tr>
            <th>是否置顶</th>
            <td> <span class="inputword">是</span>
                <input class="icheck" type="radio" name="is_top" value="1"> &emsp; <span class="inputword">否</span>
                <input class="icheck" type="radio" name="is_top" value="0" checked="checked">
            </td>
        </tr>
        <tr>
            <th>是否显示</th>
            <td> <span class="inputword">是</span>
                <input class="icheck" type="radio" name="is_show" value="1" checked="checked"> &emsp; <span class="inputword">否</span>
                <input class="icheck" type="radio" name="is_show" value="0">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="button" id="blog-button-submit" value="发表">
            </td>
        </tr>
    </table>
</form>

</body>
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
    var SCOPE={
        'save_url' : '/Admin/Article/add',
        'jump_url' : '/Admin/Article/index',
    }
</script>

</html>