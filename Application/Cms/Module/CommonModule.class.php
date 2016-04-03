<?php

namespace Cms\Module;
Class CommonModule
{  
   //增
   public function add($table, $order, $condition)
   {
		$Model = D($table) ;
		$res = false ;		

      //检验有没时间格式到时间戳的转换
      if(isset($condition['time']))
      {
         $condition['time'] = strtotime($condition['time']) ;
      }
     
		if( $order == 0 )
		{
			//没有顺序要求,直接插入数据库
			$res = $Model->add($condition) ;         
		}
		else if($order == 1)
		{
			//有	顺序要求,直接插入数据库		
			//1.获取所有数据，找到最大的ord			
			$data =  $Model->order(array('order'=>'desc'))->select();			
			$o = $data[0]['order'] ;			
			//2.设置当前增添的数据的order		
			$condition['order'] = $o+1 ;		
			$res = $Model->add($condition) ;
		}
		
		return $res ;      
   }

   //删
   public function delete($table, $order, $id, $condition)
   {
		$Model = D($table) ;
		$res = false ;		
      $data =  $Model->where(array('id'=>$id))->select() ; 
      
      //删除数据是否存在，不存在直接返回false
      if( count($data) == 0 )
      {
         return $res ;
      }

		if( $order == 0 )
		{
			//没有顺序要求,直接删除
			$Model->where(array('id'=>$id))->delete();
			$res = true ;         
		}
		else if($order == 1)
		{
			//有顺序要求,直接插入数据库				
      	//1.获取本条数据的order o，删除本条数据
      	$o = $data[0]['order'] ;
      	$Model->where(array('id'=>$id))->delete();

			//2.更新所有数据的order，大于o的减1，小于o的不变
      	 $data =  $Model->order(array('order'=>'asc'))->select() ;
		    for( $i = 0 ; $i< count($data); $i++ )
		    {
		    	if( $data[$i]['order']> $o)
		    	{
		    	   $data[$i]['order'] -= 1 ;
		    	   $Model->where(array('id'=>$data[$i]['id']))->save($data[$i]) ;
		    	}
		    }

		    $res = true ;
		}	

		return $res ;
   }

   //改
   public function update($table, $id, $condition)
   {
      $Model = D($table) ;
      $data =  $Model->where(array('id'=>$id))->select() ;     
      //更新的数据是否存在，不存在直接返回false
      if( count($data) == 0 )
      {
         return false ;
      }

      //检验有没时间格式到时间戳的转换
      if(isset($condition['time']))
      {
         $condition['time'] = strtotime($condition['time']) ;
      }

      $data = $Model->where(array('id'=>$id))->save($condition) ;
      //如果返回false则表示更新出错;否则更新成功
      return  $data ;  
   }

   //移动位置
   public function move($table, $direction, $id)
   {
      $res ;
      //上移/下移一条数据
      //1.判断是否可以上移或下移
      $Model = D($table) ;
      $data =  $Model->where(array('id'=>$id))->select() ;
      //更新的数据是否存在，不存在直接返回false
      if( count($data) == 0 )
      {
         return false ;
      }
      
      $data_all =  $Model->order(array('order'=>'desc'))->select() ; 
      $o = $data[0]['order'] ;
      $o_max = $data_all[0]['order'] ;

      if( $direction == "up" && $o == 1)
      {
         //已经最上了，无法再往上移动
         $res["ErrorCode"] = 0 ;
         $res["ErrorMessage"] = "已经最上了，无法再往上移动！" ;
         return $res ;
      }

      if( $direction == "down" && $o == $o_max )
      {
         //已经最下了，无法再往下移动
         $res["ErrorCode"] = 0 ;
         $res["ErrorMessage"] = "已经最下了，无法再往下移动！" ;
         return $res ;
      }

      //2.如果是上移命令，获取order为o-1的数据data
      //  如果是上移命令，获取order为o+1的数据data
      if( $direction == "up" )
      {
         $o_tmp = $o - 1 ;
      }  
      else if( $direction == "down" )
      {
         $o_tmp = $o + 1 ;
      }  
      else
      {
         return false ;
      }

      //3.交换数据
      $condition['order'] = -1 ;
      $Model->where(array('order'=>$o_tmp))->save($condition) ;

      $condition['order'] = $o_tmp ;
      $Model->where(array('order'=>$o))->save($condition) ;

      $condition['order'] = $o ;
      $Model->where(array('order'=>-1))->save($condition) ;

      $res["ErrorCode"] = 1 ;
      $res["ErrorMessage"] = "操作成功" ;
      return $res ;
   }
 
}