<?
$iblock = \Bitrix\Iblock\IblockTable::getByPrimary($arParams['IBLOCK_ID'])->fetch();
$picture = $iblock['PICTURE'];

$arResult["DETAIL_PICTURE"]['SRC'] = !empty($picture) ? CFile::GetPath($picture) : '';
