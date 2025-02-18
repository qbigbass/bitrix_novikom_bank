<?php

namespace Dalee\Helpers;

use CBitrixComponent;
use CFile;

class HeaderView
{
    private ?ComponentHelper $helper;

    public function __construct(?CBitrixComponent $component = null)
    {
        if (!empty($component)) {
            $this->helper = new ComponentHelper($component);
        }
    }

    public function render(
        string $title,
        ?string $description = null,
        ?array $additionalClasses = null,
        ?int $chainDepth = 0,
        ?array $arResult = null,
        ?array $terms = null,
        ?string $termsHtml = null,
        ?string $headerHtml = null,
        ?string $footerHtml = null,
    ): void
    {
        $headerData = $this->getHeaderData($title, $description, $arResult, $terms, $footerHtml, $additionalClasses, $headerHtml);
        $headerTemplate = empty($arResult["PROPERTIES"]["HEADER_TEMPLATE"]["VALUE_XML_ID"]) ? "compact" : $this->getHeaderTemplate($arResult);

        echo match ($headerTemplate) {
            'compact' => $this->compact($headerData, $chainDepth, $termsHtml),
            'not_show' => $this->notShow(),
            default => $this->detailed($headerData, $chainDepth, $termsHtml)
        };
    }

    private function getHeaderData(
        string $title,
        ?string $description,
        ?array $arResult,
        ?array $termsSettings,
        ?string $footerHtml,
        ?array $additionalClasses,
        ?string $headerHtml
    ): array
    {
        return array_merge(
            $this->getBaseHeaderData($title, $description),
            $this->getHeaderDataFromResult($arResult),
            $this->getAdditionalHeaderData($termsSettings, $footerHtml, $additionalClasses, $headerHtml)
        );
    }

    private function getHeaderTemplate(?array $arResult): string
    {
        return $arResult['PROPERTIES']['HEADER_TEMPLATE']['VALUE_XML_ID'];
    }

    private function getBaseHeaderData(string $title, ?string $description): array
    {
        return [
            'title' => $title,
            'description' => $description ?? '',
        ];
    }

    private function getHeaderDataFromResult(?array $arResult): array
    {
        if (empty($arResult)) {
            return [
                'bgColorClass' => 'bg-linear-blue',
                'h1ColorClass' => 'dark-0',
                'breadcrumbsColorClass' => 'text-white-50',
                'picHeader' => 'img/patterns/section/pattern-light',
            ];
        }

        $result = [
            'bgColorClass' => $arResult["PROPERTIES"]["HEADER_COLOR_CLASS"]["VALUE"] ?: 'bg-linear-blue',
            'picture' => $arResult["DETAIL_PICTURE"] ?? null,
            'background' => $arResult["PROPERTIES"]["BANNER_BACKGROUND"]["VALUE"] ?? null,
            'termsProperty' => $arResult["PROPERTIES"]["TERMS"] ?? [],
            'showButton' => $arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE'] ?? false,
            'buttonText' => $arResult['PROPERTIES']['BUTTON_TEXT_DETAIL']['VALUE'] ?? '',
            'buttonHref' => $arResult['PROPERTIES']['BUTTON_HREF_DETAIL']['VALUE'] ?? '',
            'h1ColorClass' => $arResult["PARAMS_CLASS"]["H1_COLOR_CLASS"] ?: 'dark-0',
            'breadcrumbsColorClass' => $arResult["PARAMS_CLASS"]["BREADCRUMBS_COLOR_CLASS"] ?: 'text-white-50',
            'picHeader' => $arResult['PROPERTIES']['HEADER_BG_PICTURE']['VALUE'] ?: 'img/patterns/section/pattern-light',
            'buttonCodeForm' => $arResult['PROPERTIES']['BUTTON_CODE_FORM']['VALUE'] ?? '',
            'buttonClassColor' => $arResult['PROPERTIES']['CLASS_BUTTON_TEXT_DETAIL']['VALUE'] ?: 'btn-tertiary',
        ];

        return $result;
    }

    private function getAdditionalHeaderData(?array $terms, ?string $footerHtml, ?array $additionalClasses, ?string $headerHtml): array
    {
        return [
            'termsSettings' => $terms ?? [],
            'headerHtml' => $headerHtml ?? '',
            'footerHtml' => $footerHtml ?? '',
            'additionalClasses' => $additionalClasses ?? []
        ];
    }

    public function renderTerms(?array $termsSettings, ?array $termsProperty, ?string $termsHtml = null): string
    {
        if ((empty($termsSettings) || empty($termsProperty)) && empty($termsHtml)) {
            return '';
        } elseif (!empty($termsHtml)) {
            return $termsHtml;
        }

        ob_start();
        $termsValues = processTerms($termsSettings, $termsProperty); ?>

        <div class="banner-product__benefits-list">

        <? foreach ($termsValues as $term) { ?>
            <div class="d-inline-flex flex-column row-gap-2">
                <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold green-100">
                    <span><?= preg_match('/\d/', $term['VALUE']) ? $term['FROM_TO'] : '' ?></span>
                    <span class='<?= preg_match('/\d/', $term['VALUE']) ? 'text-number-l' : 'text-number-m' ?> fw-bold text-nowrap'><?= $term['VALUE'] ?></span>
                </div>
                <span class='d-block'><?= $term['SIGN'] ?></span>
            </div>
        <? } ?>

        </div>

        <? return ob_get_clean();
    }

    public function helper(): ComponentHelper
    {
        return $this->helper;
    }

    private function detailed(array $headerData, int $chainDepth, ?string $termsHtml): string
    {
        ob_start(); ?>
        <div class="banner-product <?= $headerData['bgColorClass'] ?> <?= implode(' ', $headerData['additionalClasses']) ?>"
            <?= !empty($headerData['background']) ? 'style="background: url(' . CFile::getPath($headerData['background']) . ') no-repeat center center / cover;"' : '' ?>>

            <div class="banner-product__wrapper">
                <div class="banner-product__content <?= empty($headerData['picture']) ? 'w-100 w-lg-60' : '' ?>">
                    <div class="banner-product__header">

                        <? if (!empty($this->helper)) {
                            $this->helper->deferredCall('showNavChain', ['.default', $chainDepth, $headerData]);
                        } ?>

                        <h1><?= $headerData['title'] ?></h1>
                        <? if (!empty($headerData['description'])) { ?>
                            <p class="banner-product__subtitle text-l mw-100"><?= $headerData['description'] ?></p>
                        <? } ?>

                    </div>

                    <? if (!empty($headerData['picture'])) { ?>
                        <img class="banner-product__image" src="<?= $headerData['picture']['SRC'] ?? '' ?>" alt="<?= $headerData['picture']['ALT'] ?? '' ?>" loading="lazy">
                    <? } ?>

                    <? echo $this->renderTerms($headerData['termsSettings'], $headerData['termsProperty'], $termsHtml); ?>

                    <? if (!empty($headerData['headerHtml'])) : ?>
                        <?= $headerData['headerHtml'] ?>
                    <? endif; ?>

                    <? if ($headerData['showButton'] && !empty($headerData['buttonHref'])) { ?>
                        <a class="btn <?= $headerData['buttonClassColor'] ?> btn-lg-lg banner-product__button"
                           href="<?= $headerData['buttonHref'] ?>"
                        >
                            <?= $headerData['buttonText'] ?>
                        </a>
                    <? } elseif ($headerData['showButton'] && !empty($headerData['buttonCodeForm'])) { ?>
                        <button
                            class="btn <?= $headerData['buttonClassColor'] ?> btn-lg-lg banner-product__button"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#<?= $headerData['buttonCodeForm'] ?>"
                        >
                            <?= $headerData['buttonText'] ?>
                        </button>
                    <? } ?>
                </div>

                <? if (!empty($headerData['footerHtml'])) { ?>
                    <div class="banner-product__footer row gx-md-2 gx-lg-2_5 row-gap-4 row-gap-lg-6 mt-6 mt-lg-16 mt-xl-26">
                        <?= $headerData['footerHtml'] ?>
                    </div>
                <? } ?>

            </div>
            <? if (!empty($headerData['picHeader'])) { ?>
                <picture class="pattern-bg banner-product__pattern">
                    <source srcset="/frontend/dist/<?= $headerData['picHeader'] ?>-s.svg" media="(max-width: 767px)">
                    <source srcset="/frontend/dist/<?= $headerData['picHeader'] ?>-m.svg" media="(max-width: 1199px)">
                    <img src="/frontend/dist/<?= $headerData['picHeader'] ?>-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            <? } ?>
        </div>
        <? return ob_get_clean();
    }

    private function compact(array $headerData, int $chainDepth, ?string $termsHtml): bool|string
    {
        ob_start(); ?>

        <?
        file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/logs/header_".date("Y_m_d").".txt", "headerData:\n" . print_r($headerData, true), FILE_APPEND);
        ?>

        <section class="banner-text <?= $headerData['bgColorClass'] ?> <?= implode(' ', $headerData['additionalClasses']) ?>">
            <div class="container banner-text__container position-relative z-2">
                <div class="row ps-lg-6">
                    <div class="col-12 position-relative z-1 mb-5 mb-md-0 pt-6<? if (!empty($headerData['picture'])) { ?> col-sm-6 col-md-8<? } ?><? if (empty($headerData['picture'])) { ?> col-xxl-8<? } ?>">
                        <div class="banner-text__content d-flex flex-column align-items-start gap-3 gap-lg-4">

                            <? if (!empty($this->helper)) {
                                $this->helper->deferredCall('showNavChain', ['.default', $chainDepth, $headerData]);
                            } ?>

                            <h1 class="banner-text__title <?= $headerData['h1ColorClass'] ?? 'dark-0' ?> text-break"><?= $headerData['title'] ?></h1>
                            <? if (!empty($headerData['description'])) { ?>
                                <div class="banner-text__description text-l <?= $headerData['h1ColorClass'] ?? 'dark-0' ?>"><?= $headerData['description'] ?></div>
                            <? } ?>

                        </div>
                        <? if (!empty($termsHtml)) { ?>
                            <?= $termsHtml ?>
                        <? } ?>
                    </div>

                    <? if (!empty($headerData['picture'])) { ?>
                        <div class="d-none d-sm-block col-12 col-sm-6 col-md-4">
                            <img class="banner-text__image position-relative w-auto float-end" src="<?= $headerData['picture']['SRC'] ?>" alt="<?= $headerData['picture']['ALT'] ?>" loading="lazy">
                        </div>
                    <? } ?>

                </div>
            </div>
            <? if (!empty($headerData['picHeader'])) { ?>
                <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
                    <source srcset="/frontend/dist/<?= $headerData['picHeader'] ?>-s.svg" media="(max-width: 767px)">
                    <source srcset="/frontend/dist/<?= $headerData['picHeader'] ?>-m.svg" media="(max-width: 1199px)">
                    <img src="/frontend/dist/<?= $headerData['picHeader'] ?>-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            <? } ?>
        </section>
        <? return ob_get_clean();
    }

    private function notShow(): bool|string
    {
        ob_start();
        return ob_get_clean();
    }
}
