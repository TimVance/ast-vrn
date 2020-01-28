<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news_detail">
    <span class="date"><? $date = explode(' ', $arResult["DISPLAY_ACTIVE_FROM"]);
        echo '<b>'.$date[0].'</b>';
        echo $date[1];
        ?></span>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img border="0" class="img_lef" src="<?=$arResult["IMG"]["src"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>

	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>

    <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
    <?if(count($arResult['VR_PICS']['IMG'])>0){?>
        <br>
        <div class="clearfix"></div>
        <br><br>
        <div class="news_detail_gal row">
            <?foreach($arResult['VR_PICS']['IMG'] as $key => $img){?>
                <div class="col-sm-4">
                    <a href="<?=$img['src']?>" class="item fbt" rel="gallery_pr">
                        <span class="mask"><i class="fa fa-search"></i></span>
                        <img src="<?=$arResult['VR_PICS']['IMG_SM'][$key]['src']?>">
                    </a>
                </div>
            <?}?>

        </div>
    <?}?>
</div>