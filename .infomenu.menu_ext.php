<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
global $APPLICATION;

$aMenuLinksExt=$APPLICATION->IncludeComponent("mc:menu.sections", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "/",
    "SECTION_PAGE_URL" => "#SITE_DIR#/services/list.php?SECTION_ID=#SECTION_ID#",
    "DETAIL_PAGE_URL" => "#SITE_DIR#/services/detail.php?ID=#ELEMENT_ID#",
    "IBLOCK_TYPE" => "services",
    "IBLOCK_ID" => "4", // ID - id вашего инфоблока
    "DEPTH_LEVEL" => "4",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "0",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600"
),
    false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
