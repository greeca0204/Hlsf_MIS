<?php
namespace Home\Controller;
use Think\Controller;

class PolicyController extends MyController 
{
	function __construct()
	{
	}
	
	public function index()
	{
		$this->display();
	}
}