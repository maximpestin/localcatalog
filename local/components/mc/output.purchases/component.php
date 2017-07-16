<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule('iblock') || !isset($arParams["ELEMENT_ID"])) die();


$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_TEXT", "DETAIL_PICTURE",
    "PROPERTY_PRICE", "PROPERTY_BREND", "PROPERTY_COUNTRY", "PROPERTY_NUM", "PROPERTY_GALLERY");
$arFilter = Array("ID" => $arParams["ELEMENT_ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
if($ar_res = $res->GetNext()) {
    $arResult["NAME"] = $ar_res['NAME'];
    $arResult["DETAIL_TEXT"] =$ar_res['DETAIL_TEXT'];
    $fileResult = CFile::GetFileArray($ar_res["DETAIL_PICTURE"]);
    $arResult["DETAIL_PICTURE"] = $fileResult["SRC"];

    $arResult["PRICE"] = $ar_res['PROPERTY_PRICE_VALUE'];

    $res1 = CIBlockElement::GetByID($ar_res["PROPERTY_BREND_VALUE"]);
    if($arR = $res1->GetNext())  $arResult["BREND"] = $arR['NAME'];
    else $arResult["BREND"] = "Made in Tula";

    $arResult["COUNTRY"] = $ar_res['PROPERTY_COUNTRY_VALUE'];
    $arResult["NUMBER"] = $ar_res['PROPERTY_NUM_VALUE'];
    $arGallery = false;
    foreach ($ar_res['PROPERTY_GALLERY_VALUE'] as $value) {
        $fileResult = CFile::GetFileArray($value);
        $arGallery[] = $fileResult["SRC"];
    }
    $arResult["GALLERY"] = $arGallery;
    $arResult["COOKIES"] = array(
        "NAME" => $_COOKIE['NAME'],
        "SURNAME" => $_COOKIE['SURNAME'],
        "FATHERNAME" => $_COOKIE['FATHERNAME'],
        "TEL" => $_COOKIE['TEL'],
        "E-MAIL" => $_COOKIE['E-MAIL']);

}
else exit("<h1 style='text-align: center; color:red;'>Товар не найден!</h1>");

$this->IncludeComponentTemplate();