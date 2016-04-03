<?php
namespace Cms\Controller;
use Think\Controller;
class TeamController extends BasicController {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index($id = "list")
    {
        redirect('/Cms/Team/member/'.$id) ;
    }

    public function member($id = "list")
    {

        if( $id == "list")
        {
            //显示董事长的列表
            $this->show_list = 1 ;
            $members = D('team','Module')->getAllMembers() ;
        }
        else if($id == "add")
        {   
            $this->show_list = 0 ;
            $this->show_title = "添加" ;
            $members[0]['img_url'] = "/public/img/avatar.png" ;
            $this->editInfoLink = "/Cms/Common/add/team_member/1" ;
        }
        else
        {
            $this->show_list = 0 ;
            $this->show_title = "编辑" ;
            $members = D('team','Module')->getOneMember($id) ;
            $this->editInfoLink = "/Cms/Common/update/team_member/".$id ;
        }

        $this->members = $members ;
        
        $this->CURRETN_CONTROLLER= "Team" ;
        $this->CURRETN_MODULE= "member" ;

        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $this->show();
        $this->display('./footer');
    }
}