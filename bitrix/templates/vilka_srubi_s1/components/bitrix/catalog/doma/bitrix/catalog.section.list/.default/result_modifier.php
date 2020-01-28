<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');
foreach($arResult["SECTIONS"] as $k => $arItem){
    $files = $arItem["PICTURE"];
    if(!array_key_exists('FILE_NAME',$files)){
        $file = $files[0];
    }else {
        $file = $files;
    }

    $arResult["SECTIONS"][$k]['IMG'] = VH::water ($file, 220, 220, BX_RESIZE_IMAGE_PROPORTIONAL);
}