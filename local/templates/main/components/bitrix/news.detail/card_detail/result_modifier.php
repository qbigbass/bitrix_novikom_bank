<?php
use Dalee\Entities\FormListTable;

require_once __DIR__ . '/functions.php';
global $APPLICATION;
if ($arResult['IBLOCK_SECTION_ID']) {
    $section = CIBlockSection::GetList(
        ['SORT' => 'ASC'],
        [
            'ID' => $arResult['IBLOCK_SECTION_ID'],
            'IBLOCK_ID' => $arResult['IBLOCK_ID']
        ],
        false,
        [
            'ID',
            'NAME',
            'PICTURE',
            'UF_*'
        ]
    )->fetch();

    $arResult['SECTION_NAME'] = $section['NAME'] ?? $arResult['NAME'];
    $arResult['SECTION_ICON'] = CFile::GetPath($section['PICTURE']);
    $arResult['BANNER_STYLE'] = getBannerStyle($section['UF_BANNER_STYLE']);
    $arResult['SHOW_BUTTON'] = $section['UF_SHOW_BUTTON'];
    $arResult['BUTTON_LINK'] = $section['UF_BUTTON_LINK'];
    $arResult['BUTTON_TEXT'] = $section['UF_BUTTON_TEXT'];

    $form = FormListTable::query()
        ->setSelect(['UF_XML_ID'])
        ->setFilter(['ID' => $section['UF_BUTTON_CODE_FORM']])
        ->exec()
        ->fetchObject();
    $arResult['BUTTON_CODE_FORM'] = $form?->getUfXmlId();
}else{
    $arResult['SECTION_NAME'] = $arResult['NAME'];
}


$cp = $this->__component;
if (is_object($cp)) {
    $cp->SetResultCacheKeys(['SECTION_NAME']);
}
