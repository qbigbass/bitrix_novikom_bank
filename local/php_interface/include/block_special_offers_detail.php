<?php
/** @var array $arParams */
/** @global CMain $APPLICATION */

use Bitrix\Iblock\Model\Section;

/*
 * Блок "Спецпредложения" на странице раздела
 */
global $APPLICATION;
$sectionCode = $GLOBALS["PARENT_SECTION_CODE"] ?: 'private';

$specialOffersFilter = [
    "!UF_SHOW_SPECIAL_DETAIL" => false,
    "ACTIVE" => "Y",
    "CODE" => $sectionCode
];

$iblock = iblock('special_offers_ru');
$entity = Section::compileEntityByIblock($iblock);
$rsSections = $entity::getList([
    "select" => ["ID"],
    "filter" => $specialOffersFilter,
    "order" => ["SORT" => "ASC"],
])->fetchAll();

if (!empty($rsSections)) : ?>
    <section class="section-layout bg-blue-10">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between px-lg-6 mb-6 mb-lg-7">
                <h3>Спецпредложения</h3>
                <a class="btn btn-sm btn-link btn-icon d-none d-md-inline-flex" href="/special-offers/">
                    Смотреть все
                    <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                    </svg>
                </a>
            </div>
            <div class="row">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "special_offers",
                    [
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => [],
                        "FILTER_NAME" => "specialOffersFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => iblock("special_offers_ru"),
                        "IBLOCK_TYPE" => "for_private_clients_ru",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => $sectionCode,
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => ["PUBLICATION_DATE"],
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    ],
                    false
                );
                ?>
            </div>
        </div>
    </section>
<? endif; ?>
