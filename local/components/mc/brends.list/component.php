<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule('iblock')) die();

if($arParams["REQUEST_URI"])
{
    $req = parse_url($arParams["REQUEST_URI"]);
    $path = $req["path"];
    if($path == "/services/list.php" && $_GET['SECTION_ID'])
    {
        $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_BREND");
        $arFilter = Array("SECTION_ID"=>$_GET['SECTION_ID'], "INCLUDE_SUBSECTIONS" => "Y",
            "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    }
    else if ($path == "/services/purshase.php" && $_GET['ELEMENT_ID'])
    {
        $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_BREND");
        $arFilter = Array("ID"=>$_GET['ELEMENT_ID'], "INCLUDE_SUBSECTIONS" => "Y",
            "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    }
    else {
        $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_BREND");
        $arFilter = Array("IBLOCK_ID"=> 4, "INCLUDE_SUBSECTIONS" => "Y",
            "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    }
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    $listEl = array();
    while($ob = $res->GetNextElement()) {
        $listEl[] = $ob->GetFields();
    }
    $arBrends = array();
    foreach ($listEl as $val)
    {
        $res1 = CIBlockElement::GetByID($val['PROPERTY_BREND_VALUE']);
        if($ar_res = $res1->GetNext())  $nameBr = $ar_res['NAME'];
        else $nameBr = "Made in Tula";
        $arBrends[$nameBr] = "/services/brends.php?BREND_ID=" . $val['PROPERTY_BREND_VALUE'];
    }
    $arResult = array();
    $arResult["BRENDS"] = $arBrends;
}
else {echo "<p style='margin: 5px; color: red;'> Бренды не найдены! </p>"; };
$this->IncludeComponentTemplate();