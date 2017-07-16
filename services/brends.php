<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Католог бренда");?><?
CModule::IncludeModule('iblock');
$APPLICATION->IncludeComponent("mc:list.purshase",
    "", array("BREND_ID" => $_GET["BREND_ID"]),
    false);
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>