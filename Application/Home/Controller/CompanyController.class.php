<?php
namespace Home\Controller;
use Think\Controller;

class CompanyController extends MyController 
{
	function __construct()
	{
	}
	
	public function index()
	{
		$this->display();
	}
}