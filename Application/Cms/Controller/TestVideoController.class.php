<?php
namespace Cms\Controller;
use Think\Controller;
class TestVideoController extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->display();
    }

    public function img()
    {
        $post_img = $_POST['frame'] ;

        $image=base64_decode($post_img);
        $filename = 'file.txt';        
        file_put_contents($filename, $image);
    }
}