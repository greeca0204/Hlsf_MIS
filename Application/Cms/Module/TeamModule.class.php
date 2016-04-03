<?php

namespace Cms\Module;
Class TeamModule
{

   public function getAllMembers()
   {
      $Model = D("team_member") ;
      $data =  $Model->order(array('order'=>'asc'))->select() ;
      return $data  ;
   }

   public function getOneMember($id)
   {
      $Model = D("team_member") ;
      $data =  $Model->where(array('id'=>$id))->select() ;
      return $data  ;
   }
}