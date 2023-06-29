<?php

use App\Controller;
use App\Session;

class login extends Controller
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
        self::view('login', []);
    }
    public function login()
    {
        Controller::$model->login();
    }
}
