<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->RestartBuffer();
//unset($arResult["COMBO"]);

//echo print_r($arResult, true);
echo str_replace("'",'"',CUtil::PHPToJSObject($arResult, true));
//echo str_replace('","','";"',str_replace("'",'"',CUtil::PHPToJSObject($arResult, true)));