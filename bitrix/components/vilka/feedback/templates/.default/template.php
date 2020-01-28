<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$this->setFrameMode(true);
?>
<div class="vilka_feedback">
	<?/*if(!empty($arResult["ERROR_MESSAGE"]))
	{?><div class="s1fb_msg"><?
		foreach($arResult["ERROR_MESSAGE"] as $v)
			ShowError($v);
		?></div><?
	}*/
	if(strlen($arResult["OK_MESSAGE"]) > 0)
	{?><div class="s1fb_msg oktext"><?
		?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
		?></div><?
	}
	?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" role="form" enctype="multipart/form-data">
<?=bitrix_sessid_post()?>
    <input type="hidden" name="FORM_ID_<?="FID_".$arParams["FORM_ID"]?>" value="<?="FID_".$arParams["FORM_ID"]?>">
    <?
    $posted = $arResult['INSERT_FIELDS'];
    $err = $arResult["FORM_ERRORS"];
    foreach($arResult['FIELDS'] as $arField){
        //VH::pr($arField);
        switch ($arField['TYPE']) {
            case "S":?>
                <div class="form-group<?if($err[$arField['CODE']]) {?> has-error<?}?>">
                    <label for="<?=$arField['CODE']?>" class="control-label">
                        <?=$arField['NAME']?><?if($arField['REQUIRED'] == "Y"){?>*<?}?>
                    </label>
                    <?
                    if($arField['USER_TYPE'] != 'HTML'){?>
                        <input type="text" id="<?=$arField['CODE']?>" class="form-control" name="FORMFIELDS[<?=$arField['CODE']?>]"<?if($arField['REQUIRED'] == "Y"){?> required<?}?> value="<?=$posted[$arField['CODE']]?>" placeholder="<?=$arField['NAME']?>">
                    <?}
                    else {?>
                        <textarea id="<?=$arField['CODE']?>" class="form-control" name="FORMFIELDS[<?=$arField['CODE']?>]"<?if($arField['REQUIRED'] == "Y"){?> required<?}?> placeholder="<?=$arField['NAME']?>"><?=$posted[$arField['CODE']]?></textarea>
                        <?
                    }?>
                </div>
                <?break;
            case "F":?>
                <div class="form-group<?if($err[$arField['CODE']]) {?> has-error<?}?>">
                    <label for="<?=$arField['CODE']?>" class="control-label">
                        <?=$arField['NAME']?><?if($arField['REQUIRED'] == "Y"){?>*<?}?>
                    </label>
                    <input type="file" id="<?=$arField['CODE']?>" name="FORMFILES[<?=$arField['CODE']?>]"<?if($arField['REQUIRED'] == "Y"){?> required<?}?> value="<?=$arResult["AUTHOR_NAME"]?>">
                </div>
                <?break;
            case "L":

                ?>
                <div class="form-group<?if($err[$arField['CODE']]) {?> has-error<?}?>">
                    <label for="<?=$arField['CODE']?>" class="control-label">
                        <?=$arField['NAME']?><?if($arField['REQUIRED'] == "Y"){?>*<?}?>
                    </label>
                    <select id="<?=$arField['CODE']?>" name="FORMFIELDS[<?=$arField['CODE']?>]"<?if($arField['REQUIRED'] == "Y"){?> required<?}?> class="form-control">
                    <?foreach($arField['ENUM'] as $option){?>
                        <option value="<?=$option['ID']?>"<?if(isset($posted[$arField['CODE']]) && $posted[$arField['CODE']]==$option['ID']){?> selected<?} else { if($option['DEF'] != "N"){?> selected<?}}?>><?=$option['VALUE']?></option>
                    <?}?>
                    </select>
                </div>
                <?break;
        }

    }
    ?>
    <?if($arParams["USE_CAPTCHA"] == "Y"){?>
        <div class="captcha form-group<?if($err['CAPTCHA']) {?> has-error<?}?>">
            <label for="captcha" class="control-label"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></label>
            <div class="captcha_block">
                <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA" class="captcha_img">
            </div>
            <div class="captcha_block">
                <input type="text" name="captcha_word" class="form-control" id="captcha" size="7" maxlength="50" value="">
            </div>
        </div>
    <?}?>
    <?/*<input type="hidden" name="s1ajax" value="y">*/?>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<div style="text-align: center"><input type="submit" name="submit" class="btn zz_btn" value="<?=GetMessage("MFT_SUBMIT")?>"></div>
</form>
</div>