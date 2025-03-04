<?php

namespace Dalee\Services;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class CacheHandler
{
    /**
     * @param $arFields
     * @return void
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function onAfterIBlockElementUpdateHandler($arFields): void
    {
        global $DB, $CACHE_MANAGER;

        $res = $DB->Query(
            "SELECT IBLOCK_ID FROM b_iblock_property WHERE LINK_IBLOCK_ID = " . $DB->ForSql(
                $arFields['IBLOCK_ID']
            )
        );

        while ($row = $res->Fetch()) {
            $CACHE_MANAGER->ClearByTag('iblock_id_' . $row['IBLOCK_ID']);
        }
    }
}
