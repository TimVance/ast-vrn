<?
use Bitrix\Main\Type\Collection;
use Bitrix\Currency\CurrencyTable;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');
foreach($arResult["ITEMS"] as $k => $arItem){
    $files = $arItem["PREVIEW_PICTURE"];
    if(!array_key_exists('FILE_NAME',$files)){
        $file = $files[0];
    }else {
        $file = $files;
    }

    $arResult["ITEMS"][$k]['IMG'] = VH::water($file, 300, 249); //BX_RESIZE_IMAGE_PROPORTIONAL
}