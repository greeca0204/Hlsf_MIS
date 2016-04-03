<?php
namespace Cms\Controller;
use Think\Controller;
class CompanyController extends BasicController {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
          
        $company = D('company','Module')->getCompanyInfo() ;
        $this->company = $company ;
        //加载页面,基本设置
        $this->CURRETN_CONTROLLER= "Company" ;
        $this->CURRETN_MODULE= "index" ;

        $this->display('./header');       
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show() ;
        $this->display('./footer');
    }

    public function pic()
    {

        $company = D('company','Module')->getCompanyInfo() ;
        $this->company = $company ;
        //加载页面,图片设置
        $this->CURRETN_CONTROLLER= "Company" ;
        $this->CURRETN_MODULE= "pic" ;

        $this->display('./header');      
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show() ;
        $this->display('./footer');

    }

    public function chairman( $id = "list" )
    {
        if( $id == "list")
        {
            //显示董事长的列表
            $this->show_list = 1 ;
            $managers = D('manager','Module')->getAllManagers() ;            
        }
        else if($id == "add")
        {   

            $this->JS_PRELOAD = array('/Public/3rd/bootstrap-datepicker/js/bootstrap-datepicker.min.js' , '/Public/3rd/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js');
            $this->show_list = 0 ;
            $this->show_title = "添加" ;
            $managers[0]['img_url'] = "/public/img/avatar.png" ;
            $this->editInfoLink = "/Cms/Common/add/managers/0" ;
        }
        else
        {
            $this->JS_PRELOAD = array('/Public/3rd/bootstrap-datepicker/js/bootstrap-datepicker.min.js' , '/Public/3rd/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js');
            $this->show_list = 0 ;
            $this->show_title = "编辑" ;
            $managers = D('manager','Module')->getOneManager($id) ;
            $this->editInfoLink = "/Cms/Common/update/managers/".$id ;
        }

        $this->managers = $managers ;

        //加载页面,董事长专栏
        $this->CURRETN_CONTROLLER= "Company" ;
        $this->CURRETN_MODULE= "chairman" ;

        $this->display('./header');      
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show() ;
        $this->display('./footer');

    }

    // //上传图片，包括董事长头像，公司LOGO等等...
    // public function upload( $type = "000") 
    // {
    //     //---------检测用户是否登录，安全性能--------
    //     if( !isset($_SESSION['uid']))
    //     {
    //         $data['ErrorCode'] = 0 ;
    //         $data['ErrorMessage'] = "异常错误:000" ;
    //         $this->ajaxReturn($data);
    //     }

    //     if( $type == "000" )
    //     {
    //         $data['ErrorCode'] = 0 ;
    //         $data['ErrorMessage'] = "异常错误:001" ;
    //         $this->ajaxReturn($data);
    //     }

    //     $arrType=array('image/jpg','image/png','image/gif','image/png','image/bmp','image/pjpeg','image/jpeg');  
    //     $max_size='204800';                      // 最大文件限制（单位：byte）  
    //     $upfile='./Public/upload/img/'.$type ;   //图片目录路径 
    //     $file=$_FILES['one_img']; 

    //     if($_SERVER['REQUEST_METHOD']=='POST')
    //     { 
    //         //判断提交方式是否为POST 
    //         if(!is_uploaded_file($file['tmp_name']))
    //         { 
    //             //判断上传文件是否存在  
    //             $data['ErrorCode'] = 0   ;
    //             $data['ErrorMessage'] = "文件不存在！" ;
    //             $this->ajaxReturn($data) ;  
    //         }

    //         if($file['size']>$max_size)
    //         {  //判断文件大小是否大于500000字节  
    //             $data['ErrorCode'] = 0   ;
    //             $data['ErrorMessage'] = "上传文件不得超过200k" ;
    //             $this->ajaxReturn($data) ; 
    //         }   

    //         if(!in_array($file['type'],$arrType))
    //         {  //判断图片文件的格式  
    //             $data['ErrorCode'] = 0   ;
    //             $data['ErrorMessage'] = "上传文件格式不对！" ;
    //             $this->ajaxReturn($data) ;  
    //         }  

    //         if(!file_exists($upfile))
    //         {  // 判断存放文件目录是否存在，不存在则创建路径 
    //             mkdir($upfile,0777,true);  
    //         }  

    //         //给图片命名
    //         //avatar_时间戳_原始名字
    //         $fname=$file['name'];
    //         //获取文件的后缀
    //         $suffix = explode(".",$fname)[1] ;
    //         $imgName = $type."_".time()."_ly.".$suffix ;
    //         $picName=$upfile."/".$imgName ;

    //         if(file_exists($picName))
    //         {  
    //             $data['ErrorCode'] = 0   ;
    //             $data['ErrorMessage'] = "同文件名存在，请稍后重试！" ;
    //             $this->ajaxReturn($data) ;  
    //         } 

    //         if(!move_uploaded_file($file['tmp_name'],$picName))
    //         {    
    //             $data['ErrorCode'] = 0   ;
    //             $data['ErrorMessage'] = "移动文件出错！" ;
    //             $this->ajaxReturn($data) ; 
    //         }
    //         else
    //         {
    //             $data['ErrorCode'] = 1   ;
    //             $data['ErrorMessage'] = "文件上传成功！" ;
    //             $data['imgurl'] = "/Public/upload/img/".$type."/".$imgName ;
    //             $this->ajaxReturn($data) ;            
    //         }    
    //     }  
    // }
}