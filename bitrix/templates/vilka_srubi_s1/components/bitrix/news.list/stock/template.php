<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
    <div class="service row">
        <?
        foreach($arResult["ITEMS"] as $cell=>$arElement){?>
            <?
            //VH::pr($arElement);
            $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-md-4 col-xs-6" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="item">
                    <? //<span class="height"></span>?>
                    <span class="img">
                        <span class="mask">
                            <span class="btn zz_btn"><?=GetMessage("VR_MORE")?></span>
                        </span>
                        <span class="date"><?
                            if($arElement["DATE_ACTIVE_FROM"] != '' && $arElement["DATE_ACTIVE_TO"] != '') echo GetMessage('VR_DATE_FROM');
                            if($arElement["DATE_ACTIVE_FROM"] != '')
                                echo FormatDate('j F', MakeTimeStamp($arElement["DATE_ACTIVE_FROM"]));
                            if($arElement["DATE_ACTIVE_TO"] != '') echo GetMessage('VR_DATE_TO');
                            if($arElement["DATE_ACTIVE_TO"] != '')
                                echo FormatDate('j F', MakeTimeStamp($arElement["DATE_ACTIVE_TO"]));
                            ?></span>
                        <img src="<?=$arElement['IMG']['src']?>" class="pic">
                    </span>
                    <span class="descr">
                        <span class="name"><?=$arElement['NAME']?></span>
                        <?=$arElement['PREVIEW_TEXT']?>
                    </span>
                </a>
            </div>
            <?
        }; // foreach($arResult["ITEMS"] as $arElement)?>

    </div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>