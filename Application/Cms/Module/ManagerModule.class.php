<?php

namespace Cms\Module;
Class ManagerModule
{

   public function getAllManagers()
   {
      $Model = D("managers") ;
      $data =  $Model->order(array('time'=>'desc'))->select() ;
      //把时间戳转换为日期格式
      for($i = 0 ; $i < count($data); $i++)
      {
         $data[$i]['time'] = date("Y-m-d ", $data[$i]['time']);
      }

      return $data  ;
   }

   public function getOneManager($id)
   {
      $Model = D("managers") ;
      $data =  $Model->where(array('id'=>$id))->select() ;
      $data[0]['time'] = date("Y-m-d ", $data[0]['time']);
      return $data  ;
   }
}