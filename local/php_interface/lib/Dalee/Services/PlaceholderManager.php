<?php

namespace Dalee\Services;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\SystemException;
use CIBlockElement;

/**
 * Менеджер плейсхолдеров для замены в контенте.
 *
 * Поддерживаемые плейсхолдеры:
 * - #MIN_LOAN_RATE#: Минимальная ставка по кредитам
 * - #MAX_LOAN_RATE#: Максимальная ставка по кредитам
 * - #MIN_MORTGAGE_RATE#: Минимальная ставка по ипотеке
 * - #MAX_MORTGAGE_RATE#: Максимальная ставка по ипотеке
 * - #MIN_DEPOSIT_RATE#: Минимальная ставка по вкладам
 * - #MAX_DEPOSIT_RATE#: Максимальная ставка по вкладам
 *
 * Используемые инфоблоки:
 * - loans_rates: Для работы с данными по кредитам.
 * - mortgage_rates: Для работы с данными по ипотеке.
 * - deposits_rates: Для работы с данными по вкладам.
 */

class PlaceholderManager
{
    private array $calculatedValues = [
        'loans_rates' => [],
        'mortgage_rates' => [],
        'deposits_rates' => [],
    ];

    private array $replacements = [
        '#MIN_LOAN_RATE#' => ['loans_rates', 'RATE_FROM'],
        '#MAX_LOAN_RATE#' => ['loans_rates', 'RATE_TO'],
        '#MIN_MORTGAGE_RATE#' => ['mortgage_rates', 'RATE_FROM'],
        '#MAX_MORTGAGE_RATE#' => ['mortgage_rates', 'RATE_TO'],
        '#MIN_DEPOSIT_RATE#' => ['deposits_rates', 'RATE_FROM'],
        '#MAX_DEPOSIT_RATE#' => ['deposits_rates', 'RATE_TO'],
    ];

    /**
     * @param string $content
     * @return void
     */
    public static function handle(string &$content): void
    {
        global $APPLICATION;

        if ((mb_stripos($APPLICATION->GetCurDir(), '/bitrix/') !== false)) {
            return;
        }

        $instance = new self();

        $entriesToProcess = [
            'LOAN' => 'loans_rates',
            'MORTGAGE' => 'mortgage_rates',
            'DEPOSIT' => 'deposits_rates',
        ];

        $foundEntries = $instance->findUsedBlocks($content, $entriesToProcess);

        foreach ($foundEntries as $entry) {
            try {
                $instance->getElements($entriesToProcess[$entry]);
            } catch (SystemException $e) {
                echo $e->getMessage();
                continue;
            }
        }

        $instance->replacePlaceholders($content, $instance->replacements);
    }

    /**
     * @param string $content
     * @param array $entriesToProcess
     * @return array
     */
    private function findUsedBlocks(string $content, array $entriesToProcess): array
    {
        return array_filter(array_keys($entriesToProcess), fn($block) => str_contains($content, $block));
    }

    /**
     * @param string $content
     * @param array $replacements
     * @return void
     */
    private function replacePlaceholders(string &$content, array $replacements): void
    {
        foreach ($replacements as $placeholder => [$block, $property]) {
            if (!empty($this->calculatedValues[$block][$property])) {
                $content = str_replace($placeholder, $this->calculatedValues[$block][$property], $content);
            }
        }
    }

    /**
     * @param string $iblockCode
     * @return void
     * @throws SystemException
     */
    private function getElements(string $iblockCode): void
    {
        if (empty($this->$iblockCode)) {
            $iblockId = iblock($iblockCode);

            $elements = ElementTable::getList([
                'filter' => [
                    'IBLOCK_ID' => $iblockId,
                ],
                'select' => ['ID', 'NAME'],
            ])->fetchAll();

            $elementsWithProps = array_combine(
                array_column($elements, 'ID'),
                array_map(fn($item) => $item + ['PROPERTIES' => []], $elements)
            );

            CIBlockElement::GetPropertyValuesArray($elementsWithProps, $iblockId, ['IBLOCK_ID' => $iblockId]);

            $this->calculatedValues[$iblockCode] = $this->calculateProperties($elementsWithProps);
        }
    }

    /**
     * @param array $elements
     * @return array
     */
    private function calculateProperties(array $elements): array
    {
        $properties = ['RATE', 'SUM_FROM', 'SUM_TO', 'PERIOD_FROM', 'PERIOD_TO'];
        $calculated = [];

        foreach ($elements as $item) {
            foreach ($properties as $property) {
                $value = $item['PROPERTIES'][$property]['VALUE'] ?? 0;
                if ($value && $property != 'RATE') {
                    $calculated[$property] = $property === 'SUM_FROM' || $property === 'PERIOD_FROM'
                        ? min($calculated[$property] ?? $value, $value)
                        : max($calculated[$property] ?? $value, $value);
                } elseif ($value && $property == 'RATE') {
                    $calculated['RATE_FROM'] = $calculated['RATE_FROM'] !== null
                        ? min($calculated['RATE_FROM'], $value)
                        : $value;

                    $calculated['RATE_TO'] = $calculated['RATE_TO'] !== null
                        ? max($calculated['RATE_TO'], $value)
                        : $value;
                }
            }
        }

        return $calculated;
    }
}
