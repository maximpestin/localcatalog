<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");?>
<?
if(!isset($_GET["SECTION_ID"])) die();;
?>

<?
CModule::IncludeModule('iblock');

$APPLICATION->IncludeComponent("mc:output",
    "", array("SECTION_ID" => $_GET["SECTION_ID"]),
    false);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
