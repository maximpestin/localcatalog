<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="compout">
    <h1>Товары бренда '<?=$arResult['BREND']?>'</h1>

    <?if($arResult["LIST_ELEMENTS"]):?>
        <?foreach ($arResult["LIST_ELEMENTS"] as $elem):?>
            <a href="/services/purshase.php?ELEMENT_ID=<?=$elem["ID"]?>">
                <div class="product">
                    <h2> <?=$elem["NAME"]?> </h2>
                    <?if($elem["PREVIEW_PICTURE"]):?>
                        <?=$elem["PREVIEW_PICTURE"]?>
                    <?else:?>
                        <img src="#" alt="Изображение не найдено" style="height: 100px;">
                    <?endif;?>
                    <h3 style="text-align: left; text-indent: 35px; padding-left: 10px;"> Цена: <?=$elem["PROPERTY_PRICE_VALUE"]?>р </h3>
                    <p>
                        <?if($elem["PREVIEW_TEXT"]):?>
                            <?=$elem["PREVIEW_TEXT"]?>
                        <?else:?>
                            <span style="color: red; text-align: left;">Описание отсутствует</span>
                        <?endif;?>
                    </p>
                </div>
            </a>
        <?endforeach;?>
    <?else:?>
        <p> Товары в каталоге отсутствуют </p>
    <?endif;?>
</div>
