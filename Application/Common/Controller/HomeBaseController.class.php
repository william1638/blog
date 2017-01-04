<?php
namespace Common\Controller;
use Think\Controller;
/**
 * 前台基类Controller
 */
class HomeBaseController extends Controller
{
    public function _initialize(){

        $this->assign(array(
            'categorys' => D('Category')->getAllData(),
        ));
    }
}
