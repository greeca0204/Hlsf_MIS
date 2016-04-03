<?php
namespace Home\Controller;
use Think\Controller;

class ProjectsController extends MyController 
{
	function __construct()
	{
	}
	
	public function index()
	{
		$this->display();
	}
}