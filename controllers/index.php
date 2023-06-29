<?php

use App\Controller;

class index extends Controller
{

    public function __construct()
    {
        redirect(URL . 'login');
    }
    public function index()
    {
    }
}
