<?php
namespace Cms\Controller;
use Think\Controller;
class AccountController extends BasicController {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->CURRETN_CONTROLLER= "Account" ;
        $this->CURRETN_MODULE= "index" ;

        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show() ;
        $this->display('./footer');
    }

    //ajax  修改密码
    public function update()
    {
         //---------检测用户是否登录，安全性能--------
        if( !isset($_SESSION['uid'])  || !isset($_SESSION['hlsf_login_success']))
        {
            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data);
        }

        $res = false ;
        $AccountModule =  D('account','Module') ;     
        $res = $AccountModule->updatePwd($_SESSION['uid'], $_POST) ;
        
        $this->ajaxReturn($res) ; 
    }
}