<?php
/**
 * @note Класс получает данные по ставкам для выбранных элементов ИБ
 * @note Используется для подготовки данных для вывода в списке и карточке
 */

namespace Lib\Classes;

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
            return [
                'RATE' => isset($carry['RATE']) ? min((float)$carry['RATE'], (float)$item['RATE_']) : (float)$item['RATE_'],
                'SUM_FROM' => isset($carry['SUM_FROM']) ? min($carry['SUM_FROM'], $item['SUM_FROM_']) : $item['SUM_FROM_'],
                'SUM_TO' => isset($carry['SUM_TO']) ? max($carry['SUM_TO'], $item['SUM_TO_']) : $item['SUM_TO_'],
                'PERIOD_FROM' => isset($carry['PERIOD_FROM']) ? min($carry['PERIOD_FROM'], $item['PERIOD_FROM_']) : $item['PERIOD_FROM_'],
                'PERIOD_TO' => isset($carry['PERIOD_TO']) ? max($carry['PERIOD_TO'], $item['PERIOD_TO_']) : $item['PERIOD_TO_'],
            ];
        }, []);
    }

    /**
     * @param array $values
     * @return array
     */
    public function calculatePSK(array $values): array
    {
        // Преобразование процентной ставки в дробное значение и расчет месячной ставки
        $monthlyRate = $values['RATE'] / 100 / 12;

        // Расчет ПСК для минимальной суммы кредита
        $minMonthlyPayment = $this->calculateMonthlyPayment($values['SUM_FROM'], $monthlyRate, $values['PERIOD_FROM']);
        $minTotalPayment = $minMonthlyPayment * $values['PERIOD_FROM'];
        $minPSK = (($minTotalPayment - $values['SUM_FROM']) / $values['SUM_FROM']) * 100;

        // Расчет ПСК для максимальной суммы кредита
        $maxMonthlyPayment = $this->calculateMonthlyPayment($values['SUM_TO'], $monthlyRate, $values['PERIOD_FROM']);
        $maxTotalPayment = $maxMonthlyPayment * $values['PERIOD_FROM'];
        $maxPSK = (($maxTotalPayment - $values['SUM_TO']) / $values['SUM_TO']) * 100;

        return [
            'minPSK' => floor($minPSK),
            'maxPSK' => floor($maxPSK),
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

