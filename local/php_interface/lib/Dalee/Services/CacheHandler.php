<?php

namespace Dalee\Services;

use CPHPCache;

class CacheHandler
{
    /**
     * @param $arFields
     * @return void
     */
    public static function clearCache($arFields): void
    {
        $sourceIBlockIds = [
            iblock('banking_support_options'),
            iblock('tabs')
        ];

        $obCache = new CPHPCache();

        foreach ($sourceIBlockIds as $iblockId) {
            if ($arFields["IBLOCK_ID"] == $iblockId) {
                $obCache->CleanDir();
            }
        }
    }
}
