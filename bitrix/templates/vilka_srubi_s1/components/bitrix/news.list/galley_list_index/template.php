<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//VH::pr($arResult);
?>

<?if($arParams["DNT_SHOW_HEADER"] != 'Y'){?>
<div class="gallery_list">
    <div class="container">
        <div class="row">
            <div class="page-header"><?=$arResult["NAME"]?></div>
<?
}
else {?>
    <div class="row gallery_list no_bg">
<?}
foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $col_md = 3;
    if($arParams["DNT_SHOW_HEADER"] == 'Y'){
        $col_md = 3;
    }
	?>
	<div class="item col-sm-<?=$col_md?> col-xs-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem["IMG_B"]['src']?>" class="fbt" title="<?=$arItem["NAME"]?>" rel="<?=$arResult["CODE"]?>">
            <span class="mask"><i class="fa fa-search"></i></span>
            <img src="<?=$arItem["IMG"]['src']?>">
        </a>
	</div>
<?}
if($arParams["DNT_SHOW_HEADER"] != 'Y'){?>
            <div class="clearfix"></div>
            <div class="show_all">
                <a href="<?=SITE_DIR?>galereya/" class="btn zz_btn_gallery"><?=GetMessage('VR_SHAW_ALL')?></a>
            </div>

        </div>
    </div>
</div>
<?}
else {?></div>
<?}?>