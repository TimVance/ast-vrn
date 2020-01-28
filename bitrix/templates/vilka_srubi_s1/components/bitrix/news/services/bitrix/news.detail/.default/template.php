<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="service">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="detail_picture"><img border="0" src="<?=$arResult["IMG"]["src"]?>" width="<?=$arResult["IMG"]["width"]?>" height="<?=$arResult["IMG"]["height"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" /></div>
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
    <?/*<div class="text-center">
        <br>
        <a href="" class="btn zz_btn"><?=GetMessage("VR_SERV_ORDER")?></a>
    </div>*/?>
</div>
<?if(count($arResult['VR_PRIMERS']['IMG'])>0){?>
<div class="page-header2"><?=GetMessage("VR_PROJECT")?></div>
<div class="serv_gal row">
    <?foreach($arResult['VR_PRIMERS']['IMG'] as $key => $img){?>
        <div class="col-sm-6">
            <a href="<?=$img['src']?>" class="item fbt" rel="gallery_pr">
                <span class="mask"><i class="fa fa-search"></i></span>
                <img src="<?=$arResult['VR_PRIMERS']['IMG_SM'][$key]['src']?>">
            </a>
        </div>
    <?}?>

</div>

<?}?>