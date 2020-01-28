<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule("iblock"))
    return;

$rsIBlockType = CIBlockType::GetList(array("sort"=>"asc"), array("ACTIVE"=>"Y"));
while($arr=$rsIBlockType->Fetch())
{
    if($ar=CIBlockType::GetByIDLang($arr["ID"], LANGUAGE_ID))
        $arIBlockType[$arr["ID"]] = "[".$arr["ID"]."] ".$ar["NAME"];
}

$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
    $arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];

$rsIBlock = CIBlock::GetList(Array(), Array("CODE" => "vilka_feedback"));
if($arr=$rsIBlock->Fetch())
    $defaultIBid = $arr["ID"];

if(empty($arCurrentValues["IBLOCK_ID"]) && !empty($defaultIBid))
    $arCurrentValues["IBLOCK_ID"] = $defaultIBid;

$arProperty = array(
    '-' => '---'
);
$rsProp = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>(isset($arCurrentValues["IBLOCK_ID"]) ? $arCurrentValues["IBLOCK_ID"] : $arCurrentValues["ID"])));
while ($arr=$rsProp->Fetch())
{
    $arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
}



$site = ($_REQUEST["site"] <> ''? $_REQUEST["site"] : ($_REQUEST["src_site"] <> ''? $_REQUEST["src_site"] : false));
$arFilter = Array("TYPE_ID" => "FEEDBACK_FORM", "ACTIVE" => "Y");
if($site !== false)
	$arFilter["LID"] = $site;

$arEvent = Array();
$dbType = CEventMessage::GetList($by="ID", $order="DESC", $arFilter);
while($arType = $dbType->GetNext())
	$arEvent[$arType["ID"]] = "[".$arType["ID"]."] ".$arType["SUBJECT"];

$arComponentParameters = array(
	"PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("VF_IBLOCK_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlockType,
            "REFRESH" => "Y",
            "DEFAULT" => "vilka_feedback",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("VF_IBLOCK_ID"),
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "Y",
            "VALUES" => $arIBlock,
            "REFRESH" => "Y",
            "DEFAULT" => $defaultIBid,
        ),
		"USE_CAPTCHA" => Array(
			"NAME" => GetMessage("MFP_CAPTCHA"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y", 
			"PARENT" => "BASE",
		),
		"OK_TEXT" => Array(
			"NAME" => GetMessage("MFP_OK_MESSAGE"), 
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("MFP_OK_TEXT"), 
			"PARENT" => "BASE",
		),
		"MAIL_TITLE" => Array(
			"NAME" => GetMessage("MFP_MAIL_TITLE"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("MFP_MAIL_TITLE").' '.$_SERVER['HTTP_HOST'],
			"PARENT" => "BASE",
		),
		"EMAIL_TO" => Array(
			"NAME" => GetMessage("MFP_EMAIL_TO"),
			"TYPE" => "STRING",
			"DEFAULT" => htmlspecialcharsbx(COption::GetOptionString("main", "email_from")),
			"PARENT" => "BASE",
		),
		"FORM_ID" => Array(
			"NAME" => GetMessage("MFP_FORM_ID"),
			"TYPE" => "STRING",
			"DEFAULT" => uniqid(),
			"PARENT" => "BASE",
		),
        "USER_NAME" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("MFP_USER_NAME"),
            "TYPE" => "LIST",
            "MULTIPLE" => "N",
            "VALUES" => $arProperty,
            "ADDITIONAL_VALUES" => "N",
            "DEFAULT" => "FORM_NAME",
        ),
        "USER_MAIL" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("MFP_USER_MAIL"),
            "TYPE" => "LIST",
            "MULTIPLE" => "N",
            "VALUES" => $arProperty,
            "ADDITIONAL_VALUES" => "N",
            "DEFAULT" => "FORM_MAIL",
        ),
        "USER_PHONE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("MFP_USER_PHONE"),
            "TYPE" => "LIST",
            "MULTIPLE" => "N",
            "VALUES" => $arProperty,
            "ADDITIONAL_VALUES" => "N",
            "DEFAULT" => "FORM_PHONE",
        ),
		"AJAX_MODE" => array(),
	)
);


?>