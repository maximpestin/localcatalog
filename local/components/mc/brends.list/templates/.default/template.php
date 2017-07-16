<?
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
    <div class="brends" >
        <h3> Наши бренды </h3>
        <ul>
            <?if($arResult["BRENDS"]):?>
            <?foreach ($arResult["BRENDS"] as $key => $val):?>
                    <li><a href="<?=$val?>"><?=$key?></a></li>
            <?endforeach;?>
            <?endif;?>
        </ul>
    </div>