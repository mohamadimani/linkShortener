<?php

use App\Controller;

class link extends Controller
{
    public function __construct()
    {
        self::checkLogin('login',);
    }

    public function index()
    {
        self::view('link', []);
    }

    public function qr($hash)
    {
        self::view('qr', ['hash' => $hash]);
    }

    public function shortlink()
    {
        Controller::$model->shortLink();
    }

    public function links()
    {
        $links = Controller::$model->links();
        self::view('links', ['links' => $links]);
    }
}
