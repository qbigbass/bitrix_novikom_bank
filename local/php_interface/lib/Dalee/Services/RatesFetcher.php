<?php
/**
 * @note Класс получает данные по ставкам для выбранных элементов ИБ
 * @note Используется для подготовки данных для вывода в списке и карточке
 */

namespace Dalee\Services;

use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\ORM\CommonElementTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Bitrix\Iblock\PropertyEnumerationTable;

class RatesFetcher
{
    private int $iblockId;
    private array $propertyTypes = [
        'E' => 'ELEMENT',
        'F' => 'FILE',
        'L' => 'ITEM',
        'G' => 'SECTION'
    ];
    private array $propertySuffixes = [
        'E' => '.ID',
        'L' => '.VALUE'
    ];
    private array $loadedElements = [];

    public function __construct(int $iblockId)
    {
        $this->iblockId = $iblockId;
    }

    /**
     * @param int|array|null $elementIds
     * @return void
     */
    public function fetchRates(int|array|null $elementIds): void
    {
        try {
            $dataClass = $this->getDataClass($this->iblockId);
            $properties = $this->getProperties($this->iblockId);
            $properties[] = 'NAME';

            $data = [
                'order' => ['SORT' => 'ASC'],
                'select' => $properties,
                'filter' => ['ACTIVE' => 'Y']
            ];

            if (!empty($elementIds) && isset($properties['LINK_'])) {
                $data['filter']['LINK.ELEMENT.ID'] = $elementIds;
            }

            if (isset($properties['LINK_']) && !isset($properties['BORROWER_TYPE_'])) {
                // Только для вкладов
                $data['select']['INTEREST_PAYMENT_'] = 'LINK.ELEMENT.INTEREST_PAYMENT.VALUE';
            } elseif (isset($properties['LINK_'], $properties['BORROWER_TYPE_'])) {
                // Для кредитов и ипотек
                $data['select']['TOTAL_COST_CREDIT_RANGE_'] = 'LINK.ELEMENT.TOTAL_COST_CREDIT_RANGE.VALUE';
            }
            
            $this->loadedElements = $dataClass::getList($data)->fetchAll();

            $arrInterestIds = [];
            $arrInterestValueEnum = [];

            if (!empty($this->loadedElements)) {
                foreach ($this->loadedElements as $element) {
                    if (!empty($element['INTEREST_PAYMENT_'])) {
                        $arrInterestIds[$element['INTEREST_PAYMENT_']] = $element['INTEREST_PAYMENT_'];
                    }
                }
            }

            if (!empty($arrInterestIds)) {
                $arInterestPropEnum = PropertyEnumerationTable::getList([
                    'filter' => ['ID' => $arrInterestIds],
                ])->fetchAll();

                if (!empty($arInterestPropEnum)) {
                    foreach ($arInterestPropEnum as $arValue) {
                        $arrInterestValueEnum[$arValue['ID']] = $arValue['VALUE'];
                    }
                }
            }

            if (!empty($arrInterestValueEnum)) {
                foreach ($this->loadedElements as &$element) {
                    if (!empty($element['INTEREST_PAYMENT_'])) {
                        $element['INTEREST_PAYMENT_'] = $arrInterestValueEnum[$element['INTEREST_PAYMENT_']];
                    }
                }
            }
        } catch (SystemException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $iblockId
     * @return string|CommonElementTable
     */
    private function getDataClass(int $iblockId): string|CommonElementTable
    {
        return Iblock::wakeUp($iblockId)->getEntityDataClass();
    }

    /**
     * @param int $iblockId
     * @return array|null
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getProperties(int $iblockId): ?array
    {
        $result = [];
        $data = [
            'order' => ['SORT' => 'ASC'],
            'filter' => ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
            'select' => ['CODE', 'PROPERTY_TYPE']
        ];
        $properties = PropertyTable::getList($data)->fetchCollection();

        foreach ($properties as $property) {
            $type = $property->getPropertyType();
            $value = $this->propertySuffixes[$type] ?? 'VALUE';

            if ($property->getCode() === 'BORROWER_TYPE') {
                $value = '.NAME';
            }

            $result['CODES'][] = $property->getCode() . '_';
            $result['SELECT'][] = $property->getCode() . '.' . $this->propertyTypes[$type] . $value;
        }

        return array_combine($result['CODES'], $result['SELECT']);
    }

    /**
     * Выводит данные для всех переданных ID элементов.
     *
     * @return array
     */
    public function getElements(): array
    {
        return $this->loadedElements;
    }

    /**
     * Выводит данные для конкретного ID элемента.
     *
     * @param int $id
     * @return array
     */
    public function getFilterElements(int $id): array
    {
        return array_filter($this->loadedElements, function ($rate) use ($id) {
            return $rate['LINK_'] == $id;
        });
    }

    /**
     * @param int $id
     * @return array
     */
    public function getResultArrayCalculatedFromToValues(int $id): array
    {
        $elements = $this->getFilterElements($id);

        return array_reduce($elements, function ($carry, $item) {
            if ($item['RATE_'] != 0) {
                $carry['RATE_FROM'] = isset($carry['RATE_FROM']) ? min((float)$carry['RATE_FROM'], (float)$item['RATE_']) : (float)$item['RATE_'];
                $carry['RATE_TO'] = isset($carry['RATE_TO']) ? max((float)$carry['RATE_TO'], (float)$item['RATE_']) : (float)$item['RATE_'];
            }
            if ($item['SUM_FROM_'] != 0) {
                $carry['SUM_FROM'] = isset($carry['SUM_FROM']) ? min($carry['SUM_FROM'], $item['SUM_FROM_']) : $item['SUM_FROM_'];
            }
            if ($item['SUM_TO_'] != 0) {
                $carry['SUM_TO'] = isset($carry['SUM_TO']) ? max($carry['SUM_TO'], $item['SUM_TO_']) : $item['SUM_TO_'];
            }

            if (isset($carry['PERIOD_FROM']) && !is_numeric($carry['PERIOD_FROM'])) {
                // Если в PERIOD_FROM уже текст, ничего не менять
            } elseif (!is_numeric($item['PERIOD_FROM_'])) {
                $carry['PERIOD_FROM'] = $item['PERIOD_FROM_'];
            } elseif ($item['PERIOD_FROM_'] != 0) {
                $carry['PERIOD_FROM'] = isset($carry['PERIOD_FROM']) ? min($carry['PERIOD_FROM'], $item['PERIOD_FROM_']) : $item['PERIOD_FROM_'];
            }

            if (isset($carry['PERIOD_TO']) && !is_numeric($carry['PERIOD_TO'])) {
                // Если в PERIOD_TO уже текст, ничего не менять
            } elseif (!is_numeric($item['PERIOD_TO_'])) {
                $carry['PERIOD_TO'] = $item['PERIOD_TO_'];
            } elseif ($item['PERIOD_TO_'] != 0) {
                $carry['PERIOD_TO'] = isset($carry['PERIOD_TO']) ? max($carry['PERIOD_TO'], $item['PERIOD_TO_']) : $item['PERIOD_TO_'];
            }

            return $carry;
        }, []);
    }

    /**
     * @param array $values
     * @return array|null
     */
    public function calculatePSK(array $values): ?array
    {
        if (empty($values) || $values['SUM_FROM'] == 0 || $values['SUM_TO'] == 0) {
            return null;
        }

        // Преобразование процентной ставки в дробное значение и расчет месячной ставки
        $monthlyRate = $values['RATE_FROM'] / 100 / 12;

        // Расчет ПСК для минимальной суммы кредита
        $minMonthlyPayment = $this->calculateMonthlyPayment($values['SUM_FROM'], $monthlyRate, $values['PERIOD_FROM']);
        $minTotalPayment = $minMonthlyPayment * $values['PERIOD_FROM'];
        $minPSK = (($minTotalPayment - $values['SUM_FROM']) / $values['SUM_FROM']) * 100;

        // Расчет ПСК для максимальной суммы кредита
        $maxMonthlyPayment = $this->calculateMonthlyPayment($values['SUM_TO'], $monthlyRate, $values['PERIOD_FROM']);
        $maxTotalPayment = $maxMonthlyPayment * $values['PERIOD_FROM'];
        $maxPSK = (($maxTotalPayment - $values['SUM_FROM']) / $values['SUM_TO']) * 100;

        return [
            'minPSK' => number_format($minPSK / 12, 3, '.', ' '),
            'maxPSK' => number_format($maxPSK / 12, 3, '.', ' '),
        ];
    }

    /**
     * @param $sum
     * @param $rate
     * @param $period
     * @return float|int
     */
    private function calculateMonthlyPayment($sum, $rate, $period): float|int
    {
        if ($period == 0) {
            return 0;
        }

        return ($sum * $rate * pow(1 + $rate, $period)) / (pow(1 + $rate, $period) - 1);
    }

    /**
     * @param float $keyRate
     * @return string
     */
    public function generateRatesTableHTML(float $keyRate): string
    {
        $ratesData = [];

        foreach ($this->loadedElements as $element) {

            if (empty($element['SUM_FROM_']) || empty($element['PERIOD_FROM_']) || empty($element['RATE_'])) {
                continue;
            }

            $sumFrom = $element['SUM_FROM_'];
            $period = $element['PERIOD_FROM_'];
            $rate = $element['RATE_'];

            // Расчёт надбавки относительно ключевой ставки
            $rateDiff = $rate - $keyRate;
            $rateText = $rateDiff ? ($rateDiff > 0 ? '+' : '') . number_format($rateDiff, 1) . '%' : '';

            // Группируем по диапазонам сумм и срокам
            $ratesData[$sumFrom][$period] = 'КС ' . $rateText;
        }

        $ratesData = array_map(function ($periodRates) {
            ksort($periodRates);
            return $periodRates;
        }, $ratesData);

        ksort($ratesData);

        $html = '
            <div class="d-flex flex-column gap-6 gap-md-9 mt-4 mt-md-6 mt-lg-7">
                <div class="overflow-auto custom-overflow-scrollbar">
                    <table class="table table-borderless m-0">
                        <caption class="dark-70 pt-4 text-s mb-0">КС – ключевая ставка Банка России</caption>
                        <thead>
                        <tr class="border-bottom-dashed">
                            <th class="text-nowrap fs-2 lh-base dark-70 fw-semibold py-4 px-0" scope="col" style="min-width: 140px">Срок вклада</th><i></i>
        ';

        // Заголовки для сроков
        $periods = array_keys(current($ratesData));
        foreach ($periods as $period) {
            $html .= '<th class="text-nowrap fs-2 lh-base dark-70 fw-semibold py-4 px-0" scope="col" style="min-width: 140px">' . $period . ' дней</th><i></i>';
        }
        $html .= '</tr></thead><tbody>';

        // Построение строк таблицы по суммам
        foreach ($ratesData as $sumFrom => $periodRates) {
            $html .= '<tr class="border-bottom-dashed">
                        <td class="w-auto text-l dark-70 py-4 px-0" style="min-width: 140px">от ' . number_format((float)$sumFrom, 0, '', ' ') . ' ₽</td>';
            foreach ($periods as $period) {
                $html .= '<td class="w-auto text-l dark-70 py-4 px-0" style="min-width: 140px">' . ($periodRates[$period] ?? 'КС') . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table></div></div>';
        return $html;
    }
}

