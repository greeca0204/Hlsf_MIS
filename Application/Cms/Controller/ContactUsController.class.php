<?php
namespace Cms\Controller;
use Think\Controller;
class ContactUsController extends BasicController {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $company = D('contact','Module')->getCompanyInfo() ;
        $this->company = $company ;

        $this->CURRETN_CONTROLLER= "ContactUs" ;
        $this->CURRETN_MODULE= "index" ;
        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show() ;
        $this->display('./footer');
    }

    public function jobs($id = "list")
    {

        if( $id == "list")
        {
            //显示所有工作
            $this->show_list = 1 ;
            $jobs = D('contact','Module')->getAllJobs() ;            
        }
        else if($id == "add")
        {   

            //$this->JS_PRELOAD = array('/Public/3rd/bootstrap-datepicker/js/bootstrap-datepicker.min.js' , '/Public/3rd/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js');
            $this->show_list = 0 ;
            $this->show_title = "添加" ;
            //$managers[0]['img_url'] = "/public/img/avatar.png" ;
            $this->editInfoLink = "/Cms/Common/add/contact_us_jobs/1" ;
        }
        else
        {
            //$this->JS_PRELOAD = array('/Public/3rd/bootstrap-datepicker/js/bootstrap-datepicker.min.js' , '/Public/3rd/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js');
            $this->show_list = 0 ;
            $this->show_title = "编辑" ;
            $jobs = D('contact','Module')->getOneJob($id) ;
            $this->editInfoLink = "/Cms/Common/update/contact_us_jobs/".$id ;
        }

        $this->jobs = $jobs ;

        $this->CURRETN_CONTROLLER= "ContactUs" ;
        $this->CURRETN_MODULE= "jobs" ;
        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show() ;
        $this->display('./footer');       
    }
}