<?php

use App\Session;

class model_register extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function register()
    {
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['password_repeat'];

        if ($password !== $passwordRepeat) {
            Session::set('msg', 'پسورد و تکرار پسورد یکی نیست');
            redirect(URL . 'register');
            exit;
        }

        $result = $this->Do_select("select * from `users` where username=? or email=?", [$userName, $email]);
        if ($result) {
            Session::set('msg', 'این نام کاربری یا ایمیل تکراری است');
            redirect(URL . 'register');
            exit;
        }

        $registered = $this->Do_Query("insert into `users` (`username`,`password`,`email`) VALUES (?,?,?)", [$userName, $password, $email]);
        if ($registered) {
            Session::set('msg', 'ثبت نام انجام شد، وارد شوید');
            redirect(URL . 'login');
            exit;
        }
        Session::set('msg', 'مشکل در ثبت نام، مجدد تلاش کنید');
        redirect(URL . 'register');
        exit;
    }
}
