<?php
namespace Cms\Controller;
use Think\Controller;
class ProjectsController extends BasicController {
    
    function __construct()
    {
        parent::__construct();
    }

    //默认首页为展示已经上市项目
    public function index($id = "list")
    {
        if($id == "list")
        {   
            $this->show_list = 1 ;
            $projects = D('projects','Module')->getAllProjects("project_ssxm") ;
            $this->projects = $projects ;
        }
        else if($id == "add")
        {   
            $this->show_list = 0 ;
            $this->show_title = "添加" ;
            $project[0]['img_url'] = "/public/img/project.png" ;
            $this->editInfoLink = "/Cms/Common/add/project_ssxm/1" ;
            $this->project = $project ;
        }
        else
        {
            $this->show_list = 0 ;
            $this->show_title = "编辑" ;
            $project = D('projects','Module')->getOneProject( "project_ssxm", $id) ;
            $this->editInfoLink = "/Cms/Common/update/project_ssxm/".$id ;
            $this->project = $project ;
        }

        $this->CURRETN_CONTROLLER= "Projects" ;
        $this->CURRETN_MODULE= "index" ;
        
        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show();
        $this->display('./footer');
    }

    //展示重点投资项目
    public function emphasisProject($id = "list")
    {
        if($id == "list")
        {   
            $this->show_list = 1 ;
            $projects = D('projects','Module')->getAllProjects("project_zdxm") ;
            $this->projects = $projects ;
        }
        else if($id == "add")
        {   
            $this->show_list = 0 ;
            $this->show_title = "添加" ;
            $project[0]['img_url'] = "/public/img/project.png" ;
            $this->editInfoLink = "/Cms/Common/add/project_zdxm/1" ;
            $this->project = $project ;
        }
        else
        {
            $this->show_list = 0 ;
            $this->show_title = "编辑" ;
            $project = D('projects','Module')->getOneProject( "project_zdxm", $id) ;
            $this->editInfoLink = "/Cms/Common/update/project_zdxm/".$id ;
            $this->project = $project ;
        }
        
        $this->CURRETN_CONTROLLER= "Projects" ;
        $this->CURRETN_MODULE= "emphasisProject" ;
        
        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show();
        $this->display('./footer');
    }
}