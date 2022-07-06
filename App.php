<?php
include_once "../controllers/Controller.php";
$BASE_URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
class App  
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    function __construct()
    {
        $url=$this->parseURL();

        if(isset($url[0]) && $url[0] && file_exists('../controllers/'. $url[0].'Controller.php')){
            $this->controller=$url[0]."Controller";
            unset($url[0]);
        }

        require_once '../controllers/' . $this->controller.'.php';
        $this->controller = new $this->controller;
        if (isset($url[1])){
            if (method_exists($this->controller,$url[1])) {
                $this->method=$url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url=rtrim($_GET['url'], '/');
            $url=explode('/',filter_var($url, FILTER_SANITIZE_URL));
            // echo $url;
            // $url=explode('/',$url);
            return $url;
        }
    }
    
    

}
