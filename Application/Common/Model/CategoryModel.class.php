<?php
namespace Common\Model;
use Think\Model;
class CategoryModel extends Model{
    protected $_validate = array(
        array('cname','required','分类名不能为空'),
        array('sort','number','排序必须为数字')

    );

    //添加分类数据
    public function addData($data){
        return $this->add($data);

    }

    public function getDataByCid($cid,$field='all'){
        if($field=='all'){
            return $this->where(array('cid'=>$cid))->find();
        }else{
            return $this->where(array('cid'=>$cid))->getField($field);
        }
    }

    //传递数据库字段名 获取对应的数据
    //不传递获取全部数据
    public function getAllData($field='all',$tree=true){
        if($field=='all'){
            $data=$this->order('sort desc')->select();
            if($tree){
                return \Org\Yzw\Data::tree($data,'cname');
            }else{
                return $data;
            }

        }else{
            return $this->getField("cid,$field");
        }
    }

    //传递cid和field获取对应的数据
    public function getDataById($cid){
        return $this->find($cid);
    }

    //修改数据
    public function editData(){
        $data = I('post.');
        return $this->where(array('cid'=>$data['cid']))->save($data);
    }

    // 传递cid获得所有子栏目
    public function getChildData($cid){
        $data = $this->getAllData('all',false);
        $child = \Org\Yzw\Data::channelList($data,$cid);
        foreach($child as $k=>$v){
            $childs[] = $v['cid'];
        }
        return $childs;
    }

    //删除数据
    public function deleteData(){
        $cid = I('get.id');
        $childs = $this->getChildData($cid);
        if(!empty($childs)){
            $this->errors = "先删除子分类";
            return false;
        }
        if($this->where(array('cid'=>array('eq',$cid)))->delete()){
            return ture;
        }else{
            $this->error = "删除失败";
            return false;
        }
    }
}