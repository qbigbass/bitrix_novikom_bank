<?php

use Bitrix\Iblock\SectionTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Application;
use Bitrix\Iblock\Iblock as BitrixIblock;

function modifyFirstLevelMainSubmenu(array $firstLevelMenu, int $hiddenKey = 7): array
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
    $arRefElements = [];
    $arNameRefElements = [];

    foreach ($arResult as $key => $item) {
        $modifiedResult['FIRST_LEVEL_MENU'][] = $item;
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
            if (count($elements) === 1 && empty($sections)) {
                $modifiedResult['FIRST_LEVEL_MENU'][$item['ITEM_INDEX']]['LINK'] = '/' . $rootUri . '/' . $elements[0]['CODE'] . '/';
            } else {
                foreach ($elements as $element) {
                    if ($rootUri === 'msb') {
                        // Для меню 2-ого уровня если элемент наследует элемент из КК через св-во "Вывод контента в одноименном разделе МСБ"
                        //  необходимо в меню 2-ого уровня вывести название элемента из КК
                        $arRefElements[$element['ID']] = $element['CODE'];
                    }

                    $secondLevelItem = [
                        'ITEM_INDEX' => $item['ITEM_INDEX'],
                        'ID' => $element['ID'],
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

    if (!empty($arRefElements)) {
        $class = BitrixIblock::wakeUp(iblock('corporate_clients'))->getEntityDataClass();
        $arrKeys = array_keys($arRefElements);
        $refElements = $class::getList([
            "select" => ["ID", "NAME", "REF_IBLOCK_MSB"],
            "filter" => [
                "ACTIVE" => "Y",
                "REF_IBLOCK_MSB.VALUE" => $arrKeys
            ],
        ])->fetchCollection();

        if (!empty($refElements)) {
            foreach ($refElements as $ref) {
                $refElementId = $ref->getRefIblockMsb()->getValue();
                $refElementName = $ref->getName();
                $arNameRefElements[$refElementId] = $refElementName;
            }
        }
    }

    if (!empty($modifiedResult['SECOND_LEVEL_MENU']) && !empty($arNameRefElements)) {
        foreach ($modifiedResult['SECOND_LEVEL_MENU'] as $itemIndex => &$arElements) {
            foreach ($arElements as &$arItem) {
                if (array_key_exists($arItem['ID'], $arNameRefElements)) {
                    $arItem['TEXT'] = $arNameRefElements[$arItem['ID']];
                }
            }
        }
    }

    return $modifiedResult;
}
