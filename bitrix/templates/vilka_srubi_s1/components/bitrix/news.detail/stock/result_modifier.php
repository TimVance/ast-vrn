<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');

$arProps = $arResult['PROPERTIES'];

$img_width = 1600;
$img_hight = 1400;

$img_width_m = 257;
$img_hight_m = 192;

$arResult['IMG'] =  VH::water($arResult['PREVIEW_PICTURE'], 400, 400, BX_RESIZE_IMAGE_PROPORTIONAL);


$files_id = $arProps['VR_PICS']['VALUE'];
if(!empty($files_id)){
    foreach ($files_id as $key => $fileId){
        $arResult['VR_PICS']['IMG'][$key] =  VH::water($fileId, $img_width, $img_hight, BX_RESIZE_IMAGE_PROPORTIONAL);
        $arResult['VR_PICS']['IMG_SM'][$key] =  VH::water($fileId, $img_width_m, $img_hight_m);
    }
}