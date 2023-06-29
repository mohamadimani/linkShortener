<?php

use App\Session;

Session::init();
date_default_timezone_set('Asia/Tehran');

define('PATH',  basename(dirname(__FILE__)) . '/');
define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/linkshorter/');
