<?php
namespace Dalee\Services;

use Bitrix\Iblock\Iblock;
use Dalee\Helpers\PropertyListHelper;

class ProgramBonusesService
{
    private array $propertyCardTypeList;
    private array $propertyCardCategoryList;
    private array $bonusesRates;

    private function __construct(PropertyListHelper $helper)
    {
        $iblockId = iblock('program_bonuses_rates_ru');
        $this->propertyCardTypeList = $helper->getPropertyListValues($iblockId, 'CARD_TYPE');
        $this->propertyCardCategoryList = $helper->getPropertyListValues($iblockId, 'CARD_CATEGORY');
        $this->bonusesRates = $this->getBonusesRatesByGroup($iblockId);
    }

    private function getBonusesRatesByGroup(int $iblockId): array
    {
        $bonusesRates = $this->fetchBonusesRates($iblockId);
        return $this->groupByTypeAndCategory($bonusesRates);
    }

    private function fetchBonusesRates(int $iblockId): array
    {
        $programBonusesIblockClass = Iblock::wakeUp($iblockId)->getEntityDataClass();
        return $programBonusesIblockClass::getList([
            'select' => [
                'CARD_TYPE_ID' => 'CARD_TYPE.ITEM.ID',
                'CARD_CATEGORY_ID' => 'CARD_CATEGORY.ITEM.ID',
                'RATE_UP_TO_5K_VALUE' => 'RATE_UP_TO_5K.IBLOCK_GENERIC_VALUE',
                'RATE_UP_TO_15K_VALUE' => 'RATE_UP_TO_15K.IBLOCK_GENERIC_VALUE',
                'RATE_UP_TO_75K_VALUE' => 'RATE_UP_TO_75K.IBLOCK_GENERIC_VALUE',
                'RATE_UP_FROM_75K_VALUE' => 'RATE_UP_FROM_75K.IBLOCK_GENERIC_VALUE',
                'MAX_SUM_IN_MONTH_VALUE' => 'MAX_SUM_IN_MONTH.IBLOCK_GENERIC_VALUE',
                'HELLO_BONUS_VALUE' => 'VALUE_HELLO_BONUS.IBLOCK_GENERIC_VALUE',
            ]
        ])->fetchAll();
    }

    private function groupByTypeAndCategory(array $bonusesRates): array
    {
        $newBonusesRates = [];
        foreach ($bonusesRates as $rate) {
            $cardTypeId = $rate['CARD_TYPE_ID'];
            $cardCategoryId = $rate['CARD_CATEGORY_ID'];
            $newBonusesRates[$cardTypeId][$cardCategoryId] = $rate;
        }

        return $newBonusesRates;
    }

    public static function fetch(): ProgramBonusesService
    {
        return new ProgramBonusesService(
            new PropertyListHelper()
        );
    }

    public function getCardTypes(): array
    {
        return $this->propertyCardTypeList;
    }

    public function getCardCategories(): array
    {
        return $this->propertyCardCategoryList;
    }

    public function getRates(): array
    {
        return $this->bonusesRates;
    }

    public function getAll(): array
    {
        return [
            'card_type_list' => $this->getCardTypes(),
            'card_category_list' => $this->getCardCategories(),
            'bonuses_rates' => $this->getRates(),
        ];
    }
}
