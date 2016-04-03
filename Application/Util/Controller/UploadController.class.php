<?php
namespace Util\Controller;
use Think\Controller;
use Org\Util\UploadHandler;
class UploadController extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $day_dir = date("Ymd", time());
        $filename = microtime();
        $options = array(
            'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/Public/upload/' . $day_dir . "/",
            'upload_url' => $this->get_full_url().'/Public/upload/' . $day_dir . "/",
            );
        if(!is_dir($options['upload_url'])) {
            mkdir($options['upload_url']);
        }
        $upload_handler = new UploadHandler($options);
    }

    public function ckeditor()
    {
        $day_dir = date("Ymd", time());
        $filename = microtime();
        $options = array(
            'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/Public/ckeditor/' . $day_dir . "/",
            'upload_url' => $this->get_full_url().'/Public/ckeditor/' . $day_dir . "/",
            'param_name' => 'upload'
            );
        if(!is_dir($options['upload_url'])) {
            mkdir($options['upload_url']);
        }
        $upload_handler = new UploadHandler($options);
    }

    protected function get_server_var($id) {
        return @$_SERVER[$id];
    }

    protected function get_full_url() {
        $https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
            !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
        return
            ($https ? 'https://' : 'http://').
            (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
            (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
            ($https && $_SERVER['SERVER_PORT'] === 443 ||
            $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
            substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }
}