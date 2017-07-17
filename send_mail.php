<?php
    mail("m.pestin@maximaster.ru", "Hello!", "Hello, World!",
        "From: support@server.local");
    header("Location: https://mail.yandex.ru/?uid=1130000024518652&login=m.pestin#inbox");