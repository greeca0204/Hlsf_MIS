<?php

namespace Cms\Module;
Class ProjectsModule
{

   public function getAllProjects($project)
   {
      //$project代表的是数据表名
      $Model = D($project) ;
      $data =  $Model->order(array('order'=>'asc'))->select() ;
      return $data  ;
   }

   public function getOneProject($project,$id)
   {
      //$project代表的是数据表名
      $Model = D($project) ;
      $data =  $Model->where(array('id'=>$id))->select() ;
      return $data  ;
   }
}