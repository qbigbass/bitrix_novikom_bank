<?php

/*
 * Класс сделан по примеру Sprint\Editor\AdminBlocks\IblockElements;
 * Изменена выборка полей.
*/

namespace Galago\Classes;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use CIBlock;
use CModule;
use Sprint\Editor\Locale;

class CustomIblockElements
{
    private $enabledIblocks;
    private $selectedElements;
    private $iblockId;

    public function __construct()
    {
        CModule::IncludeModule('iblock');

        $this->enabledIblocks = !empty($_REQUEST['enabled_iblocks']) ? $_REQUEST['enabled_iblocks'] : [];
        $this->enabledIblocks = is_array($this->enabledIblocks) ? $this->enabledIblocks : [];

        $this->selectedElements = !empty($_REQUEST['element_ids']) ? $_REQUEST['element_ids'] : [];
        $this->selectedElements = is_array($this->selectedElements) ? $this->selectedElements : [];
        $this->selectedElements = array_map('intval', $this->selectedElements);
        $this->selectedElements = array_unique($this->selectedElements);

        $this->iblockId = !empty($_REQUEST['iblock_id']) ? intval($_REQUEST['iblock_id']) : 0;
    }

    public function execute()
    {
        $iblocksFilter = ['ACTIVE' => 'Y'];
        if (!empty($this->enabledIblocks)) {
            $iblocksFilter['=ID'] = $this->enabledIblocks;
        }

        $dbResult = CIblock::GetList(
            [
                'SORT' => 'ASC',
            ],
            $iblocksFilter
        );

        $iblocks = [];
        while ($aItem = $dbResult->Fetch()) {
            $iblocks[] = [
                'title' => Locale::truncateText($aItem['NAME']),
                'id'    => $aItem['ID'],
            ];
        }

        $elements = [];
        if ($this->iblockId > 0 && !empty($this->selectedElements)) {
            $dbRes = ElementTable::query()
                ->setSelect([
                    'ID',
                    'IBLOCK_ID',
                    'CODE',
                    'REF_TYPE_IBLOCK_CODE' => 'REF_TYPE_IBLOCK.IBLOCK_TYPE_ID',
                    'NAME',
                    'ACTIVE',
                    'SORT',
                ])
                ->setFilter([
                    'IBLOCK_ID' => $this->iblockId,
                    'ACTIVE'    => 'Y',
                    'ID'        => $this->selectedElements,
                ])
                ->setOrder([
                    'ID'=> 'DESC'
                ])
                ->registerRuntimeField(
                    'REF_TYPE_IBLOCK',
                    (new Reference(
                        'REF_TYPE_IBLOCK',
                        IblockTable::class,
                        Join::on('this.IBLOCK_ID', 'ref.ID')
                    ))->configureJoinType('left')
                )
                ->exec();

            $unsorted = [];
            while ($aItem = $dbRes->fetch()) {
                $unsorted[$aItem['ID']] = [
                    'title' => Locale::truncateText($aItem['NAME']),
                    'iblock_id' => $aItem['IBLOCK_ID'],
                    'iblock_type' => $aItem['REF_TYPE_IBLOCK_CODE'],
                    'code' => $aItem['CODE'],
                    'id' => $aItem['ID'],
                ];
            }

            foreach ($this->selectedElements as $id) {
                if (isset($unsorted[$id])) {
                    $elements[] = $unsorted[$id];
                }
            }
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode(
            Locale::convertToUtf8IfNeed(
                [
                    'iblocks'     => $iblocks,
                    'elements'    => $elements,
                    'iblock_id'   => $this->iblockId,
                    'element_ids' => $this->selectedElements,
                ]
            )
        );
    }
}
