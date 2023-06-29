<body>
    <div class="container">
        <form action="<?= URL ?>login/login" method="post">
            <h2>ورود</h2>
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

            <label for="password"><b>رمزعبور</b></label>
            <input type="password" name="password" id="password" required>
            <hr>
            <button type="submit" class="registerbtn">ورود</button>
            <a href="<?= URL ?>register" type="submit" class="loginbtn">ثبت نام</a>
        </form>
    </div>
</body>