<?php
namespace Cms\Controller;
use Think\Controller;
class NewsController extends BasicController {
    
    function __construct()
    {
        parent::__construct();
    }

    protected $map = array(
        'index' => 'news_hlzx',
        'hlzx' => 'news_hlzx',
        'hydt' => 'news_hydt',
        'jjmt' => 'news_mtjj',
        'dsj' => 'news_dsj',
        'tpxw' => 'news_tpxw',
        'xz' => 'news_xz'
        );

    public function index()
    {
        redirect('/Cms/News/hlzx');
    }

    public function hlzx()
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
            if($_GET['act'] === "add" || $_GET['act'] === "update") {
                $this->JS_PRELOAD = array('/Public/3rd/ckeditor/ckeditor.js');
            }
            $this->get_page();
        }
        else {
            //ajax请求
            $this->get_ajax();
        }
    }

    public function hydt()
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
            if($_GET['act'] === "add" || $_GET['act'] === "update") {
                $this->JS_PRELOAD = array('/Public/3rd/ckeditor/ckeditor.js');
            }
            $this->get_page();
        }
        else {
            //ajax请求
            $this->get_ajax();
        }
    }
    public function jjmt()
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
            if($_GET['act'] === "add" || $_GET['act'] === "update") {
                $this->JS_PRELOAD = array('/Public/3rd/ckeditor/ckeditor.js');
            }
            $this->get_page();
        }
        else {
            //ajax请求
            $this->get_ajax();
        }
    }
    public function dsj()
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
            if($_GET['act'] === "add" || $_GET['act'] === "update") {
                $this->JS_PRELOAD = array('/Public/3rd/ckeditor/ckeditor.js');
            }
            $this->get_page();
        }
        else {
            //ajax请求
            $this->get_ajax();
        }
    }
    public function tpxw()
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
            if($_GET['act'] === "add" || $_GET['act'] === "update") {
                $this->JS_PRELOAD = array('/Public/3rd/ckeditor/ckeditor.js');
            }
            $this->get_page();
        }
        else {
            //ajax请求
            $this->get_ajax();
        }
    }
    public function xz()
    {
        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') {
            if($_GET['act'] === "add" || $_GET['act'] === "update") {
                $this->JS_PRELOAD = array('/Public/3rd/ckeditor/ckeditor.js');
            }
            $this->get_page();
        }
        else {
            //ajax请求
            $this->get_ajax();
        }
    }

    function get_page()
    {
        $uri_arr = array_slice(split("/", $_SERVER['REDIRECT_URL']), 1, 3);
        if($uri_arr[1] == "") $uri_arr[1] = "Index";
        if($uri_arr[2] == "") $uri_arr[2] = "index";
        $this->CURRETN_CONTROLLER = $uri_arr[1];
        $this->CURRETN_MODULE = $uri_arr[2];

        $this->display('./header');
        $this->display($this->CURRETN_CONTROLLER.'/sidebar');
        $act = isset($_GET['act']) ? $_GET['act'] : 'list';
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($act === "list") {
            $p = isset($_GET['p']) ? $_GET['p'] : 1;
            $limit = 10;
            $D = D('News', 'Module');
            $this->count = $D->count($this->map[$this->CURRETN_MODULE]);
            $this->all = ceil($this->count / $limit);
            $this->now = $p;
            $this->data = $D->get($this->map[$this->CURRETN_MODULE], $p, $limit);
            $this->show();
        }
        else if($act === "add") {
            $this->display($this->CURRETN_MODULE.'_add');
        }
        else if($act === "update") {
            if(!isset($id)) $this->show_404();
            $D = D('News', 'Module');
            $this->data = $D->get_by_id($this->map[$this->CURRETN_MODULE], $id);
            $this->display($this->CURRETN_MODULE.'_update');
        }
        else if($act === "show") {
            if(!isset($id)) $this->show_404();
            $D = D('News', 'Module');
            $this->data = $D->get_by_id($this->map[$this->CURRETN_MODULE], $id);
            $this->display($this->CURRETN_MODULE.'_show');
        }
        $this->display('./footer');
    }
    function get_ajax()
    {
        $uri_arr = array_slice(split("/", $_SERVER['REDIRECT_URL']), 1, 3);
        if($uri_arr[1] == "") $uri_arr[1] = "Index";
        if($uri_arr[2] == "") $uri_arr[2] = "index";
        $this->CURRETN_CONTROLLER = $uri_arr[1];
        $this->CURRETN_MODULE = $uri_arr[2];
        $act = isset($_GET['act']) ? $_GET['act'] : 'list';
        if($act === "add") {
            $D = D('News', 'Module');
            $data = $D->add($this->map[$this->CURRETN_MODULE], $_POST);
        } else if($act === "delete") {
            $D = D('News', 'Module');
            if(!isset($_POST['id'])) {
                $this->ajaxReturn(array('errcode' => 1, 'errorMessage' => '缺少id'));
            }
            $data = $D->delete($this->map[$this->CURRETN_MODULE], $_POST['id']);
        } else if($act === "update") {
            $D = D('News', 'Module');
            $data = $_POST;
            $data = $D->update($this->map[$this->CURRETN_MODULE], $_GET['id'], $data);
        }
        $this->ajaxReturn(array('errcode' => 0, 'errorMessage' => '', 'data' => $data));
    }
}