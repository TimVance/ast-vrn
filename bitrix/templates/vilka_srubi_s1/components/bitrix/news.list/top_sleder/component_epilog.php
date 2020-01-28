<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;


$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/slick/slick.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/slick/slick-theme.css');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slick/slick.min.js');