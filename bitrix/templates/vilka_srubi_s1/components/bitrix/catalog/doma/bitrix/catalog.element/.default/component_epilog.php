<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;

?>

<div class="page-header2"><?=GetMessage("VR_LIKE_PROJECT")?></div>


<?
global $APPLICATION;

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/slick/slick.css');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slick/slick.min.js');
//VH::pr($arParams);
global $arrFilter_vr;
if($arResult['PROPERTIES']['VR_RECOMMEND']['VALUE'] != '') {
	$arrFilter_vr = array('ID' => $arResult['PROPERTIES']['VR_RECOMMEND']['VALUE']);
}
$APPLICATION->IncludeComponent("bitrix:catalog.section", "greed_small", Array(
	"COMPONENT_TEMPLATE" => "greed_small",
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],	// ��� ���������
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],	// ��������
		"SECTION_ID" => "",	// ID �������
		"SECTION_CODE" => "",	// ��� �������
		"SECTION_USER_FIELDS" => array(	// �������� �������
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "sort",	// �� ������ ���� ��������� ��������
		"ELEMENT_SORT_ORDER" => "asc",	// ������� ���������� ���������
		"ELEMENT_SORT_FIELD2" => "id",	// ���� ��� ������ ���������� ���������
		"ELEMENT_SORT_ORDER2" => "desc",	// ������� ������ ���������� ���������
		"FILTER_NAME" => "arrFilter_vr",	// ��� ������� �� ���������� ������� ��� ���������� ���������
		"INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
		"SHOW_ALL_WO_SECTION" => "Y",	// ���������� ��� ��������, ���� �� ������ ������
		"PAGE_ELEMENT_COUNT" => "4",	// ���������� ��������� �� ��������
		"LINE_ELEMENT_COUNT" => "4",	// ���������� ��������� ��������� � ����� ������ �������
		"PROPERTY_CODE" => array(	// ��������
			0 => "",
			1 => "VR_PROP1",
			2 => "",
		),
		"OFFERS_LIMIT" => "5",	// ������������ ���������� ����������� ��� ������ (0 - ���)
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"MESS_BTN_BUY" => "������",
		"MESS_BTN_ADD_TO_BASKET" => "� �������",
		"MESS_BTN_SUBSCRIBE" => "�����������",
		"MESS_BTN_DETAIL" => "���������",
		"MESS_NOT_AVAILABLE" => "��� � �������",
		"SECTION_URL" => "",	// URL, ������� �� �������� � ���������� �������
		"DETAIL_URL" => "",	// URL, ������� �� �������� � ���������� �������� �������
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// �������� ����������, � ������� ���������� ��� ������
		"SEF_MODE" => "N",	// �������� ��������� ���
		"AJAX_MODE" => "N",	// �������� ����� AJAX
		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
		"CACHE_TYPE" => "A",	// ��� �����������
		"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
		"CACHE_GROUPS" => "Y",	// ��������� ����� �������
		"SET_TITLE" => "N",	// ������������� ��������� ��������
		"SET_BROWSER_TITLE" => "N",	// ������������� ��������� ���� ��������
		"BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
		"SET_META_KEYWORDS" => "N",	// ������������� �������� ����� ��������
		"META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
		"SET_META_DESCRIPTION" => "N",	// ������������� �������� ��������
		"META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
		"SET_LAST_MODIFIED" => "N",	// ������������� � ���������� ������ ����� ����������� ��������
		"USE_MAIN_ELEMENT_SECTION" => "N",	// ������������ �������� ������ ��� ������ ��������
		"ADD_SECTIONS_CHAIN" => "N",	// �������� ������ � ������� ���������
		"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
		"ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
		"PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
		"PRICE_CODE" => "",	// ��� ����
		"USE_PRICE_COUNT" => "N",	// ������������ ����� ��� � �����������
		"SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
		"PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
		"BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
		"USE_PRODUCT_QUANTITY" => "N",	// ��������� �������� ���������� ������
		"PRODUCT_QUANTITY_VARIABLE" => "",	// �������� ����������, � ������� ���������� ���������� ������
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// ��������� � ������� �������� ������� � �����������
		"PRODUCT_PROPS_VARIABLE" => "prop",	// �������� ����������, � ������� ���������� �������������� ������
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// ��������� ��������� � ������� ������, � ������� ��������� �� ��� ��������������
		"PRODUCT_PROPERTIES" => "",	// �������������� ������
		"PAGER_TEMPLATE" => ".default",	// ������ ������������ ���������
		"DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
		"DISPLAY_BOTTOM_PAGER" => "N",	// �������� ��� �������
		"PAGER_TITLE" => "������",	// �������� ���������
		"PAGER_SHOW_ALWAYS" => "N",	// �������� ������
		"PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
		"PAGER_SHOW_ALL" => "N",	// ���������� ������ "���"
		"PAGER_BASE_LINK_ENABLE" => "N",	// �������� ��������� ������
		"SET_STATUS_404" => "N",	// ������������� ������ 404
		"SHOW_404" => "N",	// ����� ����������� ��������
		"MESSAGE_404" => "",	// ��������� ��� ������ (�� ��������� �� ����������)
		"SHOW_CLOSE_POPUP" => "N",	// ������� �� �������
	),
	false
);
?>