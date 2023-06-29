<?php

use App\Controller;

class l extends Controller
{
    public function __construct()
    {
    }

    public function l($hash = '')
    {
        
        Controller::$model->linkLoad($hash);
    }
}
