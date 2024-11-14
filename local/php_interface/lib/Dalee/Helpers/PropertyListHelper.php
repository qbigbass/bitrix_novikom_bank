<?php
namespace Dalee\Helpers;

use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;

class PropertyListHelper
{
    public function getPropertyListValues(int $iblockId, string $propertyCode): array
    {
        $rsEnum = PropertyEnumerationTable::getList([
            'filter' => [
                'PROPERTY_ID' => $this->getPropertyId($iblockId, $propertyCode)
            ]
        ])->fetchAll();

        return (!empty($rsEnum)) ? $rsEnum : [];
    }

    private function getPropertyId(int $iblockId, string $propertyCode): int
    {
        $rsProperty = PropertyTable::getList([
            'filter' => [
                'IBLOCK_ID' => $iblockId,
                'CODE' => $propertyCode
            ],
            'select' => ['ID'],
            'limit' => 1
        ])->fetch();

        return (!empty($rsProperty)) ? $rsProperty['ID'] : 0;
    }
}
