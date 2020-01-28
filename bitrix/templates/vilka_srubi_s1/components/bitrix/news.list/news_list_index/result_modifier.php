<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');
foreach($arResult["ITEMS"] as $k => $arItem){
    $files = $arItem["DETAIL_PICTURE"];
    if(!array_key_exists('FILE_NAME',$files)){
        $file = $files[0];
    }else {
        $file = $files;
    }

    $arResult["ITEMS"][$k]['IMG'] = VH::water ($file, 141, 141); //BX_RESIZE_IMAGE_PROPORTIONAL
}