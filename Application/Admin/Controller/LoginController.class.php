<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台登陆
 */
class LoginController extends Controller{
    // 登陆页面
    public function login(){

        if(IS_POST){
            $data = I('post.');

            if(check_verify($data['verify'])){
                $password=M('config')->getFieldByName('ADMIN_PASSWORD','value');
                if(md5($data['Admin_PASSWORD'])==$password){
                    session('ADMIN_PASSWORD',null);
                    session("admin",'is_login');
                    return show(1,'登录成功');
                }else{

                    return show(0,'密码错误');
                }
            }else{
                session("ADMIN_PASSWORD",$data['ADMIN_PASSWORD']);

                return show(0,'验证码错误');
            }

        }else{
            $this->display();
        }


    }


    public function showVerify(){
        show_verify();
    }
}