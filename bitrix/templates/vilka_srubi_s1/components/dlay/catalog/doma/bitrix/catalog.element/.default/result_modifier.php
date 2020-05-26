<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');
//VH::water($file, 1100, 1100, BX_RESIZE_IMAGE_PROPORTIONAL);
$files = $arResult["DETAIL_PICTURE"];
$arProps = $arResult['PROPERTIES'];
//VH::pr($arResult['PROPERTIES']['VR_PHOTOS']['VALUE']);
$schet = 0; // count items

$img_width = 841;
$img_hight = 631;

$img_width_m = 227;
$img_hight_m = 170;

$arResult['SLIDE_MENU'] = array();
/* VR_PHOTOS */


$files_id = $arProps['VR_PHOTOS']['VALUE'];
if(!empty($files_id)){
    $arResult['SLIDE_MENU'][$schet] = $arProps['VR_PHOTOS']['NAME'];
    foreach ($files_id as $key => $fileId){
        $schet ++;
        $arResult['VR_PHOTOS']['IMG'][$schet] =  VH::water($fileId, $img_width, $img_hight, BX_RESIZE_IMAGE_PROPORTIONAL);
        $arResult['VR_PHOTOS']['IMG_SM'][$schet] =  VH::water($fileId, $img_width_m, $img_hight_m);
    }
}
/* VR_PLANIROV */
$files_id = $arProps['VR_PLANIROV']['VALUE'];
if(!empty($files_id)){
    $arResult['SLIDE_MENU'][$schet] = $arProps['VR_PLANIROV']['NAME'];
    foreach ($files_id as $key => $fileId){
        $schet ++;
        $arResult['VR_PHOTOS']['IMG'][$schet] =  VH::water($fileId, $img_width, $img_hight, BX_RESIZE_IMAGE_PROPORTIONAL);
        $arResult['VR_PHOTOS']['IMG_SM'][$schet] =  VH::water($fileId, $img_width_m, $img_hight_m);
    }
}
/* VR_FASAD */
$files_id = $arProps['VR_FASAD']['VALUE'];
if(!empty($files_id)){
    $arResult['SLIDE_MENU'][$schet] = $arProps['VR_FASAD']['NAME'];
    foreach ($files_id as $key => $fileId){
        $schet ++;
        $arResult['VR_PHOTOS']['IMG'][$schet] =  VH::water($fileId, $img_width, $img_hight, BX_RESIZE_IMAGE_PROPORTIONAL);
        $arResult['VR_PHOTOS']['IMG_SM'][$schet] =  VH::water($fileId, $img_width_m, $img_hight_m);
    }
}
/* VR_GOTOVO */
$files_id = $arProps['VR_GOTOVO']['VALUE'];
if(!empty($files_id)){
    $arResult['SLIDE_MENU'][$schet] = $arProps['VR_GOTOVO']['NAME'];
    foreach ($files_id as $key => $fileId){
        $schet ++;
        $arResult['VR_PHOTOS']['IMG'][$schet] =  VH::water($fileId, $img_width, $img_hight, BX_RESIZE_IMAGE_PROPORTIONAL);
        $arResult['VR_PHOTOS']['IMG_SM'][$schet] =  VH::water($fileId, $img_width_m, $img_hight_m);
    }
}