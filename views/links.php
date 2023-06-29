<body>
    <div class="container-fluid">
        <h2 class="p5">
            <span>
                تاریخچه لینک ها
            </span>
            <a href="<?= URL . 'logout' ?>" class="btn btn-warning btn-sm pushleft">خروج</a>
            <a href="<?= URL . 'link' ?>" class="btn btn-sm btn-info pushleft">ثبت لینک جدید</a>
        </h2>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>لینک اصلی</th>
                    <th>لینک کوتاه شده</th>
                    <th>تعداد بازدید</th>
                    <th>QR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['links'] as $link) {
                ?>
                    <tr>
                        <td><?= substr($link['link'], 0, 50) . ' ... '  ?></td>
                        <td><a target="_blank" href="<?= URL . 'l/l/' . $link['short_link'] ?>"><?= URL . 'l/l/' . $link['short_link']    ?></a></td>
                        <td><?= $link['view_count'] ?></td>
                        <td>
                            <iframe src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?= URL . 'l/l/' . $link['short_link'] ?>" frameborder="0"></iframe>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>