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






<div class="col-md-12 catalog_greed<?if($arParams['VR_ON_INDEX'] != 'N' ) echo ' cat_gr_bg'?>">
    <? if($arParams['VR_ON_INDEX'] != 'N' ) {?><div class="container">
        <div class="page-header">
            <?=GetMessage("VR_OUR_PROJ")?>
        </div>
    <?}?>
        <? if(!empty($arResult['UF_DESC'])): ?>
            <div class="descr tags-article">
                <?=htmlspecialchars_decode($arResult['UF_DESC'])?>
            </div>
        <? endif; ?>
        <div class="row projects">
            <?
            foreach($arResult["ITEMS"] as $cell=>$arElement){?>
                <?
                //VH::pr($arElement);
                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
                
                $props = $arElement["PROPERTIES"];
                ?>
                <div class="col-md-4 col-xs-6<?=($cell>1 && $APPLICATION->sDirPath == SITE_DIR)?' hidden-xs hidden-sm':''?>" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="item">
                        <?
                            echo '<div class="stikers-wrap">';
                            if($arElement["PROPERTIES"]['SALE']['VALUE'] == "Y") {
                                echo '<span class="sale sticker">'.$arElement["PROPERTIES"]["SALE"]["NAME"].'</span>';
                            }
                            if($arElement["PROPERTIES"]['NEW']['VALUE'] == "Y") {
                                echo '<span class="new sticker">'.$arElement["PROPERTIES"]["NEW"]["NAME"].'</span>';
                            }
                            echo '</div>';
                        ?>
                        <img src="<?=$arElement['IMG']['src']?>" class="pic">
                    <span class="descr">
                        <span class="text">
                            <span class="name"><?=$arElement['NAME']?></span>
                            <span class="variants">
                                <? if($arParams['SHOW_DESCR_TEXT'] == 'Y'){?>
                                <?=htmlspecialchars_decode($arElement["PROPERTIES"]['VR_LIST_DESCR']['VALUE']['TEXT']) //$arElement["PREVIEW_TEXT"]?>
                                <?}?>
                                <?$show_props = array('VR_PROP1', 'VR_PROP3', 'VR_PROP6', 'VR_PROP5')?>
                                <span class="row specs">
                                    <?foreach ($show_props as $prop_code){?>
                                    <span class="col-sm-6 elem">
                                        <span class="col_1">
                                            <i class="ico" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/images/section_list_ico_<?=$prop_code?>.png')"></i>
                                        </span><span class="col_2"><?=$props[$prop_code]['NAME']?>
                                        <b><?=$props[$prop_code]['VALUE']?></b>
                                        </span>
                                    </span>
                                        
                                    <?}?>
                                </span>
                            </span>
                        </span>
                        <span class="price"><?=$arElement["PROPERTIES"]['PRICE']['VALUE']?></span>
                        <span class="btn zz_btn"><?=GetMessage("VR_CATALOG_MORE")?></span>
                    </span>
                    </a>
                </div>
                <?
            }; // foreach($arResult["ITEMS"] as $arElement)?>

        </div>

    <? if($arParams['VR_ON_INDEX'] != 'N' ) {?>
    <?=$arParams['VR_ON_INDEX']?><div class="show_all">
            <a href="<?=SITE_DIR?>katalog/" class="btn zz_btn"><?=GetMessage("VR_SHOW_MORE")?></a>
        </div>
    </div><?}?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <div class="col-md-12">
    <?=$arResult["NAV_STRING"]?>
    </div>
<?endif;?>
<? if($arParams['VR_ON_INDEX'] == 'N' ){?>
<div class="descr">
    <?=htmlspecialchars_decode($arResult['DESCRIPTION'])?>
</div>
<?}