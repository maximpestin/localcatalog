<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контакты");
$APPLICATION->SetTitle("Контакты");
?><h3 style="text-align: center;"><span style="color: #f16c4d;">Контакты</span></h3>
 <b><span style="font-family: &quot;Times New Roman&quot;, Times;">Телефон: +7-(903)-903-42-61;</span></b><br>
 <b><span style="font-family: &quot;Times New Roman&quot;, Times;">
Альтернативный телефон:&nbsp;+7-(961)-148-76-74;</span></b><br>
 <b><span style="font-family: &quot;Times New Roman&quot;, Times;">E-mail: </span></b><b><span style="font-family: &quot;Times New Roman&quot;, Times;"><a href="mailto:m.pestin@maximaster.ru">m.pestin@maximaster.ru</a></span></b><b><span style="font-family: &quot;Times New Roman&quot;, Times;">;</span></b><br>
 <b><span style="font-family: &quot;Times New Roman&quot;, Times;">Альтернативный: <a href="mailto:maxime1996rus@mail.ru">maxime1996rus@mail.ru</a></span></b><b><span style="font-family: &quot;Times New Roman&quot;, Times;"> <br>
 </span></b><br>
 <br>
 <span style="color: #f16c4d;"><?$APPLICATION->IncludeComponent(
	"bitrix:map.google.search",
	"",
	Array(
		"API_KEY" => "",
		"CONTROLS" => array("SMALL_ZOOM_CONTROL","TYPECONTROL","SCALELINE"),
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:3:{s:10:\"google_lat\";d:55.7383;s:10:\"google_lon\";d:37.5946;s:12:\"google_scale\";i:13;}",
		"MAP_HEIGHT" => "500",
		"MAP_ID" => "",
		"MAP_WIDTH" => "600",
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING","ENABLE_KEYBOARD")
	)
);?><br>
 </span><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>