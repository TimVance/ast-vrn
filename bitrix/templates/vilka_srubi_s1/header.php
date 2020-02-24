<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
$curPage = $APPLICATION->GetCurPage(true);
$sDir = $APPLICATION->sDirPath;
//$curColor = COption::GetOptionString("s1.corpsite", "color", "blue");
//$tsUzki = COption::GetOptionString("s1.corpsite", "uzki_site", "0");
if(!CModule::IncludeModule("vilka.srubi")) {die ('NO VILKAS MODLE');}
if(VH::val("less_on", "0") == 1) {
	VH::LESS2CSS(SITE_TEMPLATE_PATH);
}
?><!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <meta charset="<?=LANG_CHARSET?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
    <?
    //$APPLICATION->SetAdditionalCSS('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css');
    $APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext');
    $APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Roboto+Condensed:700,400&subset=latin,cyrillic');

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/fonts/fonts.css');
    $APPLICATION->SetAdditionalCSS('/bitrix/css/main/font-awesome.min.css');
    $APPLICATION->SetAdditionalCSS('/bitrix/css/main/calculator.css');

    $APPLICATION->SetAdditionalCSS('/bitrix/css/main/bootstrap.min.css');
    //$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/fonts/fonts.css');
    $APPLICATION->AddHeadScript('https://yastatic.net/jquery/1.11.3/jquery.min.js'); // JQ
    $APPLICATION->AddHeadScript('https://yastatic.net/bootstrap/3.3.4/js/bootstrap.min.js');


    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fb/magnific-popup.css');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fb/jquery.magnific-popup.min.js');
    

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fb/jquery.fancybox.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fb/jquery.fancybox-thumbs.css');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fb/jquery.fancybox.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fb/jquery.fancybox-thumbs.js');


    //$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/owl/owl.carousel.css');
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/owl/owl.carousel.min.js');

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/wfimg.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');
    //$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/colors/'.$curColor.'.css');
    //$APPLICATION->AddHeadString('<script>BX.message('.CUtil::PhpToJSObject( $MESS, false ).')</script>', true);

    //VH::DoCssHead($fin = $_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/settings.less');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/settings.css');
	if(!VH::$isDemo) $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/template_styles.css');
	else $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/template_styles_fore_change.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/respons.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/custom.css');
    ?>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="prefetch" href="<?=SITE_TEMPLATE_PATH?>/images/loader.gif">
<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'idKX5tgQJXpCAyLGY';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->

<!-- Marquiz script start -->
<script src="//script.marquiz.ru/v1.js" type="application/javascript"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  Marquiz.init({ 
    id: '5e39866e8d9b0700440d60fd', 
    autoOpen: false, 
    autoOpenFreq: 'once', 
    openOnExit: false 
  });
});
</script>
<!-- Marquiz script end -->

</head>

<body>
<?$APPLICATION->ShowPanel();?>
<?if(VH::$isDemo) $APPLICATION->IncludeComponent("vilka:settings", "", array("DEMO" => "Y"), false , array("HIDE_ICONS"=>"Y"));?>
<div class="head">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 va_m">
                <div class="va_m_b">
                    <a href="<?=SITE_DIR?>" class="logo">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/logo.php",
                            Array(),
                            Array("MODE"=>"html")
                        );?>
                        <span>
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/logo_descr.php",
                        Array(),
                        Array("MODE"=>"html")
                    );?>
                    </span>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 va_m">
                    <div class="row">
                        <div class="col-xs-7 va_m">
                            <div class="va_m_b">
                                <div class="top_tel">
                                    <?$APPLICATION->IncludeFile(
                                        SITE_DIR."include/top_tel.php",
                                        Array(),
                                        Array("MODE"=>"html")
                                    );?>
                                </div>
                                <div class="top_tel_descr">
                                    <?$APPLICATION->IncludeFile(
                                        SITE_DIR."include/top_tel_descr.php",
                                        Array(),
                                        Array("MODE"=>"html")
                                    );?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-5 va_m">
                            <div class="va_m_b">
                               <a href="#" class="btn zz_btn_head back_call_bt"><?=GetMessage('VR_ZZ')?></a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-2 va_m">
                <div class="va_m_b">
                    <a href="#" class="btn calc_pr"><i class="fa fa-mobile"></i><span><?=GetMessage('VR_CALC_PR')?></span></a>
                    <a href="<?=SITE_DIR?>kontakty/" class="btn call_us"><i class="fa fa-envelope-o"></i><span><?=GetMessage('VR_CALL_US')?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"vilka_horisontal_menu", 
	array(
		"COMPONENT_TEMPLATE" => "vilka_horisontal_menu",
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
<?if($curPage == SITE_DIR.'index.php'){?>
<?
    $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"top_sleder", 
	array(
		"COMPONENT_TEMPLATE" => "top_sleder",
		"IBLOCK_TYPE" => "vilka_srubi_info",
		"IBLOCK_ID" => VH::IBID("top_slide"),
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "VR_SALE",
			1 => "VR_BTN_TEXT",
			2 => "VR_POSITION",
			3 => "VR_URL",
			4 => "VR_PRICE",
			5 => "VR_FON",
			6 => "",
			7 => "",
			8 => "",
			9 => "",
			10 => "",
			11 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "greed",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"FILE_404" => ""
	),
	false
);?>

<div class="section_1 container-fluid">
    <div class="container">
        <div class="row fichi">
    <?$APPLICATION->IncludeFile(
        SITE_DIR."include/fishki.php",
        Array(),
        Array("MODE"=>"html")
    );?>
    </div>
    </div>
</div>
<?}
else {
    ?>
<div class="main_content">
    <div class="cont_top_bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?$APPLICATION->ShowTitle(false)?></h1>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"kroshki", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => SITE_ID,
		"COMPONENT_TEMPLATE" => "kroshki"
	),
	false
);?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main_cont"><?
}?>