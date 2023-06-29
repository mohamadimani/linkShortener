<body>
    <div class="container">
        <form action="<?= URL ?>link/shortlink" method="post">
            <h2 class="p5">
                <span>
                    کوتاه کننده لینک
                </span>
                <a href="<?= URL . 'logout' ?>" class="btn btn-warning btn-sm pushleft">خروج</a>
                <a href="<?= URL . 'link/links' ?>" class="btn btn-sm btn-info pushleft">تاریخچه لینک ها</a>

            </h2>
            <hr>
            <?php

            use App\Session;

            if (Session::isset('msg')) { ?>
                <h5 class="btn btn-info">
                    <?php echo Session::get('msg') . '<br>'; ?>
                </h5>
                <hr>
            <?php
                Session::unset('msg');
            }  ?>
            <label for="link"><b>لینک اصلی</b></label>
            <input type="text" name="link" id="link" required value="<?= (Session::isset('link') ? Session::get('link') : '') ?>">
            <hr>
            <button type="submit" class="shorterbtn">کوتاه کردن لینک</button>
        </form>
        <?php if (Session::isset('short_link')) { ?>
            <hr>
            <label for="short_link"><b>لینک کوتاه شده</b></label>
            <input type="text" name="short_link" id="short_link" value="<?= (Session::isset('short_link') ?  URL . 'l/l/' . Session::get('short_link') : '') ?>">
            <hr>
            <a href="<?= URL . 'link/qr/' . Session::get('short_link') ?>" type="submit" class="qrcodebtn">دریافت QR کد</a>
        <?php } ?>
    </div>
</body>