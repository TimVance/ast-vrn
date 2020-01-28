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
<div class="col-md-12 catalog_greed_small">
        <div class="row projects">
            <?
            foreach($arResult["ITEMS"] as $cell=>$arElement){?>
                <?
                //VH::pr($arElement);
                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="col-md-3 col-xs-6" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="item">
                        <? //<span class="height"></span>?>
                        <img src="<?=$arElement['IMG']['src']?>" class="pic">
                    <span class="descr">
                        <span class="name"><?=$arElement['NAME']?></span>
                        <span class="price"><?=$arElement["PROPERTIES"]['PRICE']['VALUE']?></span>
                    </span>
                    </a>
                </div>
                <?
            }; // foreach($arResult["ITEMS"] as $arElement)?>

        </div>
</div>