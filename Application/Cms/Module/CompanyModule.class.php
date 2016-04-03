<?php

namespace Cms\Module;
Class CompanyModule
{

   public function getCompanyInfo()
   {
      $Model = D("company") ;
      $data =  $Model
               ->where("id = 1")
               ->select() ;
      return $data  ;
   }

}