<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');
foreach($arResult["ITEMS"] as $k => $arItem){
    $files = $arItem["PREVIEW_PICTURE"];
    if(!array_key_exists('FILE_NAME',$files)){
        $file = $files[0];
    }else {
        $file = $files;
    }

    $arResult["ITEMS"][$k]['IMG'] = VH::water($file, 377, 276, BX_RESIZE_IMAGE_EXACT, 100); //BX_RESIZE_IMAGE_PROPORTIONAL
}