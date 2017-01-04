<?php
namespace Common\Model;
use Think\Model;
class TagModel extends Model{

    public function addData(){
        $data = I('post.tnames');
        if(!empty($data)){
            $arr = explode(',',$data);
            foreach($arr as $k => $v){
                $v = trim($v);
                if(!empty($v)){
                    $this->add(array('tname'=>$v));
                }
            }
            return true;
        }else{
            $this->error = "标签名不能为空";
            return false;
        }
    }

    public function getAllData(){
        return $this->select();
    }

    public function getDataByTid($tid){
        return $this->where(array('tid'=>$tid))->find();
    }

    public function editData(){
        $data = I('post.');

        if(empty($data['tname'])){
            $this->error = "标签名不能为空";
        }else{
            $this->where(array('tid'=>$data['tid']))->save($data);
            return true;

        }
    }

    public function deleteData(){
        $tid = I('get.id',0);
        if($this->where(array('tid'=>$tid))->delete()){
            return true;
        }else{
            $this->error = "删除失败";
            return false;
        }


    }


}