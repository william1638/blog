<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>修改文章</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">    <link rel="stylesheet" href="/Public/static/iCheck-1.0.2/skins/all.css"></head><body><form class="form-group" action="<?php echo U('Admin/Article/edit',array('aid'=>$_GET['aid']));?>" method="post"> <input type="hidden" name="aid" value="<?php echo ($data['aid']); ?>"><table class="table table-bordered table-striped table-hover table-condensed"><tr><th width="80px">文章链接</th><td> <a href="<?php echo U('Home/Index/article',array('aid'=>$data['aid']),true,true);?>" target="_blank"><?php echo U('Home/Index/article',array('aid'=>$data['aid']),true,true);?></a></td></tr><tr><th width="80px">所属分类</th><td> <select class="form-control modal-sm" name="cid"><?php if(is_array($allCategory)): foreach($allCategory as $key=>$v): ?><option value="<?php echo ($v['cid']); ?>" <?php if($v['cid'] == $data['cid']): ?>selected='selected'<?php endif; ?> ><?php echo ($v['_name']); ?></option><?php endforeach; endif; ?></select></td></tr><tr><th>标题</th><td> <input class="form-control modal-sm" type="text" name="title" value="<?php echo ($data['title']); ?>"></td></tr><tr><th>作者</th><td> <input class="form-control modal-sm" type="text" name="author" value="<?php echo ($data['author']); ?>"></td></tr><tr><th>标签</th><td><?php if(is_array($allTag)): foreach($allTag as $key=>$v): ?><span><?php echo ($v['tname']); ?></span> <input class="icheck" type="checkbox" name="tids[]" value="<?php echo ($v['tid']); ?>" <?php if(in_array($v['tid'],$data['tids'])): ?>checked='checked'<?php endif; ?> ><?php endforeach; endif; ?></td></tr><tr><th>关键词</th><td> <input class="form-control modal-sm" type="text"placeholder="多个关键词用顿号分隔" type="text" name="keywords" value="<?php echo str_replace(',', '、', $data['keywords']);?>"></td></tr><tr><th>描述</th><td> <textarea class="form-control modal-sm" name="description" rows="7" placeholder="可以不填，如不填；则截取文章内容前300字为描述"><?php echo ($data['description']); ?></textarea></td></tr><tr><th>内容</th><td><script id="container" name="content" type="text/plain"><?php echo ($data['content']); ?></script>
<script src="/Public/static/ueditor1_4_3/ueditor.config.js"></script>
<script src="/Public/static/ueditor1_4_3/ueditor.all.js"></script>
<script>
    var ue = UE.getEditor('container');
</script></td></tr><tr><th>是否原创</th><td> <span class="inputword">是</span> <input class="icheck" type="radio" name="is_original" value="1" <?php if($data['is_original'] == 1): ?>checked="checked"<?php endif; ?> > <span class="inputword">否</span> <input class="icheck" type="radio" name="is_original" value="0" <?php if($data['is_original'] == 0): ?>checked="checked"<?php endif; ?> ></td></tr><tr><th>是否置顶</th><td> <span class="inputword">是</span> <input class="icheck" type="radio" name="is_top" value="1" <?php if($data['is_top'] == 1): ?>checked="checked"<?php endif; ?> > <span class="inputword">否</span> <input class="icheck" type="radio" name="is_top" value="0" <?php if($data['is_top'] == 0): ?>checked="checked"<?php endif; ?> ></td></tr><tr><th>是否显示</th><td> <span class="inputword">是</span> <input class="icheck" type="radio" name="is_show" value="1" <?php if($data['is_show'] == 1): ?>checked="checked"<?php endif; ?> > <span class="inputword">否</span> <input class="icheck" type="radio" name="is_show" value="0" <?php if($data['is_show'] == 0): ?>checked="checked"<?php endif; ?> ></td></tr><tr><th></th><td> <input class="btn btn-success" type="submit" value="修改"></td></tr></table></form><script src="/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/Public/static/js/html5shiv.min.js"></script>
<script src="/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/Public/static/pace/pace.min.js"></script>
<script src="/Template/default/Home/Public/js/index.js"></script>
<!-- 百度页面自动提交开始 -->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<!-- 百度页面自动提交结束 -->

<!-- 百度统计开始 -->

<!-- 百度统计结束 --><icheckjs/></body></html>