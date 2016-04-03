<?php
namespace Cms\Controller;
use Think\Controller;

class BasicController extends Controller 
{
    function __construct()
    {
        parent::__construct();
        /**
         * 页面加载前置操作
         * 1.检查用户是否登录
         */
        date_default_timezone_set('PRC') ;
        
        session_start() ;
        if( !isset($_SESSION['uid']) )
        {
            redirect('/Cms/Login/index') ;
        }
        
    }

    protected function show_404()
    {
        echo 1;
        redirect('/Cms/Common/error_404');
    }

}