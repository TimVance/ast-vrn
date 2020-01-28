<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');
foreach($arResult["ITEMS"] as $k => $arItem){
    $files = $arItem["PREVIEW_PICTURE"];
    if(!array_key_exists('FILE_NAME',$files)){
        $file = $files[0];
    }else {
        $file = $files;
    }

    $arResult["ITEMS"][$k]['IMG'] = VH::water ($file, 273, 273); //BX_RESIZE_IMAGE_PROPORTIONAL
    $arResult["ITEMS"][$k]['IMG_B'] = VH::water ($file, 1400, 1400, BX_RESIZE_IMAGE_PROPORTIONAL);
}