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

/**
 * @param array $terms
 * @param array $properties
 * @return array
 */
function processTerms(array $terms, array $properties): array
{
    $result = [];

    foreach ($properties as $key => $term) {
        if (!$term || !isset($terms[$key])) {
            continue;
        }

        $sign = $terms[$key]['SIGN'];
        $fromTo = $terms[$key]['FROM_TO'];
        $period = $terms[$key]['PERIOD'] ?? 'years';
        $value = '';

        if (in_array($key, ['RATE_FROM', 'RATE_TO'])) {
            $value = $term . ' %';
        } elseif (in_array($key, ['SUM_FROM', 'SUM_TO'])) {
            $value = number_format($term, 0, '', ' ') . ' <span class="currency">₽</span>';
        } elseif (in_array($key, ['PERIOD_FROM', 'PERIOD_TO'])) {
            $value = ($period == 'years' ? floor($term / 12) : $term) . declensionFrom($term, $period);
        } elseif ($key === 'DIAPASON') {
            $value = $term;
        }

        $result[] = [
            'SIGN' => $sign,
            'FROM_TO' => $fromTo,
            'VALUE' => $value,
        ];
    }

    return $result;
}

/**
 * @param int $number
 * @param string $period
 * @return string
 */
function declensionFrom(int $number, string $period = 'years'): string
{
    $number = abs($number) % 100;

    return match ($period) {
        'years' => $number % 10 == 1 ? ' года' : ' лет',
        'months' => $number % 10 == 1 ? ' месяца' : ' месяцев',
        'days' => $number % 10 == 1 ? ' дня' : ' дней',
        default => '',
    };
}

/**
 * @param string $template
 * @return void
 */
function showNavChain(string $template = '.default'): void
{
    global $APPLICATION;
    $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "",
        [
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0"
        ]
    );
}

function getHlBlockEntries(string $hlBlockName): array
{
    \Bitrix\Main\Loader::includeModule("highloadblock");
    Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlBlockName);
    $strEntityDataClass = '\\' . $hlBlockName . 'Table';

    return $strEntityDataClass::getList()->fetchAll();
}
