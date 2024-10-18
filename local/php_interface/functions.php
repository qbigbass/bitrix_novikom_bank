<?php

function iblock(string $code) : int {
    try {
        \Bitrix\Main\Loader::IncludeModule('iblock');
        $iblock = Bitrix\Iblock\IblockTable::getList(['select' => ['ID'], 'filter' => ['CODE' => $code]])->Fetch();
        return $iblock['ID'] ?? 0;
    } catch (Exception $e) {
        return 0;
    }
}

function printIntoFile($text, string $filePath = '/logger.txt') {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . $filePath, print_r($text, true), FILE_APPEND);
}

function modifyMainSubmenuResult(array $arResult) : array {
    $modifiedResult = [
        'FIRST_LEVEL_MENU' => [],
        'SECOND_LEVEL_MENU' => [],
    ];

    foreach ($arResult as &$item) {
        if ($item['DEPTH_LEVEL'] == 2) {
            $lastParentElement = end($modifiedResult['FIRST_LEVEL_MENU']);
            $itemIndex = $lastParentElement['ITEM_INDEX'];

            if(!empty($item['PARAMS']['alternative_name'])) {
                $item["TEXT"] = $item['PARAMS']['alternative_name'];
            }

            $item['LINK'] = str_replace('index.php', '', $item['LINK']);
            $modifiedResult['SECOND_LEVEL_MENU'][$itemIndex][] = $item;
        } else {
            $modifiedResult['FIRST_LEVEL_MENU'][] = $item;
        }
    }
    unset($item);

    return $modifiedResult;
}

function clearPhoneNumber(string $phoneNumber) : string {
    return preg_replace('/[^0-9\+]+/', '', $phoneNumber);
}

function pre(mixed ...$arrays): void
{
    foreach ($arrays as $array) {
        echo '<pre>' . print_r($array, true) . '</pre>';
    }
}
