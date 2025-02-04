<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */

use \Bitrix\Main\Data\Cache;
use \Bitrix\Main\Application;
use Bitrix\Iblock\Iblock as BitrixIblock;

$cache = Cache::createInstance();
$taggedCache = Application::getInstance()->getTaggedCache();

$cachePath = '/tabs';
$cacheTtl = $arParams["CACHE_TIME"];
$cacheKey = $arParams["CACHE_KEY"];
$arResult = [];

if ($cache->initCache($cacheTtl, $cacheKey, $cachePath)) {
    $arResult = $cache->getVars();
} elseif ($cache->startDataCache()) {
    if (!empty( $arParams["IBLOCK_ID"])) {
        $elementId = 0;
        $titleTab = "";
        $iblockId = $arParams["IBLOCK_ID"];
        $class = BitrixIblock::wakeUp($iblockId)->getEntityDataClass();
        $element = $class::getList([
            "select" => ["ID", "TABS_HEADING", "TABS.ELEMENT"],
            "filter" => [
                "ACTIVE" => "Y",
                "!IS_TAB.VALUE"=> false
            ],
        ])->fetchObject();

        if (!empty($element)) {
            $elementId = $element->getId();
            $titleTab = $element->getTabsHeading()->getValue();
            $tabElements = [];

            foreach ($element->getTabs()->getAll() as $tab) {
                $id = $tab->getElement()->getId();
                $tabElements[$id] = $id;
            }
        }

        if (!empty($tabElements)) {
            $arResult["ID"] = $elementId;
            $arResult["TITLE"] = $titleTab;
            $arResult["TABS"] = $tabElements;
        }
    }

    if (!empty($arResult)) {
        $taggedCache->startTagCache($cachePath);
        $taggedCache->registerTag('iblock_id_'.$arParams["IBLOCK_ID"]);
        $taggedCache->endTagCache();
        $cache->endDataCache($arResult);
    } else {
        $cache->abortDataCache();
    }
}

if (!empty($arResult)) {
    $this->includeComponentTemplate();
}
