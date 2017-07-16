<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Покупка");?>
<?
$APPLICATION->IncludeComponent("mc:output.purchases", "",
    array("ELEMENT_ID" => $_GET["ELEMENT_ID"]), false);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
