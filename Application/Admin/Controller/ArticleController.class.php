<?php
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends Controller{
    private $_db ;

    public function __construct()
    {
        parent::__construct();
        $this->_db=D('Article');
    }

    public function index(){
        $data = $this->_db->getPageData('all','all','all',0,10);
        $this->assign(array(
            'data' => $data['data'],
            'page' => $data['page']
        ));
        $this->display();
    }

    // 添加文章
    public function add(){

        if(IS_POST){

           if($this->_db->addData()) {
               return show(1,'添加成功');
           }else{
               $this->error($this->_db->getError());
           }


        }else{
            $allCategory = D('Category')->getAllData();
            if(empty($allCategory)){
                $this->error("请先添加分类");
            }
            $allTag = D('Tag')->getAllData();
            $this->assign(array(
                'allCategory' => $allCategory,
                'allTag'  => $allTag
            ));
            $this->display();
        }

    }

    public function edit(){
        if(IS_POST){
            if($this->_db->editData()){

                return show(1,'修改成功');
            }else{
                return show(0,'修改失败');
            }
        }else{

            $aid = I('get.aid');

            $data = $this->_db->getDataByAid($aid);
            $allTag = D('Tag')->getAllData();
            $allCategory = D('Category')->getAllData();
            $this->assign(array(
                'allCategory'=>$allCategory,
                'allTag' => $allTag,
                'data' => $data
            ));

            $this->display();
        }

    }


}