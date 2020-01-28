<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Iblock;
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

if (!Loader::includeModule('iblock'))
	return;

$iblockExists = (!empty($arCurrentValues['IBLOCK_ID']) && (int)$arCurrentValues['IBLOCK_ID'] > 0);
$arProperty = array();
if ($iblockExists)
{
    $propertyIterator = Iblock\PropertyTable::getList(array(
        'select' => array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE', 'LINK_IBLOCK_ID', 'USER_TYPE'),
        'filter' => array('=IBLOCK_ID' => $arCurrentValues['IBLOCK_ID'], '=ACTIVE' => 'Y'),
        'order' => array('SORT' => 'ASC', 'NAME' => 'ASC')
    ));
    while ($property = $propertyIterator->fetch())
    {
        $propertyCode = (string)$property['CODE'];
        if ($propertyCode == '')
            $propertyCode = $property['ID'];
        $propertyName = '['.$propertyCode.'] '.$property['NAME'];

        if ($property['PROPERTY_TYPE'] != Iblock\PropertyTable::TYPE_FILE)
        {
            $arProperty[$propertyCode] = $propertyName;
        }
    }
    unset($propertyCode, $propertyName, $property, $propertyIterator);
}

$arTemplateParameters["DNTSHOW_PROPERTY"] = array(
    "PARENT" => "VISUAL",
    "NAME" => GetMessage("DNTSHOW_PROPERTY"),
    "TYPE" => "LIST",
    "MULTIPLE" => "Y",
    "VALUES" => $arProperty,
    "SIZE" => (count($arProperty) > 5 ? 8 : 4),
    "ADDITIONAL_VALUES" => "Y",
);