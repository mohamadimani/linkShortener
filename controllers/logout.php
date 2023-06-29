<?php

use App\Controller;
use App\Session;

class logout extends Controller
{

    public function __construct()
    {
        Session::clear();
        redirect(URL . 'login');
        exit;
    }
}
