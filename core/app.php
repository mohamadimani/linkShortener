<?php
class App
{
    public static $url;

    public function __construct()
    {
        static::$url = isset($_GET['url']) ? $_GET['url'] : 'index/index';
        static::index();

        // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //     static::get();
        // }
    }


    public static function index()
    {
        $url = trim(static::$url, '/');
        $url = explode('/',  $url);

        $controlerName =   isset($url[0]) ? $url[0] : 'index';
        unset($url[0]);
        $controllerUrl = "controllers/$controlerName.php";
        if (!file_exists($controllerUrl)) {
            vd('404! page not found', 0, 1);
        }

        include($controllerUrl);
        $controllerObject = new $controlerName;
        $controllerObject::model($controlerName);
        $methodName = isset($url[1]) ? $url[1] : 'index';
        unset($url[1]);
        if (!method_exists($controllerObject, $methodName)) {
            vd('404! page not found', 0, 1);
        }

        $params = !empty($url) ? array_values($url) : [];

        $params = array_filter($params);
        call_user_func_array([$controllerObject, $methodName], $params);
    }
}
