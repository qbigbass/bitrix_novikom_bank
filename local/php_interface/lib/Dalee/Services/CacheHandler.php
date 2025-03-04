<?php

namespace Dalee\Services;

class CacheHandler
{
    /** @var array Хранит обработанные инфоблоки для предотвращения зацикливания */
    private static array $processedIblocks = [];

    /**
     * @param array $arFields
     * @return void
     */
    public static function onAfterIBlockElementUpdateHandler(array $arFields): void
    {
        global $DB;

        $iblockId = (int)($arFields['IBLOCK_ID'] ?? 0);
        if ($iblockId === 0 || in_array($iblockId, self::$processedIblocks, true)) {
            return;
        }
        self::$processedIblocks[] = $arFields['IBLOCK_ID'];

        $res = $DB->Query(
            "SELECT IBLOCK_ID FROM b_iblock_property WHERE LINK_IBLOCK_ID = " . $iblockId
        );

        while ($row = $res->Fetch()) {
            $linkedIblockId = (int)$row['IBLOCK_ID'];
            self::cacheClear($linkedIblockId);
            self::onAfterIBlockElementUpdateHandler(['IBLOCK_ID' => $linkedIblockId]);
        }
    }

    /**
     * @param int $iblockId
     * @return void
     */
    private static function cacheClear(int $iblockId): void
    {
        global $CACHE_MANAGER;
        $CACHE_MANAGER->ClearByTag('iblock_id_' . $iblockId);
    }
}
