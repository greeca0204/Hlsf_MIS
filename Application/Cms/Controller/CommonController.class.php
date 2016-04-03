<?php
namespace Cms\Controller;
use Think\Controller;

class CommonController extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function error_404()
    {
        $this->display('404');
    }

    //ajax add         增加一条记录
    /*@param $table    数据表的表名
     *@param $order    有没顺序要求，默认是没有顺序要求
    **/
    public function add($table , $order = 0)
    {

        //---------检测用户是否登录，安全性能--------
        if( !isset($_SESSION['uid'])  || !isset($_SESSION['hlsf_login_success']))
        {
            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data);
        }

        //--------------------------------------     
        $res = false ;

        $CommonModule =  D('common','Module');     
        $res = $CommonModule->add($table,$order,$_POST) ;

        //---------------返回数据----------------
        if( $res === false )
        {
            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data) ;
        }
        else
        {
            $data['ErrorCode'] = 1 ; 
            $this->ajaxReturn($data) ; 
        }
    }
   
    //ajax delete    删除一条记录
    /*@param $table  数据表的表名
     *@param $order  有没顺序要求，默认是没有顺序要求
     *@param $id     id
    **/
    public function delete($table , $order = 0, $id )
    {

        //---------检测用户是否登录，安全性能--------
        if( !isset($_SESSION['uid'])  || !isset($_SESSION['hlsf_login_success']))
        {
            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data);
        }

        $CommonModule = D('common','Module');
        $res = $CommonModule->delete($table, $order, $id, $_POST) ;

        if($res)
        {
            $data['ErrorCode'] = 1 ;
            $this->ajaxReturn($data) ; 
        }
        else
        {
            $data['ErrorCode'] = 0   ;
            $this->ajaxReturn($data) ;      
        }
    }

    //ajax update  更改一条记录,不涉及顺序
    /*@param $table 数据表的表名
     *@param $id    数据的id
    **/
    public function update($table,$id)
    {
        //-------检测用户是否登录，安全性能-------
        if(!isset($_SESSION['uid']) || !isset($_SESSION['hlsf_login_success']))
        {
            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data);
        }

        //--------------------------------------
        $res = false ;
        $CommonModule =  D('common','Module');     
        $res = $CommonModule->update($table,$id,$_POST) ;

        //---------------返回数据----------------
        if( $res === false )
        {

            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data) ;
        }
        else
        {
            $data['ErrorCode'] = 1 ; 
            $this->ajaxReturn($data) ; 
        }
    }
    
    //ajax   move        更改一条记录位置
    /*@param $table      数据表的表名
     *@param $direction  上移/下移
     *@param $id         数据的id
    **/
    public function move($table, $direction, $id)
    {
        //-------检测用户是否登录，安全性能-------
        if(!isset($_SESSION['uid']) || !isset($_SESSION['hlsf_login_success']))
        {
            $data['ErrorCode'] = 0 ;
            $this->ajaxReturn($data);
        }

        //--------------------------------------
        $res = false ;
        $CommonModule =  D('common','Module');     
        $res = $CommonModule->move($table, $direction, $id) ; 
        $this->ajaxReturn($res) ; 
        
    }

    //other operate
    
}