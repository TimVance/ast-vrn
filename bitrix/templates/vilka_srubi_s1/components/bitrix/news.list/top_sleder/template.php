<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//$tsWidth = COption::GetOptionString("s1.corpsite", "top_slide_width", "0");
$templateData = array(
    'TEMPLATE_FOLDER' => $this->GetFolder()
);

?>
<div class="container-fluid">
    <div class="row">
        <div class="top_slider" <?//if($tsWidth == 1){echo 'style="max-width:1200px;"';}?>>
            <?foreach($arResult["ITEMS"] as $arItem)
            {?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $href = $arItem['DISPLAY_PROPERTIES']['VR_URL']['VALUE'];
            $price = $arItem['DISPLAY_PROPERTIES']['VR_PRICE']['VALUE'];
            $btn_text = $arItem['DISPLAY_PROPERTIES']['VR_BTN_TEXT']['VALUE'];
            $align = $arItem['PROPERTIES']['VR_POSITION']['VALUE_XML_ID'];
            $akcia = $arItem['PROPERTIES']['VR_SALE']['VALUE_XML_ID'];
            $notext = $arItem['PROPERTIES']['VR_ONLY_PIC']['VALUE_XML_ID'];

            //VH::pr($arItem['DISPLAY_PROPERTIES']);
            $bg_img = $arItem["PREVIEW_PICTURE"]["SRC"];
            $no_pic = true;
            if($arItem['DISPLAY_PROPERTIES']['VR_FON']['FILE_VALUE']['SRC'] != ''){
                $no_pic = false;
                $bg_img = $arItem['DISPLAY_PROPERTIES']['VR_FON']['FILE_VALUE']['SRC'];
            }
            ?>
            <<?=($href!='')?'a href="'.$href.'"':'div'?> class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background-image: url('<?=$bg_img?>');">
            <?if($notext != "Y"){?>
            <span class="container<?=($align=='s_right')?' show_right':''?>">
                <span class="row">
                    <?if(!$no_pic){
                        ?>
                        <span class="slide_img" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');"></span>
                        <?
                    }?>
                    <?if($akcia == 'Y'){
                        ?><span class="slide_akc"><?=rtrim($arItem['PROPERTIES']['VR_SALE']['NAME'],'?')?></span><?
                    }?>
                    <span class="descr_block">
                        <span class="slide_zag" style="<?=($color!='')?'color:'.$color.';':''?><?=($size!='')?'font-size:'.$size.';':''?>"><?=$arItem['NAME']?></span>
                        <?if($arItem['PREVIEW_TEXT'] != ''){?>
                            <span class="slide_descr"><?=$arItem['PREVIEW_TEXT']?></span>
                        <?}?>
                        <?if($price != '' )echo '<div class="slide_price">'.$price.'</div>'?>
                        <?if($btn_text != '' )echo '<span class="clearfix"></span><span class="btn zz_btn">'.$btn_text.'</span>'?>
                    </span>
                </span>
            </span>
            <?}?>
        </<?=($href!='')?'a':'div'?>>
            <?
            }?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.top_slider').slick({});
</script>