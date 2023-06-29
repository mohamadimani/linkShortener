<?php

use App\Session;

class model_link extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function shortLink()
    {
        $link = $_POST['link'];
        $hashCod = str_shuffle('123456789qwertyuioplkjhgfdsaxcvbnm');
        $shortLink =   substr($hashCod, 0, 10);
        $userId = Session::get('user_id');

        $result = $this->Do_select("select * from `links` where link=? and user_id=? ", [$link, $userId], 1);
        if ($result) {
            Session::set('link', $link);
            Session::set('short_link', $result['short_link']);
            redirect(URL . 'link');
            exit;
        }

        $result = $this->Do_Query("insert into `links` (`user_id`,`link`,`short_link`) VALUES (?,?,?)", [$userId, $link, $shortLink]);
        if ($result) {
            Session::set('msg', 'لینک کوتاه با موفقیت ایجاد شد');
            Session::set('link', $link);
            Session::set('short_link', $shortLink);
            redirect(URL . 'link');
            exit;
        }
        Session::set('msg', 'مشکلی پیش آمد، مجدد تلاش کنید');
        redirect(URL . 'link');
        exit;
    }

    public function links()
    {
        Session::unset('link');
        Session::unset('short_link');
        $userId = Session::get('user_id');
        $result = $this->Do_select("select * from `links` where user_id=? ", [$userId]);
        if ($result) {
            return $result;
        }
        return [];
    }
}
