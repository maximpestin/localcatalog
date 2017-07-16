<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt=$APPLICATION->IncludeComponent(
    "mc:menu.tree",
    "",
    array(
        "IBLOCK_TYPE" => "services",
        "IBLOCK_ID" => "4",
        "DEPTH_LEVEL" => "5",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    ),
    false
);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
