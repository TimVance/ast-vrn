<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("vilka.srubi")) die('no VILKA module');

$arProps = $arResult['PROPERTIES'];

$img_width = 1600;
$img_hight = 1400;

$img_width_m = 377;
$img_hight_m = 282;


$files_id = $arProps['VR_PRIMERS']['VALUE'];
if(!empty($files_id)){
    foreach ($files_id as $key => $fileId){
        $arResult['VR_PRIMERS']['IMG'][$key] =  VH::water($fileId, $img_width, $img_hight, BX_RESIZE_IMAGE_PROPORTIONAL);
        $arResult['VR_PRIMERS']['IMG_SM'][$key] =  VH::water($fileId, $img_width_m, $img_hight_m);
    }
}