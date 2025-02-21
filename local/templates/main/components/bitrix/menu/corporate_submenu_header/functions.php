<?php

use Bitrix\Iblock\SectionTable;

function modifyFirstLevelMainSubmenu(array $firstLevelMenu) : array {
    $modifiedFirstLevelMenu = [];
    foreach ($firstLevelMenu as $key => &$item) {
        if($key >= 5) {
            $item['JS_DESKTOP_MOVE_LINK'] = true;
        }

        if($key >= 7) {
            $modifiedFirstLevelMenu['HIDDEN'][] = $item;
        } else {
            $modifiedFirstLevelMenu['NOT_HIDDEN'][] = $item;
        }
    }
    return $modifiedFirstLevelMenu;
}

function modifyCorporateSubmenuResult(array $arResult): array
{
    $modifiedResult = [
        'FIRST_LEVEL_MENU' => [],
        'SECOND_LEVEL_MENU' => [],
    ];

    foreach ($arResult as $key => $item) {
        $modifiedResult['FIRST_LEVEL_MENU'][] = $item;
        $iblockId = iblock('corporate_clients');

        $sections = SectionTable::getList([
            'filter' => [
                'PARENT_SECTION.NAME' => $item['TEXT'],
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'Y',
            ],
            'select' => [
                'ID',
                'NAME',
                'CODE',
            ],
            'order' => [
                'SORT' => 'ASC',
            ]
        ])->fetchAll();

        if (!empty($sections)) {
            foreach ($sections as $element) {
                $secondLevelItem = [
                    'TEXT' => $element['NAME'],
                    'LINK' => '/for-corporate-clients/' . $element['CODE'] . '/',
                    'DEPTH_LEVEL' => 2
                ];
                $modifiedResult['SECOND_LEVEL_MENU'][$item['ITEM_INDEX']][] = $secondLevelItem;
            }
        }

        $elements = \Bitrix\Iblock\ElementTable::getList([
            'filter' => [
                'IBLOCK_SECTION.NAME' => $item['TEXT'],
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'Y',
            ],
            'select' => [
                'ID',
                'NAME',
                'CODE',
            ],
            'order' => [
                'SORT' => 'ASC',
            ]
        ])->fetchAll();

        if (!empty($elements) && count($elements) > 1) {
            foreach ($elements as $element) {
                $secondLevelItem = [
                    'TEXT' => $element['NAME'],
                    'LINK' => '/for-corporate-clients/' . $element['CODE'] . '/',
                    'DEPTH_LEVEL' => 2
                ];
                $modifiedResult['SECOND_LEVEL_MENU'][$item['ITEM_INDEX']][] = $secondLevelItem;
            }
        }
    }

    return $modifiedResult;
}
