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

?>
<div class="page-header"><?=$arResult['NAME']?></div>
<div class="news">
    <a href="<?=SITE_DIR?>o-kompanii/novosti/" class="btn zz_btn all_news"><?=GetMessage("VR_SHOW_NEWS")?></a>
<?
foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $col_md = 3;
    if($arParams["DNT_SHOW_HEADER"] == 'Y'){
        $col_md = 4;
    }
	?>
    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <img src="<?=$arItem["IMG"]['src']?>">
        <span class="descr">
            <span class="neme"><?=$arItem["NAME"]?></span>
            <?=$arItem["PREVIEW_TEXT"]?>
            <span class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
        </span>
    </a>
<?}
?>
</div>
