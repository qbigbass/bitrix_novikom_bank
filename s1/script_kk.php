<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION;

$dbConn = \Bitrix\Main\Application::getConnection();
$item = 1;
try {
    $dbConn->startTransaction();

    CModule::IncludeModule('iblock');
    $arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE");
    $arFilter = array("IBLOCK_ID" => 150);
    $res = CIBlockElement::GetList(
        arFilter: $arFilter,
        arSelectFields: $arSelect
    );

    while ($ob = $res->GetNextElement()) {
        $shortConditionsHtml = '';
        $arFields = $ob->GetFields();
        $arPropBenefits = $ob->GetProperties(arFilter: ['CODE' => 'BENEFITS_TOP_HEADER']);
        $arPropPosition = $ob->GetProperties(arFilter: ['CODE' => 'LIST_POSITION']);
        $arPropStyleCondition = $ob->GetProperties(arFilter: ['CODE' => 'TYPE_BENEFITS_TOP_HEADER']);
        if (!empty($arPropBenefits['BENEFITS_TOP_HEADER']['VALUE'])) {
            $linkedIblock = CIBlockElement::GetList(
                arFilter: ['IBLOCK_ID' => $arPropBenefits['BENEFITS_TOP_HEADER']['LINK_IBLOCK_ID'], 'ID' => $arPropBenefits['BENEFITS_TOP_HEADER']['VALUE']],
                arSelectFields: ["ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT"],
            );

            $shortConditionsHtml = ($arPropStyleCondition['TYPE_BENEFITS_TOP_HEADER']['VALUE'] === 'с маркерами') ?
                '<div class="banner-product__lists">' :
                '<div class="banner-product__benefits-list">';
            while ($shortConditions = $linkedIblock->Fetch()) {
                if ($arPropStyleCondition['TYPE_BENEFITS_TOP_HEADER']['VALUE'] === 'с маркерами') {
                    $shortConditionsHtml .=
                        '<ul class="list list--heavy list--size-m violet-100">
                            <li>' . $shortConditions['NAME'] . '</li>
                        </ul>';
                } else {
                    $shortConditionsHtml .=
                        '<div class="d-inline-flex flex-column row-gap-2">
                            <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 orange-100">
                                <span class="h4">' . $shortConditions['NAME'] . '</span>
                            </div>
                            <span class="d-block">' . $shortConditions['PREVIEW_TEXT'] . '</span>
                        </div>';
                }
            }
            $shortConditionsHtml .= '</div>';
        }

        if ($arPropPosition['LIST_POSITION']['VALUE'] === 'Сверху' && !empty($arFields['DETAIL_PICTURE'])) {
            CIBlockElement::SetPropertyValueCode(
                $arFields['ID'],
                'PREVIEW_PICTURE',
                $arFields['DETAIL_PICTURE']
            );
        } else if ($arPropPosition['LIST_POSITION']['VALUE'] === 'Снизу' && !empty($arFields['PREVIEW_PICTURE'])) {
            CIBlockElement::SetPropertyValueCode(
                $arFields['ID'],
                'PREVIEW_PICTURE',
                $arFields['PREVIEW_PICTURE']
            );
        }

        if (!empty($shortConditionsHtml)) {
            CIBlockElement::SetPropertyValueCode(
                $arFields['ID'],
                'SHORT_CONDITIONS',
                ['VALUE' => $shortConditionsHtml, 'TYPE' => 'HTML']
            );
        }

        echo $item . '. [' . date('d.m.Y H:i:s') . '] SUCCESS Элемент ' . $arFields['ID'] . ' успешно обновлен<br>';
        $item++;
    }
    $dbConn->commitTransaction();
} catch (Error|Exception $e) {
    $dbConn->rollbackTransaction();
    echo $item . '. [' . date('d.m.Y H:i:s') . '] ERROR ' . $e->getMessage() . '<br>';
}
