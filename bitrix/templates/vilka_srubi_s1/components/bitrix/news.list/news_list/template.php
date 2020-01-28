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
<div class="news_list">
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
        <span class="date"><span><? $date = explode(' ', $arItem["DISPLAY_ACTIVE_FROM"]);
            echo $date[0].' ';
            echo $date[1];
            ?></span></span>
        <img src="<?=$arItem["IMG"]['src']?>">
        <span class="descr">
            <span class="neme"><?=$arItem["NAME"]?></span>
            <?=$arItem["PREVIEW_TEXT"]?>
        </span>
    </a>
<?}
?>
</div>
