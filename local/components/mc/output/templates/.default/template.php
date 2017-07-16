<?$this->addExternalJs("script.js");?>
<div class="compout">
    <h1><?=$arResult['NAME_SECTIONS']?></h1>
    <div class="image-anons">
        <!--img src="shapki.jpg" alt="Зимняя равнина" /-->
        <?if($arResult["PICTURE_SECTIONS"]):?>
        <?=$arResult["PICTURE_SECTIONS"]?>
        <?else:?>
        <img src="#" alt="Изображение отсутсвует..." style="height: 100px;">
        <?endif;?>
        <p><?if($arResult["DESCRIPTION_SECTIONS"]):?>
                <?=$arResult["DESCRIPTION_SECTIONS"]?>
            <?else:?>
            <span style="color: red; text-align: center;">Описание отсутствует</span>
            <?endif;?>
        </p>
    </div>
    <h1>Товары в каталоге '<?=$arResult['NAME_SECTIONS']?>'</h1>

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