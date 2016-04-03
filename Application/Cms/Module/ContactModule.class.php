<?php
namespace Cms\Module;

Class ContactModule
{

   public function getCompanyInfo()
   {
      $Model = D("contact_us") ;
      $data =  $Model
               ->where("id = 1")
               ->select() ;
      return $data  ;
   }

   public function getAllJobs()
   {
      $Model = D("contact_us_jobs") ;
      $data =  $Model->order(array('order'=>'asc'))->select() ;
      return $data  ;
   }

   public function getOneJob($id)
   {
      $Model = D("contact_us_jobs") ;
      $data =  $Model->where(array('id'=>$id))->select() ;
      return $data  ;
   }
}