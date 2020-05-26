<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

$tag_iblock = 14;

GLOBAL $USER;
if($USER->getId() == 2):


// Get Id Tags
$rows = CIBlockElement::GetList(
    array(),
    array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        'ACTIVE' => 'Y',
    ),
    false,
    array(),
    array(
        "NAME", "IBLOCK_ID", "ID"
    )
);

$arTags = array();
$element = array();
while ($row = $rows->GetNextElement()) {
    $element = $row->GetProperties();
    foreach ($element["TAGS"]["VALUE"] as $tag)
        $arTags[$tag] = $tag;
}


// Get Tags
$tags = CIBlockElement::GetList(
    array(),
    array(
        "IBLOCK_ID" => $tag_iblock,
        'ACTIVE' => 'Y',
    ),
    false,
    array(),
    array()
);

$tags_links = array();
while ($tag = $tags->GetNextElement()) {
    $tags_info = $tag->GetFields();
    $tags_links[] = array(
        "name" => $tags_info["NAME"],
        "link" => $tags_info["CODE"],
    );
}

$arResult = $tags_links;

$this->IncludeComponentTemplate();



endif;