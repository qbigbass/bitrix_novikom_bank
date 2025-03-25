<?php
/** @var $arResult array */
/** @var $arParams array */

use Bitrix\Iblock\ElementTable;

$arMenu = [];

if (!empty($arResult)) {
    $parentKey = 0;
    foreach ($arResult as $key => $item) {
        if ($item['DEPTH_LEVEL'] === 1) {
            $arMenu[$key] = $item;

            if ($item['IS_PARENT']) {
                $arMenu[$key]['CHILD'] = [];
                $parentKey = $key;
            }
        } elseif ($item['DEPTH_LEVEL'] === 2) {
            $arMenu[$parentKey]['CHILD'][$key] = $item;
            $text = $item['TEXT'];

            if (!empty($arParams['SUBMENU'])) {
                foreach ($arParams['SUBMENU'] as $subMenu) {
                    if ($subMenu['TEXT'] === $text) {
                        $arMenu[$parentKey]['CHILD'][$key]['SUBMENU'] = $subMenu['CHILD'];
                        break;
                    }
                }
            }

            if (empty($arMenu[$parentKey]['CHILD'][$key]['SUBMENU'])) {
                $arLink = array_filter(explode("/", $item['LINK']));
                $parentSection = "";
                $iblockId = 0;

                if (!empty($arLink)) {
                    $parentSection = $arLink[1];
                }

                if ($parentSection !== "") {
                    $iblockId = MENU_IBLOCKS[$parentSection] ?? iblock('corporate_clients');
                }

                if ($iblockId > 0) {
                    $elements = ElementTable::getList([
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

                    if (!empty($elements)) {
                        foreach ($elements as $arElement) {
                            $thirdLevelItem = [
                                'ID' => $arElement['ID'],
                                'TEXT' => $arElement['NAME'],
                                'LINK' => '/' . $parentSection . '/' . $arElement['CODE'] . '/',
                                'DEPTH_LEVEL' => 3
                            ];
                            $arMenu[$parentKey]['CHILD'][$key]['SUBMENU'][] = $thirdLevelItem;
                        }
                    }
                }
            }
        }
    }
}

if (!empty($arMenu)) {
    $arResult = $arMenu;
}
