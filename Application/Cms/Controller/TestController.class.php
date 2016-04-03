<?php
namespace Cms\Controller;
use Think\Controller;
class TestController extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->display();
    }

    public function ckeditor()
    {
        $this->display();
    }
}