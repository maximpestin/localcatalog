<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule('iblock') || !isset($arParams['SECTION_ID'])) die();
$res = CIBlockSection::GetByID($arParams['SECTION_ID']);
$arResult = array();
if($ar_res = $res->GetNext()) {
    $arResult["NAME_SECTIONS"] = $ar_res['NAME'];
    $arResult["DESCRIPTION_SECTIONS"] =$ar_res['DESCRIPTION'];
    $arResult["PICTURE_SECTIONS"] = CFile::ShowImage($ar_res['PICTURE'], 400, 300);
    //  print_r($ar_res);
}
else exit("<h1 style='text-align: center; color:red;'>Католог не найден!</h1>");

$arSelect = Array("ID", "IBLOCK_ID", "NAME",
    "PROPERTY_PRICE", "PREVIEW_PICTURE", "PREVIEW_TEXT");
$arFilter = Array("SECTION_ID"=>$_GET['SECTION_ID'], "INCLUDE_SUBSECTIONS" => "Y",
    "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$listEl = array();
while($ob = $res->GetNextElement())
    $listEl[] = $ob->GetFields();
if(count($listEl))
{
    $buf_listEl = array();
    foreach ($listEl as $elem)
    {
        $elem["PREVIEW_PICTURE"] = CFile::ShowImage($elem["PREVIEW_PICTURE"], 300, 300);
        $buf_listEl[] = $elem;
    }
    $arResult["LIST_ELEMENTS"] = $buf_listEl;
}


$this->IncludeComponentTemplate();