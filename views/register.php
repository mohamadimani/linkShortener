<body>
    <div class="container">
        <form action="<?= URL ?>register/register" method="post">
            <h2>ثبت نام</h2>
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
            <label for="username"><b>نام کاربری</b></label>
            <input type="text" name="username" id="username" required>

            <label for="email"><b>ایمیل</b></label>
            <input type="text" name="email" id="email" required>

            <label for="password"><b>رمزعبور</b></label>
            <input type="password" name="password" id="password" required>

            <label for="password_repeat"><b>تایید رمزعبور</b></label>
            <input type="password" name="password_repeat" id="password_repeat" required>
            <hr>

            <button type="submit" class="registerbtn">ثبت نام</button>
            <a href="<?= URL ?>login" type="submit" class="loginbtn">ورود</a>
        </form>
    </div>
</body>