<?php

function vd($param, $notDie = false, $printR = false)
{
    print_r('<pre>');
    if ($printR) {
        print_r($param);
    } else {
        var_dump($param);
    }
    if ($notDie) {
        echo '</br>';
    } else {
        die('</br>');
    }
}

function redirect($url = '')
{
    header('location:' . $url);
}
