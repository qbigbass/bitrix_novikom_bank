<?php

namespace Sprint\Migration;

use Bitrix\Iblock\PropertyTable;
use Bitrix\Main\Loader;

/**
 * DNVKBSITE-163 Выставляем обязательные свойства для ИБ ставок
 */
class Version20250211103135 extends Version
{
    /** @var array Массив вида [ID ИБ]=>[Коды свойств] */
    private const PROP_CODES = [
        '132' => [
            'PERIOD_TO', // Макс срок кредита
            'PERIOD_FROM', //М ин срок кредита
            'MIN_DOWN_PAYMENT', // Мин. первый взнос (%)
            'OBJECT', // Объект
            'REGION', // Регион
            'RATE', // Ставка
            'SUM_FROM', // Макс. сумма кредита
            'SUM_TO', // Мин. сумма кредита
        ],
        '133' => [
            'PERIOD_TO', // Срок до
            'PERIOD_FROM', // Срок от
            'RATE', // Ставка
            'SUM_FROM', // Сумма от
            'SUM_TO', // Сумма до
            'CURRENCY', // Валюта
        ],
        '131' => [
            'PERIOD_TO', // Срок до
            'PERIOD_FROM', // Срок от
            'RATE', // Ставка
            'SUM_FROM', // Сумма от
            'SUM_TO', // Сумма до
        ]
    ];

    protected $author = "m-home-activity--swiper";
    protected $description = "DNVKBSITE-163";
    protected $moduleVersion = "4.15.1";

    public function up(): void
    {
        Loader::includeModule('iblock');
        foreach (self::PROP_CODES as $iblockId => $properties) {
            $propertiesRes = PropertyTable::getList([
                'filter' => [
                    'CODE' => $properties,
                    'IBLOCK_ID' => $iblockId
                ],
                'select' => ['ID']
            ]);
            while ($property = $propertiesRes->fetch()) {
                $this->setPropsRequired($property['ID']);
            }
        }
    }

    /**
     * Устанавливаем флаг "Обяз." для свойства
     *
     * @param int $propertyId
     * @param string $isRequired
     * @return void
     */
    private function setPropsRequired(int $propertyId, string $isRequired = 'Y'): void
    {
        PropertyTable::update($propertyId, ['IS_REQUIRED' => $isRequired]);
    }

    public function down(): void
    {
        Loader::includeModule('iblock');
        foreach (self::PROP_CODES as $iblockId => $properties) {
            $propertiesRes = PropertyTable::getList([
                'filter' => [
                    'CODE' => $properties,
                    'IBLOCK_ID' => $iblockId
                ],
                'select' => ['ID']
            ]);
            while ($property = $propertiesRes->fetch()) {
                $this->setPropsRequired($property['ID'], 'N');
            }
        }
    }

}
