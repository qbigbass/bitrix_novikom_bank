<?php

namespace Dalee\Helpers;

use Bitrix\Iblock\Iblock;

class CardDetailPageHelper
{
    readonly string $name;
    readonly string $iconPath;
    private array $linkedSection;
    public static array $customerCategoriesSort = [
        'SORT_BY1' => 'SORT',
        'SORT_BY2' => 'ID',
        'SORT_ORDER1' => 'ASC',
        'SORT_ORDER2' => 'DESC',
    ];

    private function __construct(array $sectionData)
    {
        $this->name = $sectionData['NAME'];
        $this->iconPath = '/upload/' . $sectionData['ICON_SUBDIR'] . '/' . $sectionData['ICON_FILE_NAME'];
        $this->linkedSection = [
            'section_id' => $sectionData['SECTION_ID'],
            'iblock_id' => $sectionData['SECTION_IBLOCK_ID']
        ];
    }

    public static function pageInit(int $iblockId, string $elementCode): CardDetailPageHelper
    {
        $previewElementIblockClass = Iblock::wakeUp($iblockId)->getEntityDataClass();
        $sectionData = $previewElementIblockClass::getList([
            'select' => [
                'NAME',
                'ICON_SUBDIR' => 'ICON_DETAIL.FILE.SUBDIR',
                'ICON_FILE_NAME' => 'ICON_DETAIL.FILE.FILE_NAME',
                'SECTION_ID' => 'DETAIL_PAGES.SECTION.ID',
                'SECTION_IBLOCK_ID' => 'DETAIL_PAGES.SECTION.IBLOCK_ID'
            ],
            'filter' => [
                'CODE' => $elementCode,
            ],
            'limit' => 1
        ])->fetch();
        return new CardDetailPageHelper($sectionData);
    }

    public function fetchClientCategoryByCode(string $elementCode): array
    {
        $detailPagesIblockClass = Iblock::wakeUp($this->linkedSection['iblock_id'])->getEntityDataClass();
        return $detailPagesIblockClass::getList([
            'select' => [
                'ID',
                'CODE',
                'IBLOCK_ID',
            ],
            'filter' => [
                'IBLOCK_SECTION_ID' => $this->linkedSection['section_id'],
                'CODE' => $elementCode
            ],
            'limit' => 1
        ])->fetch();
    }

    public function fetchFirstClientCategory(): array
    {
        $detailPagesIblockClass = Iblock::wakeUp($this->linkedSection['iblock_id'])->getEntityDataClass();
        $result = $detailPagesIblockClass::getList([
            'select' => [
                'ID',
                'CODE',
                'IBLOCK_ID',
            ],
            'order' => $this->getSortOrder(),
            'filter' => [
                'IBLOCK_SECTION_ID' => $this->linkedSection['section_id'],
            ],
            'limit' => 1
        ])->fetch();

        return (!empty($result)) ? $result : [];
    }

    private function getSortOrder(): array
    {
        return [
            self::$customerCategoriesSort['SORT_BY1'] => self::$customerCategoriesSort['SORT_ORDER1'],
            self::$customerCategoriesSort['SORT_BY2'] => self::$customerCategoriesSort['SORT_ORDER2'],
        ];
    }
}
