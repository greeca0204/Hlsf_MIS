<?php
namespace Home\Controller;
use Think\Controller;

class NewsController extends MyController 
{
	function __construct()
	{
	}
	
	public function index()
	{
		$this->display();
	}
}