<?php
namespace Cms\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function index()
    {
     	$this->show() ;
    }

    //ajax  登录时候验证密码
    public function validate()
    {
        $res = false ;
     	$account = 	$_POST['account'] ;
     	$password = $_POST['pwd'] ;

        $AccountModule =  D('account','Module') ;     
        $res = $AccountModule->validate($account, $password) ;

     	if($res)
     	{
            //设置Session
            session_start();
            $_SESSION['uid']= $account ;
            $_SESSION['hlsf_login_success']= 1 ;

     		$data['errorCode']  = 1  ;
     		$data['url'] = '/Cms/Company/index' ;
     		$this->ajaxReturn($data) ;        
     	}
     	else
     	{
     		$data['errorCode']  = 0 ;
     		$this->ajaxReturn($data);
     	}
    }

    public function myExit()
    {
        session_start();
        $_SESSION = array() ;
    }
    
}