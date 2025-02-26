<?
use Dalee\Helpers\IblockHelper;

/*
 * Блок "Новости" на странице раздела
 */
global $APPLICATION;
$sectionCode = $GLOBALS["PARENT_SECTION_CODE"] ?: 'news';

$filter = [
    "!UF_SHOW_NEWS_SECTION" => false,
];
$newsIds = IblockHelper::getIblockSectionElementsIds('press_center_ru', $sectionCode, $filter);

if (!empty($newsIds)) {
    $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php',
        ['IDS' => $newsIds]
    );
}
?>
