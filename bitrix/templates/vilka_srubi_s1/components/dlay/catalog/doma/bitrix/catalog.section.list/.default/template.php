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
if(!empty($arResult["SECTIONS"])){
?>
        <div class="catalog_section_list">
    <?
    $TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
    $CURRENT_DEPTH = $TOP_DEPTH;
    //echo '<pre>'.print_r($arResult['SECTIONS'], true).'</pre>';
    foreach($arResult["SECTIONS"] as $arSection)
    {
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

        ?><a class="item" href="<?=$arSection["SECTION_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
            <img width="<?=$arSection["IMG"]['width']?>" height="<?=$arSection["IMG"]['height']?>" alt="<?=$arSection["NAME"]?>" src="<?=$arSection["IMG"]['src']?>">
            <span class="name"><?=$arSection["NAME"]?><?if($arParams["COUNT_ELEMENTS"]){?>&nbsp;(<?=$arSection["ELEMENT_CNT"]?>)<?}?>
            <?if($arSection['UF_TEXT']!= ''){?><span class="descr"><?=$arSection['UF_TEXT']?></span><?}?>
        </a>

    <?}?>
        </div>
<?}