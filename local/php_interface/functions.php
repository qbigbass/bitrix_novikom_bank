<?php

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

function iblock(string $code): int
{
    try {
        Loader::includeModule('iblock');
        $app = Application::getInstance();
    } catch (LoaderException $e) {
        ShowError($e->getMessage());
    }

    $cache = $app->getCache();
    $taggedCache = $app->getTaggedCache();

    if ($cache->initCache(36000000, 'sections_codes', '/iblock')) {
        $result = $cache->getVars();
    } elseif ($cache->startDataCache()) {
        $result = [];
        $res = \CIBlock::GetList([], ['CHECK_PERMISSIONS' => 'N']);

        while ($row = $res->Fetch()) {
            $result[$row['CODE']] = (int)$row['ID'];
        }

        if (empty($result)) {
            $cache->abortDataCache();
        }

        $taggedCache->startTagCache('/iblocks');
        $taggedCache->registerTag('iblock_id_new');
        $taggedCache->endTagCache();

        $cache->endDataCache($result);
    }

    if (!empty($result[$code])) {
        return $result[$code];
    }

    return 0;
}

function printIntoFile($text, string $filePath = '/logger.txt')
{
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . $filePath, print_r($text, true), FILE_APPEND);
}

function modifyMainSubmenuResult(array $arResult): array
{
    $modifiedResult = [
        'FIRST_LEVEL_MENU' => [],
        'SECOND_LEVEL_MENU' => [],
    ];

    foreach ($arResult as &$item) {
        if ($item['DEPTH_LEVEL'] == 2) {
            $lastParentElement = end($modifiedResult['FIRST_LEVEL_MENU']);
            $itemIndex = $lastParentElement['ITEM_INDEX'];

            if (!empty($item['PARAMS']['alternative_name'])) {
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

function clearPhoneNumber(string $phoneNumber): string
{
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

    foreach ($terms as $key => $termData) {
        if (!isset($properties[$key]) || !$properties[$key]) {
            continue;
        }

        $sign = $termData['SIGN'];
        $fromTo = $termData['FROM_TO'];
        $period = $termData['PERIOD'] ?? 'years';
        $term = $properties[$key];
        $value = '';

        if (in_array($key, ['RATE_FROM', 'RATE_TO'])) {
            $value = $term . '%';
        } elseif (in_array($key, ['SUM_FROM', 'SUM_TO'])) {
            $value = number_format($term, 0, '', ' ') . ' <span class="currency">₽</span>';
        } elseif (in_array($key, ['PERIOD_FROM', 'PERIOD_TO'])) {
            $value = is_numeric($term) ? ($period === 'years' ? floor($term / 12) : $term) . '<span class="text-l fw-semibold">' . declensionFrom($term, $period) . '</span>' : $term;
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
 * @param int $depth
 * @return void
 */
function showNavChain(string $template = '.default', int $depth = 0, array $params = []): void
{
    global $APPLICATION, $BREADCRUMBS_PARAMS;

    $BREADCRUMBS_PARAMS = $params;

    $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "$template",
        [
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => $depth,
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

function getIBlockElements(int $IBlockId, ?array $filter = null): array
{
    $arFilter = [
        'IBLOCK_ID' => $IBlockId,
        'ACTIVE' => 'Y',
    ];

    if (!empty($filter)) {
        $arFilter = array_merge($arFilter, $filter);
    }

    \Bitrix\Main\Loader::IncludeModule('iblock');
    return Bitrix\Iblock\ElementTable::getList([
        'order' => ['SORT' => 'ASC'],
        'select' => ['ID', 'NAME', 'CODE'],
        'filter' => $arFilter
    ])->fetchAll();
}

function getStepperIcons(int $stepIndex): string
{
    $stepperIcons =
        '<div class="stepper-item__icon-border" data-level="1">
            <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
            </svg>
        </div>';

    for ($i = 0; $i < $stepIndex; $i++) {
        $stepperIcons .=
            '<div class="stepper-item__icon-border" data-level="' . $i + 2 . '">
                <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                </svg>
            </div>';
    }

    return $stepperIcons;
}

function getElementIdsIncludedArea(int $iblock): array
{
    $elementIds = [];

    global $APPLICATION;
    $arPathPage = array_filter(explode("/", $APPLICATION->GetCurPage()));
    $startPathUrl = current($arPathPage) ?: 'main';
    $finalPathUrl = end($arPathPage) ?: 'main';
    $arFilter = [
        'IBLOCK_ID' => $iblock,
        'ACTIVE' => 'Y',
    ];
    $parentSectionId = 0;

    if (!empty($startPathUrl)) {
        // Найдем ID родительского раздела
        $section = SectionTable::getList([
            'filter' => [
                'CODE' => $startPathUrl,
                'IBLOCK_ID' => $iblock,
                'ACTIVE' => 'Y',
            ],
            'select' => [
                'ID'
            ],
            'order' => [
                'SORT' => 'ASC',
            ],
            'limit' => 1
        ])->fetchObject();

        if ($section) {
            $parentSectionId = $section->getId();
        }

        if ($parentSectionId > 0) {
            if ($startPathUrl !== $finalPathUrl) {
                // Найдем ID конечного раздела из URL в ИБ включаемой области
                $rsParentSection = CIBlockSection::GetByID($parentSectionId);
                $finalSectionId = 0;

                if ($arParentSection = $rsParentSection->GetNext()) {
                    $arFilterFindSubSections = [
                        'IBLOCK_ID' => $arParentSection['IBLOCK_ID'],
                        '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],
                        '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],
                        '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']
                    ];
                    $rsSect = CIBlockSection::GetList(
                        ['left_margin' => 'asc'],
                        $arFilterFindSubSections
                    );

                    while ($arSect = $rsSect->GetNext()) {
                        if ($arSect["CODE"] === $finalPathUrl) {
                            $finalSectionId = $arSect["ID"];
                            break;
                        }
                    }
                }

                if ($finalSectionId > 0) {
                    $arFilter = [
                        'SECTION_ID' => $finalSectionId,
                    ];
                } else {
                    return [];
                }
            } else {
                $arFilter = [
                    'SECTION_ID' => $parentSectionId,
                ];
            }

            $elements = CIBlockElement::GetList(
                ["SORT"=>"ASC"],
                $arFilter,
                false,
                false,
                ['ID', 'IBLOCK']
            );

            while ($element = $elements->Fetch()) {
                $elementIds[] = $element["ID"];
            }
        }
    }

    return $elementIds;
}
