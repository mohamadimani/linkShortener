<?php

use App\Session;

class model_l extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function linkLoad($hash)
    {
        $result = $this->Do_select("select * from `links` where  short_link=? ", [$hash], 1);
        if ($result) {
            $this->Do_Query("update   `links` set view_count = view_count+1  where  `short_link`=?", [$hash]);

            redirect($result['link']);
            exit;
        }
        Session::set('msg', 'این لینک وجود ندارد');
        redirect(URL . 'link');
        exit;
    }
}
