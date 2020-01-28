<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
$dnt_show = explode(',', $arParams['VR_DNT_SHOW']);
if (!empty($arResult)){
    ?>
    <div class="foot_menu">
    <?
    $previousLevel = 0;
    $i = 0;
foreach($arResult as $arItem){
    if($arItem["DEPTH_LEVEL"] == 1){
        $i ++;
    }
if(!in_array($i, $dnt_show)) {
    ?>
    <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel){?>
        <?=str_repeat("</div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
    <?}

    ?>
    <?if ($arItem["IS_PARENT"]){?>
    <div class="col-sm-3">
    <?/*<a href="<?=$arItem["LINK"]?>"<? if($arItem["CHILD_SELECTED"] !== true && $arItem["SELECTED"]!=1)echo' rel="close"'; else echo' rel="open" class="selected"';?>></a>*/?>
    <div class="zag"><?=$arItem["TEXT"]?></div>
    <div><? $k = 0;?>
    <? }
    else{?>
        <?if ($arItem["PERMISSION"] > "D"){?>
            <a href="<?=$arItem["LINK"]?>"<? if($k==0 || $arItem["SELECTED"]==1){ ?> class="<? if($k==0) {echo'f'; $k=1;}?><? if($arItem["SELECTED"] == 1)echo ' selected';?>"<? }?>><?=$arItem["TEXT"]?></a>
        <?}?>
    <?}?>
    <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
    <?
}
}?>
    <?if ($previousLevel > 1){//close last item tags?><?=str_repeat("</div></div>", ($previousLevel-1) );?><?}?>
    </div>
<?}