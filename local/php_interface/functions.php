<?php

function iblock(string $code) : ?int {
    try {
        \Bitrix\Main\Loader::IncludeModule("iblock");
        $iblock = Bitrix\Iblock\IblockTable::getList(['select' => ['ID'], 'filter' => ['CODE' => $code]])->Fetch();
        return $iblock['ID'];
    } catch (Exception $e) {
        return false;
    }
}

function modifyMainSubmenuResult(array $arResult) : array {
    $modifiedResult = [
        'FIRST_LEVEL_MENU' => [],
        'SECOND_LEVEL_MENU' => [],
    ];


    foreach ($arResult as $item) {
        if ($item['DEPTH_LEVEL'] == 2) {
            $lastParentElement = end($modifiedResult['FIRST_LEVEL_MENU']);
            $itemIndex = $lastParentElement['ITEM_INDEX'];

            if(empty($modifiedResult['SECOND_LEVEL_MENU'][$itemIndex]) && !empty($lastParentElement['PARAMS']['submenu_item_name'])) {
                $lastParentElement['TEXT'] = $lastParentElement['PARAMS']['submenu_item_name'];
                $modifiedResult['SECOND_LEVEL_MENU'][$itemIndex][] = $lastParentElement;
            }

            $modifiedResult['SECOND_LEVEL_MENU'][$itemIndex][] = $item;
        } else {
            $modifiedResult['FIRST_LEVEL_MENU'][] = $item;
        }
    }

    return $modifiedResult;
}

function modifyParentName(string $name) : string {
    return 'Все ' . mb_strtolower($name) . ' НОВИКОМ';
}

function clearPhoneNumber(string $phoneNumber) : string {
    return preg_replace('/[^0-9\+]+/', '', $phoneNumber);
}
