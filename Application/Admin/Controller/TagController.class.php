<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Model\TagModel;
class TagController extends Controller{
    private $_db  ;

    public function __construct()
    {
        parent:: __construct();
        $this->_db = D('Tag');
    }

    public function index(){
        $data = $this->_db->getAllData();
        $this->assign(array(
            'data' => $data,
        ));
        $this->display();
    }

    public function add(){
        if(IS_POST){
            if($this->_db->addData()){
                return show(1,"标签添加成功");
            }else{
                return show(0,$this->_db->getError());
            }
        }
        $this->display();
    }

    public function edit(){

        if(IS_POST){

            if($this->_db->editData()){
                return show(1,"修改成功");
            }else{
                return show(0,$this->_db->getError());
            }

        }else{
            $tid = I('get.tid',0);
            $data = $this->_db->getDataByTid($tid);
            $this->assign(array('data' => $data));
            $this->display();
        }

    }

    public function delete(){
        if($this->_db->deleteData()){
            return show(1,"删除成功");
        }else{
            return show(0,$this->_db->getError());
        }

    }



}