<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;


//$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_FOLDER'].'/sm/css/sm-core-css.css');
$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_FOLDER'].'/sm/addons/bootstrap/jquery.smartmenus.bootstrap.css');
$APPLICATION->AddHeadScript($templateData['TEMPLATE_FOLDER'].'/sm/jquery.smartmenus.min.js');
$APPLICATION->AddHeadScript($templateData['TEMPLATE_FOLDER'].'/sm/addons/bootstrap/jquery.smartmenus.bootstrap.min.js');

