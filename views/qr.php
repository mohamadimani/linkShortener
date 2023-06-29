<body>
    <div class="container">
        <h2 class="p5">
            <span>
                QR
            </span>
            <a href="<?= URL . 'logout' ?>" class="btn btn-warning btn-sm pushleft">خروج</a>
            <a href="<?= URL . 'link/links' ?>" class="btn btn-sm btn-info pushleft">تاریخچه لینک ها</a>
        </h2>
        <hr>
        <iframe style="width:50%;height:250px;text-align:center;margin:5px 22%;" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= URL . 'l/l/' . $data['hash'] ?>" frameborder="0"></iframe>
    </div>
</body>