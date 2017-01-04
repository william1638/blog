<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Model\CategoryMoel;
class CategoryController extends Controller{
    private $_db ;
    private $categoryData ;
    public function __construct(){
        parent::__construct();
        $this->_db = D("Category");
        $this->categoryData = $this->_db->getAllData();
    }
    public function index(){
        $this->assign(array(
            'data' => $this->categoryData,

        ));
        $this->display();
    }


    public function add()
    {
        if (IS_POST) {
            $data = I('post.');
            //验证数据
            if (isset($data['cname']) && !$data['cname']) {
                return show(0, "分类名称不能为空");
            }
            if (!is_numeric($data['sort'])) {
                return show(0, "排序必须为数字");
            }
            $res = $this->_db->addData($data);
            if ($res) {
                return show(1, "添加成功");
            } else {
                return show(0, "添加失败");
            }
        } else {
            if ($cid = I('get.cid')) {
                $this->assign("cid", $cid);
            }
            $this->assign(array(
                'data' => $this->categoryData
            ));
            $this->display();
        }


    }

    public function edit(){
        if(IS_POST){
            $data = I('post.');
            if (isset($data['cname']) && !$data['cname']) {
                return show(0, "分类名称不能为空");
            }
            if (!is_numeric($data['sort'])) {
                return show(0, "排序必须为数字");
            }
            if($this->_db->editData()){
                return show(1,"修改成功");
            }else{
                return show(0,"修改失败");
            }


        }else{
            $cid = I('get.cid',0);
            $oneData = $this->_db->getDataById($cid);
            $this->assign(array(
                'data' => $this->categoryData,
                'oneData' => $oneData

            ));
            $this->display();
        }

    }
    //删除分类
    public function delete(){

        if( $this->_db->deleteData()){
            return show(1,"删除成功");
        }else{
            return show(0,$this->_db->getError());
        }


    }
    //排序
    public function sort(){
        $data = I('post.');
        if(!empty($data)){
            foreach($data as $k=>$v){
                $this->_db->where(array("cid"=>$k))->save(array("sort"=>$v));
            }
        }
        return show(1,"排序成功");

    }

}