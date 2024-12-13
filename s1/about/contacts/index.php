<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Контакты банка Новиком');
?>

<section class="banner-text bg-linear-blue border-0">
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-xxl-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="d-flex flex-column align-items-start gap-3 gap-md-4">

                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "",
                        [
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => 1
                        ]
                    );
                    ?>

                    <h1 class="banner-text__title dark-0 text-break"><?= $APPLICATION->GetTitle() ?></h1>
                </div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<section class="section-layout bg-dark-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="swiper js-slider-cards slider-cards"
                     data-slides-per-view="mobile-s:1,mobile:1,tablet:1,laptop:2,laptop-x:2"
                     data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "contacts",
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
                            "COL_COUNT" => "2",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => ["CODE", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", ""],
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => iblock('contacts_ru'),
                            "IBLOCK_TYPE" => "about_ru",
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
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => ["PHONE", ""],
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
                            "STRICT_SECTION_CHECK" => "N",
                        ],
                        false,
                        ['HIDE_ICONS' => 'Y']
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
