<?php

namespace Dalee\Services;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\SystemException;
use CIBlockElement;
use COption;
use CSite;

/**
 * Менеджер плейсхолдеров для замены в контенте.<br><br>
 *
 * Паттерн создания плейсхолдеров для значений:<br><br>
 * #{product}&lowbar;{range}&lowbar;{property}|{code}|{currency}#<br><br>
 * {product} - loan, mortgage, deposit<br>
 * {range} - min, max<br>
 * {property} - sum, rate, term<br>
 * {code} - Символьный код продукта, к которому привязан элемент с данными из ИБ ставок<br>
 * {currency} - rub, usd, eur, cny<br><br>
 * Примеры:<br>
 * #loan_max_term|kredit-na-lyubye-tseli-dlya-strategicheskikh-klientov#<br>
 * #deposit_min_sum|do-vostrebovaniya|rub#<br><br>
 * Паттерн создания плейсхолдеров для таблиц:<br><br>
 * #{product}_table|{code}|{currency1},{currency2}...#<br><br>
 * Примеры для вывода таблицы по вкладам:<br>
 * #deposit_table|rante|rub,eur,usd#<br>
 * #deposit_table|do-vostrebovaniya|rub#<br><br>
 *
 * Используемые инфоблоки:
 * - loans_rates: Для работы с данными по кредитам.
 * - mortgage_rates: Для работы с данными по ипотеке.
 * - deposits_rates: Для работы с данными по вкладам.
 */
class RatesPlaceholderManager
{
    private array $calculatedValues = [
        'loans_rates' => [],
        'mortgage_rates' => [],
        'deposits_rates' => [],
    ];

    // Для поиска элементов в связанных со ставками ИБ и получения названий и ID
    private array $linkedIblocks = [
        'loans_rates' => 'loans',
        'mortgage_rates' => 'mortgage',
        'deposits_rates' => 'deposits',
    ];

    // Все привязанные к загруженным ставкам элементы с названиями и ID
    private array $linkedElements = [];

    // Для поиска блоков в контенте страницы и получения данных из связанных ИБ
    private array $entriesToProcess = [
        'loan' => 'loans_rates',
        'mortgage' => 'mortgage_rates',
        'deposit' => 'deposits_rates',
    ];

    private array $currencyCodes = [
        'rub' => [
            'Рубли [692]',
            'Рубли',
            'Рубль',
            'Руб.'
        ],
        'usd' => [
            'Доллары [693]',
            'Доллар',
            'Доллары',
            'Долл.'
        ],
        'eur' => [
            'Евро [694]',
            'Евро',
        ],
        'cny' => [
            'Юань [212212]',
            'Юань',
            'Юани',
        ]
    ];

    private array $currencyLetters = [
        'rub' => ' ₽',
        'usd' => ' $',
        'eur' => ' €',
        'cny' => ' ¥',
    ];

    /**
     * @param string $content
     * @return void
     */
    public static function handle(string &$content): void
    {
        global $APPLICATION;

        if ((mb_stripos($APPLICATION->GetCurDir(), '/bitrix/') !== false) || CSite::InDir('/local/php_interface/ajax/')) {
            return;
        }

        $instance = new self();

        $foundEntries = $instance->findUsedBlocks($content, $instance->entriesToProcess);

        foreach ($foundEntries as $entry) {
            try {
                $instance->getRates($instance->entriesToProcess[$entry], $instance->linkedIblocks[$instance->entriesToProcess[$entry]]);
            } catch (SystemException $e) {
                echo $e->getMessage();
                continue;
            }
        }

        $foundPlaceholders = $instance->fetchContentPlaceholders($content);
        $instance->replacePlaceholders($content, $foundPlaceholders);
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
     * @param string $iblockCode
     * @param string $linkedIblockCode
     * @return void
     * @throws SystemException
     */
    private function getRates(string $iblockCode, string $linkedIblockCode): void
    {
        if (empty($this->$iblockCode)) {
            $iblockId = iblock($iblockCode);

            $elements = ElementTable::getList([
                'filter' => [
                    'IBLOCK_ID' => $iblockId,
                ],
                'select' => ['ID', 'CODE'],
            ])->fetchAll();

            $elementsWithProps = array_combine(
                array_column($elements, 'ID'),
                array_map(fn($item) => $item + ['PROPERTIES' => []], $elements)
            );

            CIBlockElement::GetPropertyValuesArray($elementsWithProps, $iblockId, ['IBLOCK_ID' => $iblockId]);

            $linkedElements = $this->getLinkedElements($linkedIblockCode);
            $this->linkedElements = $this->linkedElements + $linkedElements;
            $this->calculatedValues[$iblockCode] = $this->calculateProperties($elementsWithProps, $linkedElements);
            $this->calculatedValues[$iblockCode]['allElements'] = $elementsWithProps;
        }
    }

    /**
     * @param string $iblockCode
     * @return array
     * @throws SystemException
     */
    private function getLinkedElements(string $iblockCode): array
    {
        $elements = ElementTable::getList([
            'filter' => [
                'IBLOCK_ID' => iblock($iblockCode),
            ],
            'select' => ['ID', 'CODE'],
        ])->fetchAll();

        return array_column($elements, 'CODE', 'ID');
    }

    /**
     * @param string $content
     * @return array
     */
    private function fetchContentPlaceholders(string $content): array
    {
        preg_match_all('/#(?<product>\w+)_(?<range>min|max)_(?<property>rate|sum|term)\|(?<code>[^#|]*)\|?(?<currency>\w+)?#/', $content, $matches, PREG_SET_ORDER);
        preg_match_all('/#(?<product>\w+)_table\|(?<code>[^|]+)\|(?<currencies>[^#]+)#/', $content, $matchesTable, PREG_SET_ORDER);

        if (!empty($matchesTable)) {
            foreach ($matchesTable as &$match) {
                $match['currencies'] = explode(',', $match['currencies']);
            }
        }

        $result = [];

        if (!empty($matches)) {
            $this->processRatesValuesMatches($matches, $result);
        }

        if (!empty($matchesTable)) {
            $this->processDepositTablesMatches($matchesTable, $result);
        }

        return $result;
    }

    /**
     * @param string $content
     * @param array $replacements
     * @return void
     */
    private function replacePlaceholders(string &$content, array $replacements): void
    {
        foreach ($replacements as $key => [$placeholder, $product, $range, $property, $code, $currency]) {
            if ($key != 'tables') {
                $value = $this->calculatedValues[$this->entriesToProcess[$product]][$code] ?? null;
                if (!empty($value)) {
                    $content = !empty($currency)
                        ? str_replace($placeholder, $value[$currency][$range . '_' . $property], $content)
                        : str_replace($placeholder, $value[$range . '_' . $property], $content);
                }
            }
        }
        foreach ($replacements['tables'] as [$placeholder, $product, $code, $currencies, $table]) {
            if (!empty($table)) {
                $content = str_replace($placeholder, $table, $content);
            }
        }
    }

    /**
     * @param array $elements
     * @param array $linkedElements
     * @return array
     */
    private function calculateProperties(array $elements, array $linkedElements): array
    {
        $properties = ['RATE', 'SUM_FROM', 'SUM_TO', 'PERIOD_FROM', 'PERIOD_TO'];
        $calculated = [];

        foreach ($elements as $item) {
            $code = strip_tags($linkedElements[$item['PROPERTIES']['LINK']['VALUE']]) ?? $item['CODE'];
            foreach ($properties as $property) {
                $value = $item['PROPERTIES'][$property]['VALUE'] ?? 0;
                $currency = !empty($item['PROPERTIES']['CURRENCY']['VALUE']) ? $this->currencyCode($item['PROPERTIES']['CURRENCY']['VALUE']) : null;

                $this->calculateValues($property, $value, $code, $currency, $calculated);
            }
        }

        return $calculated;
    }

    /**
     * @param string $property
     * @param string $value
     * @param string $code
     * @param string|null $currencyProperty
     * @param $calculated
     * @return void
     */
    private function calculateValues(string $property, string $value, string $code, ?string $currencyProperty, &$calculated): void
    {
        $mapping = [
            'PERIOD_FROM' => 'min_term',
            'PERIOD_TO' => 'max_term',
            'RATE' => [
                'min_rate',
                'max_rate',
            ],
            'SUM_FROM' => 'min_sum',
            'SUM_TO' => 'max_sum',
        ];

        if ($value && isset($mapping[$property])) {
            $mappedKeys = $mapping[$property];

            if (is_array($mappedKeys)) {
                foreach ($mappedKeys as $index => $key) {
                    $operation = $index === 0 ? 'min' : 'max'; // Первый ключ — min, второй — max
                    $this->calculatedValue($currencyProperty, $key, $code, $value, $operation, $calculated);

                }
            } else {
                $key = $mappedKeys;
                $operation = str_contains($property, '_FROM') ? 'min' : 'max';
                $this->calculatedValue($currencyProperty, $key, $code, $value, $operation, $calculated);
            }
        }
    }

    /**
     * @param string|null $currencyProperty
     * @param string $key
     * @param string $code
     * @param string $value
     * @param string $operation
     * @param $calculated
     * @return void
     */
    private function calculatedValue(?string $currencyProperty, string $key, string $code, string $value, string $operation, &$calculated): void
    {
        $currentValue = $currencyProperty
            ? ($calculated[$code][$currencyProperty][$key] ?? $value)
            : ($calculated[$code][$key] ?? $value);

        $newValue = $operation === 'min' ? min($currentValue, $value) : max($currentValue, $value);

        if ($currencyProperty) {
            $calculated[$code][$currencyProperty][$key] = $newValue;
        } else {
            $calculated[$code][$key] = $newValue;
        }
    }

    /**
     * @param array $matches
     * @param array $result
     * @return void
     */
    private function processRatesValuesMatches(array $matches, array &$result): void
    {
        $result = array_merge($result, array_map(function ($match) {
            return [
                $match[0],
                $match['product'],
                $match['range'],
                $match['property'],
                $match['code'] ?? null,
                $match['currency'] ?? null,
            ];
        }, $matches));
    }

    /**
     * @param array $matches
     * @param array $result
     * @return void
     */
    private function processDepositTablesMatches(array $matches, array &$result): void
    {
        $result['tables'] = [];
        $result['tables'] = array_merge($result['tables'], array_map(function ($match) {
            $elements = [];
            foreach ($this->calculatedValues['deposits_rates']['allElements'] as $element) {
                if (!empty($element['PROPERTIES']['LINK']['VALUE']) && $element['PROPERTIES']['LINK']['VALUE'] == array_flip($this->linkedElements)[$match['code']]) {
                    $elements[] = $element;
                }
            }
            $table = '';
            foreach ($match['currencies'] as $currency) {
                $table .= $this->generateRatesTableHTML(UF_KEY_RATE, $elements, $currency);
            }
            return [
                $match[0],
                $match['product'],
                $match['code'] ?? null,
                $match['currencies'] ?? null,
                $table,
            ];
        }, $matches));
    }

    /**
     * @param float $keyRate
     * @param array $loadedElements
     * @param string $currency
     * @return string
     */
    public function generateRatesTableHTML(float $keyRate, array $loadedElements, string $currency): string
    {
        $ratesData = $this->processTableElementsData($keyRate, $loadedElements, $currency);

        if (empty($ratesData)) {
            return '';
        }

        $currencyLetter = $this->currencyLetter($currency);

        $html = '
                <div class="overflow-auto custom-overflow-scrollbar">
                    <table class="table table-borderless m-0">
                        <caption class="dark-70 pt-4 text-s mb-0">КС – ключевая ставка Банка России</caption>
                        <thead>
                        <tr class="border-bottom-dashed">
                            <th class="text-nowrap fs-2 lh-base dark-70 fw-semibold py-4 px-0" scope="col" style="min-width: 140px">Срок вклада</th>
        ';

        // Заголовки для сроков
        $periods = array_keys(current($ratesData));
        foreach ($periods as $period) {
            $html .= '<th class="text-nowrap fs-2 lh-base dark-70 fw-semibold py-4 px-0" scope="col" style="min-width: 140px">' . $period . ' дней</th>';
        }
        $html .= '</tr></thead><tbody>';

        // Построение строк таблицы по суммам
        foreach ($ratesData as $sumFrom => $periodRates) {
            $html .= '<tr class="border-bottom-dashed">
                        <td class="w-auto text-l dark-70 py-4 px-0" style="min-width: 140px">от ' . number_format((float)$sumFrom, 0, '', ' ') . $currencyLetter . '</td>';
            foreach ($periods as $period) {
                $html .= '<td class="w-auto text-l dark-70 py-4 px-0" style="min-width: 140px">' . ($periodRates[$period] ?? 'КС') . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table></div>';
        return $html;
    }

    /**
     * @param float $keyRate
     * @param array $loadedElements
     * @param string $currency
     * @return array
     */
    private function processTableElementsData(float $keyRate, array $loadedElements, string $currency): array
    {
        $ratesData = [];

        foreach ($loadedElements as $element) {

            if (
                empty($element['PROPERTIES']['SUM_FROM']['VALUE'])
                || empty($element['PROPERTIES']['PERIOD_FROM']['VALUE'])
                || empty($element['PROPERTIES']['RATE']['VALUE'])
                || empty($currency)
            ) {
                continue;
            }

            if (in_array($element['PROPERTIES']['CURRENCY']['VALUE'], $this->currencyCodes[$currency])) {
                $sumFrom = $element['PROPERTIES']['SUM_FROM']['VALUE'];
                $period = $element['PROPERTIES']['PERIOD_FROM']['VALUE'];
                $rate = $element['PROPERTIES']['RATE']['VALUE'];
                $effectiveRate = $element['PROPERTIES']['EFFECTIVE_RATE']['VALUE'];

                if (empty($effectiveRate)) {
                    // Расчёт надбавки относительно ключевой ставки
                    $rateDiff = $rate - $keyRate;
                    $rateText = $rateDiff ? ($rateDiff > 0 ? '+' : '') . number_format($rateDiff, 1) . '%' : '';

                    // Группируем по диапазонам сумм и срокам
                    $ratesData[$sumFrom][$period] = 'КС ' . $rateText;
                } else {
                    $ratesData[$sumFrom][$period] = $rate . '/' . $effectiveRate;
                }
            }
        }

        $ratesData = array_map(function ($periodRates) {
            ksort($periodRates);
            return $periodRates;
        }, $ratesData);

        ksort($ratesData);

        return $ratesData;
    }

    /**
     * @param string $value
     * @return string|null
     */
    private function currencyCode(string $value): ?string
    {
        foreach ($this->currencyCodes as $key => $values) {
            if (in_array($value, $values, true)) {
                return $key;
            }
        }
        return null;
    }

    /**
     * @param string $currency
     * @return string
     */
    private function currencyLetter(string $currency): string
    {
        return $this->currencyLetters[$currency] ?? '';
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->calculatedValues;
    }
}
