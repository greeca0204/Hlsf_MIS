<?php

namespace Cms\Module;
Class AccountModule
{    
   //修改密码
   public function updatePwd( $id, $pwd )
   {
      $res = false ;

      $Model = D('user') ;
      $data =  $Model->where(array('id'=>$id))->select() ; 
      
      //数据是否存在，不存在直接返回false
      if( count($data) == 0)
      {
         return $res ;
      }

      if( $data[0]['password'] != $pwd['p_pwd'] )
      {
         $res['ErrorCode'] =  0 ;
         $res['ErrorMessage'] = "原始密码输入错误！" ;
         return $res ;
      }

      $condition['password'] = $pwd['n_pwd'] ;
      $Model->where(array('id'=>$id))->save($condition) ;
      
      $res['ErrorCode'] = 1 ;
      $res['ErrorMessage'] = "操作成功，请重新登录！" ;
      return $res ;
   }

   //验证账号、密码
   public function validate( $id, $pwd )
   {

      $Model = D('user') ;
      $data =  $Model->where(array('id'=>$id))->select() ; 
      
      //账户是否存在，不存在直接返回错误代码
      if( count($data) == 0 || $data[0]['password'] != $pwd )
      {
         return false ;
      }

      return true ;
      
   }
}