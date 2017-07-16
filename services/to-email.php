<?
    if($_POST['NAME_PUR'] && $_POST['BREND']
        && $_POST['COUNTRY'] && $_POST['PRICE']
        && $_POST['SURNAME'] && $_POST['NAME']
        && $_POST['FATHERNAME'] && $_POST['TEL']
        && $_POST['E-MAIL'])
    {
        $to = $_POST['E-MAIL'];
        $subject = "Заказ товара на сайте 'localhost'";
        $message = "Уважаемый {$_POST[NAME]} {$_POST[SURNAME]} {$_POST[FATHERNAME]}!" . PHP_EOL . PHP_EOL;
        $message .= "На ваше имя был осуществлён следующий заказ на сайте 'localhost':" . PHP_EOL;
        $message .= "Товар: {$_POST[NAME_PUR]};" . PHP_EOL;
        $message .= "Бренд: {$_POST[BREND]};" . PHP_EOL;
        $message .= "Страна: {$_POST[COUNTRY]};" . PHP_EOL;
        $message .= "Цена: {$_POST[PRICE]};" . PHP_EOL . PHP_EOL;
        $message .= "При отправки вы указали:" . PHP_EOL;
        $message .= "Телефон: {$_POST[TEL]};" . PHP_EOL;
        $message .= "E-MAIL: {$_POST['E-MAIL']};" . PHP_EOL . PHP_EOL;
        $message .= "Заявка принята!" . PHP_EOL;
        $headers = "From: maxime1996rus@mail.ru;";

        setcookie("SURNAME", $_POST['SURNAME'], time()+360000, '/');
        setcookie("NAME", $_POST['NAME'], time()+360000, '/');
        setcookie("FATHERNAME", $_POST['FATHERNAME'], time()+360000, '/');
        setcookie("TEL", $_POST['TEL'], time()+360000, '/');
        setcookie("E-MAIL", $_POST['E-MAIL'], time()+360000, '/');

        if(@mail($to, $subject, $message, $headers)) echo $message;
        else echo "Заказ офомлен не корректно!";
    }
    else echo "Заказ офомлен не корректно!";
?>