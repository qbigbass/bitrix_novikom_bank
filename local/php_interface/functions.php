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

function processTerms(array $terms, array $properties, bool $days = false): array
{
    $result = [];

    foreach ($properties as $key => $term) {
        if (!$term || !isset($terms[$key])) {
            continue;
        }

        $sign = $terms[$key]['SIGN'];
        $fromTo = $terms[$key]['FROM_TO'];
        $value = '';

        if ($key === 'RATE') {
            $value = $term . ' %';
        } elseif (in_array($key, ['SUM_FROM', 'SUM_TO'])) {
            $value = number_format($term, 0, '', ' ') . ' ₽';
        } elseif (in_array($key, ['PERIOD_FROM', 'PERIOD_TO'])) {
            if ($days) {
                $value = $term . declensionFrom($term, 'day');
            } else {
                $value = round($term / 12) . declensionFrom($term);
            }
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

function declensionFrom(int $number, string $period = 'year') {
    $number = abs($number) % 100;

    return match ($period) {
        'year' => $number % 10 == 1 ? ' года' : ' лет',
        'month' => $number % 10 == 1 ? ' месяца' : ' месяцев',
        'day' => $number % 10 == 1 ? ' дня' : ' дней',
        default => '',
    };
}
