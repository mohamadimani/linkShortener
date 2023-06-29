<?php

use App\Session;

class model_login extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $userName = $_POST['username'];
        $password = $_POST['password'];

        $result = $this->Do_select("select * from `users` where username=? and password=?", [$userName, $password], 1);
        if ($result) {
            Session::set('user_id', $result['id']);
            redirect(URL . 'link');
            exit;
        }

        Session::set('msg', 'نام کاربری یا رمز عبور اشتباه است');
        redirect(URL . 'login');
        exit;
    }
}
