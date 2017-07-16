<!doctype html>
<html lang="en">
<head>
    <title><?$APPLICATION->ShowTitle();?> </title>
    <?$APPLICATION->ShowHead();?>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Магазин</title>

    <? $pu = parse_url($_SERVER['REQUEST_URI']);
    $pu = $pu["path"];?>
    <?if($pu != "/services/purshase.php"):?><script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js "></script><?endif;?>

    <script language="javascript">
        $(document).ready(function(){
            var headermenu = $(".float-menu");
            var offset = headermenu.offset();
            var left = offset.left;
            var top = offset.top;
            var width = $(".float-menu").width();
            var height = $(".float-menu").height();

            $(window).scroll(function(){
                var scrollTop = $(window).scrollTop();
                if (scrollTop > top) {
                    $('#float').css({
                        width:width+'px',
                        height:height+'px'
                    });
                    $('.float-menu').css({
                        left:left+'px',
                        position:'fixed',
                        top:"0px",
                        width:width+"px"
                    });
                } else {
                    $('#float').css({
                        width:'0px',
                        height:'0px'
                    });
                    $('.float-menu').css({
                        position:'static',
                    });
                }
            });
        });
    </script>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div id="hm">
	<header id="header">
		Hello, People!
	</header>
</div>
<nav id="nav" class="float-menu">
    <ul class="main-menu">
        <? $pu = parse_url($_SERVER['REQUEST_URI']);
            $pu = $pu["path"];?>
        <?if($pu != "/index.php" && $pu != "/"):?><li><a href="/">Главная</a></li><?endif;?>
        <li><a href="/o-sebe.php">О себе</a></li>
        <li><a href="/kontakty.php">Контакты</a></li>
        <li><a href="/services/index.php">Сервисы</a></li>
    </ul>
</nav>
<div style="height: 20px; border: 0px;">
</div>

<aside id="left_side">
    <h3> Каталоги товаров </h3>
    <div>
        <?$APPLICATION->IncludeComponent("mc:menu", "tree", array(
        "ROOT_MENU_TYPE" => "infomenu",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MAX_LEVEL" => "4",
        "CHILD_MENU_TYPE" => "infomenu",
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "N"
    ),
        false
    );
    ?>
    </div>
    <??>
    <?/*
    $APPLICATION->IncludeComponent(
        "bitrix:menu",
        "sections-elements",
        array(
            "ALLOW_MULTI_SELECT" => "Y",
            "CHILD_MENU_TYPE" => "left",
            "COMPONENT_TEMPLATE" => ".default",
            "DELAY" => "N",
            "MAX_LEVEL" => "4",
            "MENU_CACHE_GET_VARS" => array(
            ),
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_USE_GROUPS" => "N",
            "MENU_THEME" => "site",
            "ROOT_MENU_TYPE" => "left",
            "USE_EXT" => "Y"
        ),
        false
    );*/
?>
</aside>
<aside id="right_side">
     <?
        $APPLICATION->IncludeComponent("mc:brends.list",
            "",
            array("REQUEST_URI" => $_SERVER['REQUEST_URI']),
            false);
     ?>
</aside>
<main id="main">
	