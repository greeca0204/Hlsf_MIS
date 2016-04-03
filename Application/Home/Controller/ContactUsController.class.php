<?php
namespace Home\Controller;
use Think\Controller;

class ContactUsController extends MyController 
{
	function __construct()
	{
	}
	
	public function index()
	{
		$this->display();
	}
}