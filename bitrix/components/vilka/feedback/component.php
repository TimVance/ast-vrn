<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
    $arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
    $arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
    $arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

$FID = "FID_".$arParams["FORM_ID"];

/*
if(isset($_REQUEST["s1ajax"]) && $_REQUEST["s1ajax"] === "y") {
    $APPLICATION->RestartBuffer();
}*/

/* take iblock info*/
if(!CModule::IncludeModule("iblock"))
{
    ShowError(GetMessage("NO_IBLOCK"));
    return;
}


/* get form fields */
$arResult["FIELDS"] = Array();
$rsProp = CIBlockProperty::GetList(Array("SORT" => "ASC"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arParams["IBLOCK_ID"]));

while($arrProp = $rsProp->Fetch()) {

    //VH::pr($arrProp);
    $arField = Array(
        "CODE" => $arrProp["CODE"] . "_" . $FID,
        "REAL_CODE" => $arrProp["CODE"],
        "NAME" => $arrProp["NAME"],
        "TYPE" => $arrProp["PROPERTY_TYPE"],
        "HINT" => $arrProp["HINT"],
        "DEFAULT_VALUE" => $arrProp["DEFAULT_VALUE"],
        "USER_TYPE" => $arrProp["USER_TYPE"],
        "REQUIRED" => $arrProp["IS_REQUIRED"]
    );

    if (isset($arrProp["USER_TYPE_SETTINGS"]))
        $arField["USER_TYPE_SETTINGS"] = $arrProp["USER_TYPE_SETTINGS"];

    if ($arrProp["PROPERTY_TYPE"] == "L") {
        $arField["LIST_TYPE"] = $arrProp["LIST_TYPE"];
        $arField["MULTIPLE"] = $arrProp["MULTIPLE"];

        $db_enum_list = CIBlockProperty::GetPropertyEnum($arrProp["ID"]);
        while ($ar_enum_list = $db_enum_list->GetNext()) {
            $arField["ENUM"][$ar_enum_list["ID"]] = $ar_enum_list;
        }
    }

    if ($arrProp["PROPERTY_TYPE"] == "F") {
        $arField["MULTIPLE"] = $arrProp["MULTIPLE"];
        $arField["MULTIPLE_CNT"] = $arrProp["MULTIPLE_CNT"];
    }


    if ($arrProp["PROPERTY_TYPE"] == "E") {
        $arField["PROPERTY"] = $arrProp;

        if (isset($arrProp["LINK_IBLOCK_ID"])) {
            $resElement = CIBlockElement::GetList(
                Array("SORT" => "ASC"),
                Array(
                    "IBLOCK_ID" => $arrProp["LINK_IBLOCK_ID"],
                    "ACTIVE" => "Y"
                ),
                false,
                false,
                Array("IBLOCK_ID", "ID", "ACTIVE", "NAME")
            );

            while ($arElement = $resElement->Fetch()) {
                $arField["LINKED_ELEMENTS"][] = $arElement;
            }
        }
    }

    $arResult["FIELDS"][$arField['CODE']] = $arField;
}


if(!function_exists('make_file_array')){
    function make_file_array($arFiles) {
        $returnFiles = array();
        $params = Array(
            "max_len" => "200",
            "change_case" => "L",
            "replace_space" => "_",
            "replace_other" => ".",
            "delete_repeat_replace" => "true",
        );
        foreach($arFiles["name"] as $k => $val) {
            if (!is_array($arFiles["name"][$k])) {
                //$filename = $arFiles["name"][$k];
                //$arFileName = explode(".", $filename);

                $file_array = Array();
                $arFiles["name"][$k] = CUtil::translit($arFiles["name"][$k], "ru", $params);
                $file_array["name"] = $arFiles["name"][$k];
                $file_array["size"] = $arFiles["size"][$k];
                $file_array["tmp_name"] = $arFiles["tmp_name"][$k];
                $file_array["type"] = $arFiles["type"][$k];
                $file_array["description"] = "";
                $returnFiles = $file_array;

            } else {
                $n = 0;
                foreach ($arFiles["name"][$k] as $mk => $mval) {
                    //$filename = $arFiles["name"][$k][$mk];
                    //$arFileName = explode(".", $filename);

                    $file_array = Array();
                    $arFiles["name"][$k][$mk] = CUtil::translit($arFiles["name"][$k][$mk], "ru", $params);
                    $file_array["name"] = $arFiles["name"][$k][$mk];
                    $file_array["size"] = $arFiles["size"][$k][$mk];
                    $file_array["tmp_name"] = $arFiles["tmp_name"][$k][$mk];
                    $file_array["type"] = $arFiles["type"][$k][$mk];
                    $file_array["description"] = "";
                    $returnFiles["n" . $n++] = $file_array;
                }
            }
        }
        return $returnFiles;
    }
}



if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["FORM_ID_".$FID] && check_bitrix_sessid())
{
    $arResult["ERROR_MESSAGE"] = array();
    $PROPS = array();
    $arFields = $_POST["FORMFIELDS"];
    $arFiles = $_FILES["FORMFILES"];
    if(!is_array($arFields))
        $arFields = Array();

    $formFields = $arResult["FIELDS"];

    $message = '';

    //VH::pr($formFields);

    foreach ($arFields as $code => $value){
        if($formFields[$code]['REQUIRED'] == 'Y' && $value == ''){
            $arResult["FORM_ERRORS"][$code] = true;
        }
        elseif($arParams['USER_MAIL'] == $formFields[$code]['REAL_CODE']){
            if(!check_email($value)) {
                $arResult["FORM_ERRORS"][$code] = true;
            }
            else {
                $message .= '<b>'.$formFields[$code]['NAME'].'</b>: ';
                $message .= htmlspecialcharsEx($value).'<br><br>';
            }
            $arResult['INSERT_FIELDS'][$code] = htmlspecialcharsEx($value);
            $PROPS[$formFields[$code]['REAL_CODE']] = $arResult['INSERT_FIELDS'][$code];
        }
        else {
            $message .= '<b>'.$formFields[$code]['NAME'].'</b>: ';
            if($formFields[$code]['TYPE'] == 'L'){
                $message .= htmlspecialcharsEx($formFields[$code]['ENUM'][$value]['VALUE']).'<br><br>';
                $arResult['INSERT_FIELDS'][$code] = $value;
                $PROPS[$formFields[$code]['REAL_CODE']] = $value;
            }
            elseif($formFields[$code]['TYPE'] == 'S' && $formFields[$code]['USER_TYPE'] == 'HTML'){
                $message .= htmlspecialcharsEx($value).'<br><br>';
                $arResult['INSERT_FIELDS'][$code] = $value;
                $PROPS[$formFields[$code]['REAL_CODE']] = Array("VALUE" => array(
                    "TEXT" => $value,
                    "TYPE" => 'text'
                )
                );
            }
            else {
                $message .= htmlspecialcharsEx($value).'<br><br>';
                $arResult['INSERT_FIELDS'][$code] = $value;
                $PROPS[$formFields[$code]['REAL_CODE']] = htmlspecialcharsEx($value);
            }
        }

    }

    //VH::pr($message);

    //die();

    $files_code = array();
    foreach($formFields as $code => $field){
        if($field['TYPE'] == 'F' && $field['REQUIRED'] == 'Y' && $arFiles['tmp_name']['$code'] == ''){
            $arResult["FORM_ERRORS"][$code] = true;
        }
        elseif($field['TYPE'] == 'F'){
            $PROPS[$formFields[$code]['REAL_CODE']] = make_file_array($arFiles);
            $files_code[] = $formFields[$code]['REAL_CODE'];
        }
    }


    /* create post event */
    $lang_par = GetMessage("MF_LANG");
    $event_id = "VILKA_FEEDBACK_FORM";
    $arFilter = array(
        "TYPE_ID" => $event_id,
        "LID"     => $lang_par,
    );
    $rsET = CEventType::GetList($arFilter);
    if (!($rsET->Fetch())) {
        $marFields = array(
            "EVENT_NAME"  => $event_id,
            "NAME"        => GetMessage("MF_ET_NAME"),
            "LID"     => $lang_par,
            "DESCRIPTION" => "#EMAIL_FROM# - ".GetMessage("MF_ET_EMAIL_FROM").
                "\n#EMAIL_TO# - ".GetMessage("MF_ET_EMAIL_TO").
                "\n#TEXT# - ".GetMessage("MF_ET_TEXT").
                "\n#E_THEME# - ".GetMessage("MF_ET_THEME")//.
            //"\n#DIR_FILE# - ".GetMessage("MF_ET_DIR_FILE").
            //"\n#AR_FILE# - ".GetMessage("MF_ET_AR_FILE").
            //"\n#DEL_FILE# - ".GetMessage("MF_ET_DEL_FILE")
        );
        $obEventType = new CEventType;
        $obEventType->Add($marFields);
    }
    $arFilter = array(
        "TYPE_ID" => $event_id,
        "ACTIVE"  => "Y",
        "SITE_ID" => SITE_ID,
    );
    $rsMess = CEventMessage::GetList($by="id", $order="desc", $arFilter);
    if ($arMess = $rsMess->Fetch())
        $template_id = $arMess["ID"];
    else {
        $marFields = array(
            "ACTIVE"     => "Y",
            "EVENT_NAME" => $event_id,
            "LID"        => SITE_ID,
            "EMAIL_FROM" => '#EMAIL_FROM#',
            "EMAIL_TO"   => '#EMAIL_TO#',
            "SUBJECT"    => '#E_THEME#',
            "BODY_TYPE"  => 'html',
            "BCC"        => "#BCC#",
            "MESSAGE"    => '#TEXT#',
        );
        $obTemplate = new CEventMessage;
        $template_id = $obTemplate->Add($marFields);
    }
    /* !create post event */

    if($arParams["USE_CAPTCHA"] == "Y")
    {
        include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
        $captcha_code = $_POST["captcha_sid"];
        $captcha_word = $_POST["captcha_word"];
        $cpt = new CCaptcha();
        $captchaPass = COption::GetOptionString("main", "captcha_password", "");
        if (strlen($captcha_word) > 0 && strlen($captcha_code) > 0)
        {
            if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass)){
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
                $arResult["FORM_ERRORS"]['CAPTCHA'] = true;
            }
        }
        else{
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTHCA_EMPTY");
            $arResult["FORM_ERRORS"]['CAPTCHA'] = true;
        }

    }

    if(empty($arResult["FORM_ERRORS"]))
    {
        /* add element to iblock*/

        //VH::pr($PROPS);
        $arElementFields = Array(
            "IBLOCK_ID"				=> $arParams["IBLOCK_ID"],
            //"IBLOCK_SECTION_ID"		=> $_POST["type_question_".$ALX],
            "ACTIVE"				=> 'N',//$arParams["ACTIVE_ELEMENT"],
            "PREVIEW_TEXT"			=> $arResult["FEEDBACK_TEXT"],
            "PROPERTY_VALUES"		=> $PROPS,
        );
        $arElementFields["NAME"] = date('m.d.Y H:i:s');





        $el = new CIBlockElement;
        if(!$ID = $el->Add($arElementFields))
        {
            ShowError($el->LAST_ERROR);
        }

        $message .= '<br><br>--------------<br><a href="http://'.$_SERVER['HTTP_HOST'].'/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='.$arParams["IBLOCK_ID"].'&type=vilka_feedback&ID='.$ID.'&lang=ru&find_section_section=0&WF=Y">'.GetMessage('MF_ELENT_URL').'</a>';
        /*--------------------*/

        $arFie = Array(
            "AUTHOR" =>   htmlspecialcharsEx($arFields[$arParams['USER_NAME'].'_'.$FID]),
            "AUTHOR_EMAIL" => htmlspecialcharsEx($arFields[$arParams['USER_MAIL'].'_'.$FID]),
            "AUTHOR_PHONE" => htmlspecialcharsEx($arFields[$arParams['USER_PHONE'].'_'.$FID]),
            "EMAIL_TO" => $arParams["EMAIL_TO"],
            "TEXT" => htmlspecialcharsEx($_REQUEST["MESSAGE"]),
        );

        $rsSites = CSite::GetByID(SITE_ID);
        $arSite = $rsSites->Fetch();

        $arFieldss = array();
        $arFieldss["EMAIL_FROM"] = ($arFie['AUTHOR_EMAIL'] != "") ? $arFie['AUTHOR_EMAIL'] : COption::GetOptionString("main", "email_from");
        $arFieldss["EMAIL_TO"] = $arParams['EMAIL_TO'];
        $arFieldss["E_THEME"] = $arParams['MAIL_TITLE'] != ''?$arParams['MAIL_TITLE']:GetMessage('MF_ET_THEME_DEF').$arSite["NAME"];
        $arFieldss["TEXT"] = $message;


        $arFFILE = array ();

        if(count($files_code)>0){
            $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
            foreach($files_code as $code) {
                $arSelect[] = 'PROPERTY_'.$code;
            }
            $arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ID'=> $ID);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            if($ar_fields = $res->GetNext())
            {
                foreach($files_code as $code) {
                    $arFFILE[] = CFile::GetPath($ar_fields['PROPERTY_'.$code.'_VALUE']);
                }

            }
        }
        if(strlen($template_id) > 0)
            CEvent::Send($event_id, SITE_ID, $arFieldss, "N", $template_id, $arFFILE);
        else
            CEvent::Send($event_id, SITE_ID, $arFieldss, "N", "", $arFFILE);


        LocalRedirect($APPLICATION->GetCurPageParam("success=".$FID, Array("success")));
        $arResult["SUCCESS"] = 1;
    }
}
elseif($_REQUEST["success"] == $FID)
{
    $arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}


if($arParams["USE_CAPTCHA"] == "Y")
    $arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());


/*
if(isset($_REQUEST["s1ajax"]) && $_REQUEST["s1ajax"] === "y")
{
    $this->setFrameMode(false);
    //$APPLICATION->RestartBuffer();
    $this->IncludeComponentTemplate("ajax");
    //require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_after.php");
    die();
}
else
{*/
$this->IncludeComponentTemplate();
/*}*/
