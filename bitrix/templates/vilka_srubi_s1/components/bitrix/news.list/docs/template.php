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
<div class="docs_list">
<?
foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $file = $arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];
	?>
    <a href="<?=$file['SRC']?>" target="_blank" class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?
        $ext = pathinfo($file['FILE_NAME'], PATHINFO_EXTENSION);
        ?><?
        if(strstr($ext, 'doc')) {?>
            <span class="ext doc"><?=$ext?></span>
        <?}
        elseif(strstr($ext, 'xls')){?>
            <span class="ext xls"><?=$ext?></span>
        <?}
        elseif(strstr($ext, 'pdf')){?>
            <span class="ext pdf"><?=$ext?></span>
        <?}
        ?>
        <span class="descr">
            <span class="neme"><?=$arItem["NAME"]?></span>
            <?=$arItem["PREVIEW_TEXT"]?>
        </span>
    </a>
<?}
?>
</div>
