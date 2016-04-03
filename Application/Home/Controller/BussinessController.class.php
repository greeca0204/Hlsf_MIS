<?php
namespace Home\Controller;
use Think\Controller;

class BussinessController extends MyController 
{
	function __construct()
	{
	}
	
	public function index()
	{
		$this->display();
	}
}