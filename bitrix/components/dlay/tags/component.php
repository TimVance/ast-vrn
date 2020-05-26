<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$tag_iblock = 14;

global $USER;
if ($USER->getId() == 2):

$sectionInfo = array();
$SectList = CIBlockSection::GetList(
    array(),
    array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ACTIVE" => "Y",
        "CODE" => $arParams["SECTION_CODE"]
    ),
    false,
    array("ID","IBLOCK_ID","IBLOCK_TYPE_ID","IBLOCK_SECTION_ID","CODE","SECTION_ID","NAME","SECTION_PAGE_URL")
);
while ($SectListGet = $SectList->GetNext())
{
    $sectionInfo = $SectListGet;
}

$arFilter["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
$arFilter["ACTIVE"] = 'Y';

if (empty($arParams["PAGE"])) {
    if (!empty($sectionInfo["CODE"]))
        $arFilter["SECTION_CODE"] = $sectionInfo["CODE"];
}

// Get Id Tags
$rows = CIBlockElement::GetList(
    array(),
    $arFilter,
    false,
    array(),
    array(
        "NAME", "IBLOCK_ID", "ID"
    )
);

$arTags  = array();
$element = array();
while ($row = $rows->GetNextElement()) {
    $element = $row->GetProperties();
    foreach ($element["TAGS"]["VALUE"] as $tag)
        $arTags[$tag] = $tag;
}

// Get Tags
if (!empty($arTags)) {
    $tags = CIBlockElement::GetList(
        array(),
        array(
            "IBLOCK_ID" => $tag_iblock,
            'ACTIVE'    => 'Y',
            'ID'        => $arTags
        ),
        false,
        array(),
        array()
    );

    $tags_links = array();
    while ($tag = $tags->GetNextElement()) {
        $tags_info = $tag->GetFields();


        // Find Current Tag
        $url          = explode("/", $APPLICATION->GetCurPage());
        $section_path = $url[count($url) - 2];

        $findTagId = '';
        if (!empty($section_path)):
            $findTags = CIBlockElement::GetList(
                array(),
                array(
                    "IBLOCK_ID" => $tag_iblock,
                    'ACTIVE'    => 'Y',
                    'CODE'      => $section_path
                ),
                false,
                array(),
                array(
                    "NAME", "IBLOCK_ID", "ID"
                )
            );
            while ($findTag = $findTags->GetNextElement()) {
                $tags_info_find = $findTag->GetFields();
                $findTagId      = $tags_info_find["ID"];
                break;
            }
        endif;

        if ($findTagId != $tags_info["ID"]) {
            $tags_links[$tags_info["ID"]]["name"] = $tags_info["NAME"];
            if (!empty($sectionInfo["SECTION_PAGE_URL"]) && empty($arParams["PAGE"]))
                $tags_links[$tags_info["ID"]]["link"] = $sectionInfo["SECTION_PAGE_URL"] . $tags_info["CODE"] . "/";
            else $tags_links[$tags_info["ID"]]["link"] = '/katalog/'.$tags_info["CODE"] . "/";
        }
    }

    $arResult = $tags_links;

    $this->IncludeComponentTemplate();
}


endif;