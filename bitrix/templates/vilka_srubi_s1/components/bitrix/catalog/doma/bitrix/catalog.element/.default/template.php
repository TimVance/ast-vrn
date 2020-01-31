<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
$strTitle = (
isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
    ? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
    : $arResult['NAME']
);
$strAlt   = (
isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
    ? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
    : $arResult['NAME']
);

?>


<div class="catalog_element" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
    <? //if(is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])){}?>
    <?

    //VH::pr($arResult['SLIDE_MENU']);
    /******* GALLERY **********/
    if (!empty($arResult['VR_PHOTOS']['IMG_SM'])) { // Галерея фотографий
        ?>
        <div class="slide_menu">
            <?
            foreach ($arResult['SLIDE_MENU'] as $id => $name) {
                ?>
                <a href=""
                   data-id="<?= $id ?>"<? if ($id == 0) echo ' class="selected"' ?>><span><?= $name ?></span></a>
            <?
            }
            ?>
        </div>

        <div class="slider">
            <div class="loader"><img src="<?= SITE_TEMPLATE_PATH ?>/images/loader.gif"></div>
            <div class="row">
                <div class="col-sm-9 main_slider">
                    <?
                    foreach ($arResult['VR_PHOTOS']['IMG'] as $key => $img) {
                        ?>
                        <img src="<?= $img['src'] ?>" alt="<?= $strAlt ?>"><?
                    }
                    ?>
                </div>
                <div class="col-sm-3 vert_slider"><?
                    foreach ($arResult['VR_PHOTOS']['IMG_SM'] as $key => $img) {
                        ?>
                        <img src="<?= $img['src'] ?>" class="item" alt="<?= $strAlt ?>"><?
                    }
                    ?></div>
            </div>
        </div>
        <?
    }
    if (!empty($arResult["DISPLAY_PROPERTIES"])) {
        ?>
        <div class="params">
        <?
        foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty) {
            if (($arProperty["VALUE"] != '' || is_array($arProperty["VALUE"]))) {
                ?>
                <div class="item"><?= $arProperty["NAME"] ?><b><?
                        if (is_array($arProperty["VALUE"])) {
                            echo implode("&nbsp;/&nbsp;", $arProperty["VALUE"]);
                        } else {
                            echo $arProperty["VALUE"]; ?>
                        <?
                        } ?></b>

                </div>
            <? }
        }
        ?></div><?
    }
    /* $arVariants = $arResult["PROPERTIES"]['VR_VARIANT'];
    if (!empty($arVariants)) {
        ?>
        <div class="variants">
        <div class="page-header3"><?= $arVariants['NAME'] ?></div>
        <div class="row">
            <?
            foreach ($arVariants['VALUE'] as $key => $variant) {
                ?>
                <div class="col-sm-4">
                    <div class="item">
                        <div class="name"><?= $variant ?></div>
                        <div class="price"><?= $arVariants['DESCRIPTION'][$key] ?></div>
                        <a href="" class="order btn zz_btn"><?= GetMessage("VR_ORDER") ?></a>
                    </div>
                </div>
                <?
            }
            ?></div>
        </div><?
    }
*/
    /* Вывод свойств*
    foreach($arResult["PROPERTIES"] as $pid=>$arProperty){
        if(($arProperty["VALUE"]!='' || is_array($arProperty["VALUE"])) && !in_array($pid,$arParams['DNTSHOW_PROPERTY'])){?>
            <?=$arProperty["NAME"]?><b><?
            if(is_array($arProperty["VALUE"])){
                echo implode("&nbsp;/&nbsp;", $arProperty["VALUE"]);
            }elseif($pid=="MANUAL"){
                ?><a href="<?=$arProperty["VALUE"]?>"><?=GetMessage("CATALOG_DOWNLOAD")?></a><?
            }else{
                echo $arProperty["VALUE"];?>
            <?}?></b>

            <br>
        <?  }
    }*/

    ?>


    <!-- Калькулятор -->
    <? if(isset($arResult["PROPERTIES"]['VR_TYPE']["VALUE"][0])) $arType = $arResult["PROPERTIES"]['VR_TYPE']; ?>
    <? if(isset($arResult["PROPERTIES"]['VR_COMPLECT']["VALUE"][0])) $arComplect = $arResult["PROPERTIES"]['VR_COMPLECT']; ?>
    <? $sum = $arResult["PROPERTIES"]['PRICE_FILTER']; ?>
    <? if(isset($arType)): ?>
        <div class="calculator">
            <div class="page-header3"><?= GetMessage("VR_CALC_CAPTION") ?></div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="caption"><?= $arType["NAME"] ?>:</div>
                            <div class="type">
                                <? foreach ($arType["VALUE"] as $k => $type): ?>
                                    <label>
                                        <input data="<?= $arType["DESCRIPTION"][$k] ?>" <?= ($k == 0 ? 'checked' : '') ?>
                                               type="radio" name="<?= $arType["CODE"] ?>">
                                        <span></span>
                                        <div class="name"><?= $type ?></div>
                                        <div class="price">
                                            (+ <?= number_format($arType["DESCRIPTION"][$k], 0, '', ' ') ?>
                                            <?= GetMessage("VR_VALUTE") ?>)
                                        </div>
                                    </label>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <? if(isset($arComplect)): ?>
                            <div class="col-sm-12">
                                <div class="caption"><?= $arComplect["NAME"] ?>:</div>
                                <div class="complect">
                                    <? foreach ($arComplect["VALUE"] as $k => $item): ?>
                                        <label>
                                            <input data="<?= $arComplect["DESCRIPTION"][$k] ?>" type="checkbox"
                                                   name="<?= $arComplect["CODE"] ?>">
                                            <span></span>
                                            <div class="name"><?= $item ?></div>
                                            <div class="price">
                                                (+ <?= number_format($arComplect["DESCRIPTION"][$k], 0, '', ' ') ?>
                                                <?= GetMessage("VR_VALUTE") ?>)
                                            </div>
                                        </label>
                                    <? endforeach; ?>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="price-inner">
                        <div class="price-caption"><?= GetMessage("VR_PRICE") ?>:</div>
                        <div data="<?=$sum["VALUE"]?>" class="sum"><span><?=number_format($sum["VALUE"], 0, '', ' ')?></span> <?= GetMessage("VR_VALUTE") ?></div>
                        <button class="zz_btn order-button"><?= GetMessage("VR_ORDER") ?></button><br>
                        <button class="zz_btn ipoteka-button"><?= GetMessage("VR_ORDER_IPOTEKA") ?></button>
                    </div>
                </div>
            </div>
        </div>
    <? endif; ?>
    <!-- Калькулятор -->


    <!-- Nav tabs -->
    <div class="tabs_block">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab"><span><?= GetMessage("VR_TAB_1") ?></span></a></li>
            <!-- <li><a href="#tab2" data-toggle="tab"><span><?= GetMessage("VR_TAB_2") ?></span></a></li> -->
            <? /*<li><a href="#messages" data-toggle="tab"><?=GetMessage("VR_TAB_3")?></a></li>*/ ?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1"><?= $arResult["DETAIL_TEXT"] ?></div>
            <div class="tab-pane fade" id="tab2"><?= $arResult["PREVIEW_TEXT"] ?></div>
            <? /*<div class="tab-pane fade" id="messages">вапрвапр</div>*/ ?>
        </div>
    </div>
</div>