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
     * @param int|array $elementIds
     * @return void
     */
    public function fetchRates(int|array $elementIds): void
    {
        try {
            $dataClass = $this->getDataClass($this->iblockId);
            $properties = $this->getProperties($this->iblockId);

            $data = [
                'order' => ['SORT' => 'ASC'],
                'filter' => ['LINK.ELEMENT.ID' => $elementIds],
                'select' => $properties
            ];

            $this->loadedElements = $dataClass::getList($data)->fetchAll();

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
            'filter' => ['IBLOCK_ID' => $iblockId],
            'select' => ['CODE', 'PROPERTY_TYPE']
        ];

        $properties = PropertyTable::getList($data)->fetchCollection();

        foreach ($properties as $property) {
            $type = $property->getPropertyType();

            $value = $this->propertySuffixes[$type] ?? 'VALUE';

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
            if ($item['PERIOD_FROM_'] != 0) {
                $carry['PERIOD_FROM'] = isset($carry['PERIOD_FROM']) ? min($carry['PERIOD_FROM'], $item['PERIOD_FROM_']) : $item['PERIOD_FROM_'];
            }
            if ($item['PERIOD_TO_'] != 0) {
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
        $monthlyRate = $values['RATE'] / 100 / 12;

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
}

