<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<script>
    jQuery(function(){
        if(!$.fn.imagezoomsl){
            $('.msg').show();
            return;
        }
        else $('.msg').hide();
        $('.datails-image').imagezoomsl({
            innerzoommagnifier: true,
            classmagnifier: window.external ? window.navigator.vendor === 'Yandex' ? "" : 'round-loope' : "", // fix для Opera, Safary, Yandex
            magnifierborder: "5px solid #F0F0F0",
            zoomrange: [2, 8],
            zoomstart: 4,
            magnifiersize: [150, 150]
        });
    });
</script>

<script type="text/javascript" language="javascript">
    function call() {
        var msg   = $('#formx').serialize();
        $.ajax({
            type: 'POST',
            url: 'to-email.php',
            data: msg,
            success: function(data) {
                location.href = "#";
                alert("Заказ отправлен на электронную почту!");
            },
            error:  function(xhr, str){
                alert("Ошибка при отправке заказа!");
            }
        });
    }
</script>


<div class="purchase color-purchase">
    <h1>Просмотр товара</h1>
    <div class="border-content">
        <img class="datails-image" src="<?=$arResult['DETAIL_PICTURE']?>"
             data-large="<?=$arResult['DETAIL_PICTURE']?>"
                alt="Изображение не найдено!" >
        <div class="purchase-property">
            <p class="head"><?=$arResult["NAME"]?></p>
            <ul>
                <li>Бренд: <?=$arResult["BREND"]?></li>
                <li>Страна: <?=$arResult["COUNTRY"]?></li>
                <li>Цена: <?=$arResult["PRICE"]?>р</li>
                <li>Колличество: <?=$arResult["NUMBER"]?></li>
            </ul>
            <a <?if($arResult["NUMBER"]):?>   href="#form_open" <?else:?> onclick="alert('Товар закончился!')" <?endif;?>>
                <input type="button" value="Купить" id="but">
            </a>
        </div>
    </div>
    <div class="details-text">
        <h2> Описание товара </h2>
        <?if($arResult["DETAIL_TEXT"]) echo $arResult["DETAIL_TEXT"]; else echo "<p style='color: red;'> Описание отсутствует! </p>";?>
    </div>
    <hr/>
    <?if($arResult["GALLERY"]):?>
    <div class="gal">
        <h2> Галерея </h2>
        <div id="page">
            <div id="gallery">
                <div id="panel">
                    <img id="largeImage" src="<?=$arResult["GALLERY"][0]?>" width="565" style="max-height: 500px;"/>
                    <div id="description">Фотография №1</div>
                </div>

                <div id="thumbs">
                    <?foreach ($arResult["GALLERY"] as $key => $value):?>
                    <img src="<?=$value?>" alt="Фотография №<?=$key + 1?>" width="100" height="40"/>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <script>
            $('#thumbs').delegate('img','click', function(){
                $('#largeImage').attr('src',$(this).attr('src'));
                $('#description').html($(this).attr('alt'));
            });
        </script>
    </div>
    <?endif;?>
</div>
<a href="#x" class="overlay" id="form_open"></a>
<div class="popup">
    <div class="forms">
        <h2 style="text-align: center">Оформление заказа!</h2>
        <div class="form-table">
            <form  method="POST" id="formx" action="javascript:void(null);" onsubmit="call()">
                <input type="hidden" name="NAME_PUR" value="<?=$arResult["NAME"]?>">
                <input type="hidden" name="PRICE" value="<?=$arResult["PRICE"]?>">
                <input type="hidden" name="BREND" value="<?=$arResult["BREND"]?>">
                <input type="hidden" name="COUNTRY" value="<?=$arResult["COUNTRY"]?>">
                <table>
                    <tr>
                        <td width="300px">Товар: </td><td><?=$arResult["NAME"]?></td>
                    </tr>
                    <tr>
                        <td>Бренд: </td> <td><?=$arResult["BREND"]?></td>
                    </tr>
                    <tr>
                        <td>Страна: </td> <td><?=$arResult["COUNTRY"]?></td>
                    </tr>
                    <tr>
                        <td>Цена: </td> <td><?=$arResult["PRICE"]?>р</td>
                    </tr>
                    <tr>
                        <td>Данные покупателя:</td> <td></td>
                    </tr>
                    <tr>
                        <td>Фамилия</td> <td><input type="text" name="SURNAME" value="<?=$arResult["COOKIES"]["SURNAME"]?>" required></td>
                    </tr>
                    <tr>
                        <td>Имя</td> <td><input type="text" name="NAME" value="<?=$arResult["COOKIES"]["NAME"]?>" required></td>
                    </tr>
                    <tr>
                        <td>Отчество</td> <td><input type="text" name="FATHERNAME" value="<?=$arResult["COOKIES"]["FATHERNAME"]?>" required></td>
                    </tr>
                    <tr>
                        <td>Телефон</td> <td><input type="tel" name="TEL" value="<?=$arResult["COOKIES"]["TEL"]?>"
                                                    pattern="\+7-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="+7-###-###-##-##" required></td>
                    </tr>
                    <tr>
                        <td>E-mail</td> <td><input type="email" value="<?=$arResult["COOKIES"]["E-MAIL"]?>"
                                                   name="E-MAIL" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="###@###.##" required></td>
                    </tr>
                    <tr>
                        <td>
                            <input class="button-send" type="submit" value="Оформить заказ" >
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <a class="close" title="Закрыть" href="#close"></a>
</div>
