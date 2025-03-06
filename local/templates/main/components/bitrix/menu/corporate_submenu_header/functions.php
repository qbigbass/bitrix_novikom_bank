<?php

use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Application;

function modifyFirstLevelMainSubmenu(array $firstLevelMenu, int $hiddenKey  = 7) : array
{
    $modifiedFirstLevelMenu = [];
    foreach ($firstLevelMenu as $key => &$item) {
        if ($key >= 5) {
            $item['JS_DESKTOP_MOVE_LINK'] = true;
        }

        if ($key >= $hiddenKey) {
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
    $request = Application::getInstance()->getContext()->getRequest();
    $uriString = $request->getRequestUri();
    $rootUri = explode('/', $uriString)[1];
    $iblockId = MENU_IBLOCKS[$rootUri] ?? iblock('corporate_clients');


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
                    'LINK' => '/' . $rootUri . '/' . $element['CODE'] . '/',
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

        if (!empty($elements) /* && count($elements) > 1 */) {
            if (count($elements) == 1) {
                $modifiedResult['FIRST_LEVEL_MENU'][$item['ITEM_INDEX']]['LINK'] = '/' . $rootUri . '/' . $elements[0]['CODE'] . '/';
            } else {
                foreach ($elements as $element) {
                    $secondLevelItem = [
                        'TEXT' => $element['NAME'],
                        'LINK' => '/' . $rootUri . '/' . $element['CODE'] . '/',
                        'DEPTH_LEVEL' => 2
                    ];
                    $modifiedResult['SECOND_LEVEL_MENU'][$item['ITEM_INDEX']][] = $secondLevelItem;
                }
            }
        }

        if (empty($sections) && empty($elements)) {
            unset($modifiedResult['FIRST_LEVEL_MENU'][$item['ITEM_INDEX']]);
        }
    }

    return $modifiedResult;
}
