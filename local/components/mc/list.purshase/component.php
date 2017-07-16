<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule('iblock') || !isset($arParams['BREND_ID'])) die();

$arResult = array();
$res1 = CIBlockElement::GetByID($arParams['BREND_ID']);
if($ar_res = $res1->GetNext())  $nameBr = $ar_res['NAME'];
else $nameBr = "Made in Tula";

$arResult["BREND"] = $nameBr;

$arSelect = Array("ID", "IBLOCK_ID", "NAME",
    "PROPERTY_PRICE", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_BREND");
$arFilter = Array("IBLOCK_ID" => 4, "PROPERTY_BREND" => $arParams['BREND_ID'],"INCLUDE_SUBSECTIONS" => "Y",
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