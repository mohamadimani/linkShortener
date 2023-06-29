<?php

use App\Controller;
use App\Session;

class register extends Controller
{

    public function __construct()
    {
        if (Session::isset('user_id')) {
            redirect(URL . 'link');
            exit;
        }
    }
    public function index()
    {
        self::view('register', []);
    }
    public function register()
    {
        Controller::$model->register();
    }
}
