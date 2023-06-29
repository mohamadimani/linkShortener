<?php

namespace App;



class Controller
{
    public static $model;
    function __construct()
    {
    }

    public static function view($url = '', $data = [], $header = true, $footer = true)
    {
        $headerUrl = 'views/header.php';
        if ($header and file_exists($headerUrl)) {
            require($headerUrl);
        }

        $url = "views/$url.php";
        if (file_exists($url)) {
            require($url);
        } else {
            vd('404! page not found', 0, 1);
        }

        $footerUrl = 'views/footer.php';
        if ($footer and file_exists($footerUrl)) {
            require($footerUrl);
        }
    }

    public static function model($modelName = '')
    {
        $modelUrl = 'models/model_' . $modelName . '.php';
        if (file_exists($modelUrl)) {
            require($modelUrl);
            $modelName = 'model_' . $modelName;
            self::$model = new  $modelName;
        } else {
            vd('404! model page not found', 0, 1);
        }
    }

    public static function checkLogin($url )
    {
       if(!Session::isset('user_id')){
        Session::set('msg', 'برای دسترسی به این صفحه باید وارد شوید');
        redirect(URL . $url);
        exit;
       }
    }
}
