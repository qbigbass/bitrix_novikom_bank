<?php

namespace Dalee\Services;

use Bitrix\Main\Loader;
use CIBlockElement;
use Dalee\Helpers\IblockHelper;

class OfficesService
{
    protected int $iblockId;

    public function __construct()
    {
        Loader::includeModule('iblock');

        $this->iblockId = iblock('offices');
    }

    public function fetchOffices(string $type): array
    {
        $result = IblockHelper::getElementsWithProperties(
            [
                'NAME' => 'ASC',
                'SORT' => 'ASC',
            ],
            [
                'IBLOCK_ID' => $this->iblockId,
                'ACTIVE' => 'Y',
                'SECTION_CODE' => $type,
            ],
            false,
            [
                'nPageSize' => 3000,
            ]
        );

        $items = [];
        foreach ($result['items'] as $item) {
            $items[] = [
                'id'            => (int)$item['ID'],
                'name'          => $item['NAME'],
                'url'           => $item['DETAIL_PAGE_URL'],
                'address'       => $item['PROPERTIES']['ADDRESS']['VALUE'],
                'coords'        => array_map('floatval', explode(',', $item['PROPERTIES']['COORDS']['VALUE'])),
                'type'          => $item['PROPERTIES']['TYPE']['VALUE_XML_ID'],
                'services'      => !empty($item['PROPERTIES']['SERVICES']['VALUE_XML_ID']) ? $item['PROPERTIES']['SERVICES']['VALUE_XML_ID'] : [],
                'corporate'     => $item['PROPERTIES']['CORPORATE']['VALUE_XML_ID'] === 'Y',
                'individual'    => $item['PROPERTIES']['INDIVIDUAL']['VALUE_XML_ID'] === 'Y',
                'freeAccess'    => $item['PROPERTIES']['FREE_ACCESS']['VALUE_XML_ID'] === 'Y',
                'currency' => [
                    'in'        => $item['PROPERTIES']['CURRENCY_IN']['VALUE_XML_ID'] ?: [],
                    'out'       => $item['PROPERTIES']['CURRENCY_OUT']['VALUE_XML_ID'] ?: [],
                ],
            ];
        }

        $services = $this->fetchServices();

        return [
            'services' => $services,
            'items' => $items,
        ];
    }

    protected function fetchServices(): array
    {
        $result = [];
        $res = IblockHelper::getPropertyEnumList($this->iblockId, 'SERVICES');
        foreach ($res as $item) {
            $result[$item['XML_ID']] = $item['VALUE'];
        }
        return $result;
    }
}
