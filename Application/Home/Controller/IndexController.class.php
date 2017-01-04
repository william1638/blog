<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
* 网站首页
*/
class IndexController extends HomeBaseController
{
    // 首页
    public function index(){
        $articles=D('Article')->getPageData();
        $assign=array(
            'articles'=>$articles['data'],
            'page'=>$articles['page'],
            'cid'=>'index'
        );
        $this->assign($assign);
        $this->display();
    }

    public function category(){
        $cid = I('get.cid');
        if(!$cid){
            echo "bucunzai";
        }
        $articles = D('Article')->getPageData($cid);

        $this->assign(array(
            'articles' => $articles['data'],
            'page'  => $articles['page'],
        ));

        $this->display();
    }
// 文章内容
    public function article(){
        $aid=I('get.aid',0,'intval');
        $cid=intval(cookie('cid'));
        $tid=intval(cookie('tid'));
        $search_word=cookie('search_word');
        $search_word=empty($search_word) ? 0 : $search_word;
        $read=cookie('read');
        // 判断是否已经记录过aid
        if (array_key_exists($aid, $read)) {
            // 判断点击本篇文章的时间是否已经超过一天
            if ($read[$aid]-time()>=86400) {
                $read[$aid]=time();
                // 文章点击量+1
                M('Article')->where(array('aid'=>$aid))->setInc('click',1);
            }
        }else{
            $read[$aid]=time();
            // 文章点击量+1
            M('Article')->where(array('aid'=>$aid))->setInc('click',1);
        }
        cookie('read',$read,864000);
        switch(true){
            case $cid==0 && $tid==0 && $search_word==(string)0:
                $map=array();
                break;
            case $cid!=0:
                $map=array('cid'=>$cid);
                break;
            case $tid!=0:
                $map=array('tid'=>$tid);
                break;
            case $search_word!==0:
                $map=array('title'=>$search_word);
                break;
        }

        // 获取文章数据
        $article=D('Article')->getDataByAid($aid,$map);
        // 如果文章不存在；则返回404页面
        if (empty($article['current']['aid'])) {
            header("HTTP/1.0  404  Not Found");
            $this->display('./Template/default/Home/Public/404.html');
            exit(0);
        }

        $assign=array(
            'article'=>$article,

            'cid'=>$article['current']['cid']
        );

        $this->assign($assign);
        $this->display();
    }


}