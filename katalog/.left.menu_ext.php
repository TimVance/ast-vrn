<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if (!function_exists("GetTreeRecursive")) //Include from main.map component
{
$aMenuLinksExt=$APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"IS_SEF" => "Y",
//		"SEF_BASE_URL" => "/",
//		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
//		"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#",
		"IBLOCK_TYPE" => "vilka_srubi_info",
		"IBLOCK_ID" => VH::IBID("catalog"),
		"DEPTH_LEVEL" => "3",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "360000"
	),
	false,
	Array('HIDE_ICONS' => 'Y')
);
    if(count($aMenuLinks) ==0)
    {
        $aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
    }
}