<?php

namespace Dalee\Services;

class CacheHandler
{
    /**
     * @param $arFields
     * @return void
     */
    public static function onAfterIBlockElementUpdateHandler($arFields): void
    {
        global $DB, $CACHE_MANAGER;

        $sourceIBlockIds = [
            iblock('banking_support_options'),
            iblock('tabs')
        ];

        foreach ($sourceIBlockIds as $iblockId) {
            if ($arFields["IBLOCK_ID"] == $iblockId) {

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
    }
}
