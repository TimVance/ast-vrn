<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="row">
    <div class="col-md-8">
<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" 			=> $arParams["USE_SHARE"],
		"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
	),
	$component
);?>
<?$APPLICATION->IncludeComponent(
	"vilka:feedback", 
	"bootstrap", 
	array(
		"COMPONENT_TEMPLATE" => "bootstrap",
		"IBLOCK_TYPE" => "vilka_feedback",
		"IBLOCK_ID" => "15",
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => GetMessage("FORM_SPASIBO"),
		"MAIL_TITLE" => GetMessage("FORM_RASCH")." ".$_SERVER["HTTP_HOST"],
		"EMAIL_TO" => COption::GetOptionString("main","email_from"),
		"FORM_ID" => "service_order",
		"USER_NAME" => "-",
		"USER_MAIL" => "-",
		"USER_PHONE" => "-",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
    </div>
    <div class="col-md-4">
        <?$APPLICATION->IncludeComponent("bitrix:menu", "serv_menu", Array(
            "COMPONENT_TEMPLATE" => ".default",
            "ROOT_MENU_TYPE" => "left",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => "",
            "MAX_LEVEL" => "1",
            "CHILD_MENU_TYPE" => "left",
            "USE_EXT" => "Y",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N",
        ),
            false
        );?>
    </div>
</div>