<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends MyController 
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->display();
	}
}