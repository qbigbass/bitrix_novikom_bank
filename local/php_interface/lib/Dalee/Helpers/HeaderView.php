<?php

namespace Dalee\Helpers;

use CBitrixComponent;

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
        ?string $footerHtml = null,
    ): void
    {
        $headerData = $this->getHeaderData($title, $description, $arResult, $terms, $footerHtml, $additionalClasses);
        $headerTemplate = empty($arResult['PROPERTIES']['HEADER_TEMPLATE']['VALUE_XML_ID']) ? 'compact' : $this->getHeaderTemplate($arResult);

        echo match ($headerTemplate) {
            'compact' => $this->compact($headerData, $chainDepth, $termsHtml),
            default => $this->detailed($headerData, $chainDepth, $termsHtml),
        };
    }

    private function getHeaderData(
        string $title,
        ?string $description,
        ?array $arResult,
        ?array $termsSettings,
        ?string $footerHtml,
        ?array $additionalClasses
    ): array
    {
        return array_merge(
            $this->getBaseHeaderData($title, $description),
            $this->getHeaderDataFromResult($arResult),
            $this->getAdditionalHeaderData($termsSettings, $footerHtml, $additionalClasses)
        );
    }

    private function getHeaderTemplate(?array $arResult): string
    {
        return $arResult['PROPERTIES']['HEADER_TEMPLATE']['VALUE_XML_ID'] ?? 'detailed';
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
            return [];
        }

        $result = [
            'bgColorClass' => !empty($arResult["PROPERTIES"]["HEADER_COLOR_CLASS"]["VALUE"]) ? $arResult["PROPERTIES"]["HEADER_COLOR_CLASS"]["VALUE"] : 'bg-linear-blue',
            'picture' => $arResult["DETAIL_PICTURE"] ?? null,
            'termsProperty' => $arResult["PROPERTIES"]["TERMS"] ?? [],
            'showButton' => $arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE'] ?? false,
            'buttonText' => $arResult['PROPERTIES']['BUTTON_TEXT_DETAIL']['VALUE'] ?? '',
            'buttonHref' => $arResult['PROPERTIES']['BUTTON_HREF_DETAIL']['VALUE'] ?? '',
        ];

        return $result;
    }

    private function getAdditionalHeaderData(?array $terms, ?string $footerHtml, ?array $additionalClasses): array
    {
        return [
            'termsSettings' => $terms ?? [],
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
        <div class="banner-product <?= $headerData['bgColorClass'] ?> <?= implode(' ', $headerData['additionalClasses']) ?>">
            <div class="banner-product__wrapper">
                <div class="banner-product__content <?= empty($headerData['picture']) ? 'w-100 w-lg-60' : '' ?>">
                    <div class="banner-product__header">

                        <? if (!empty($this->helper)) {
                            $this->helper->deferredCall('showNavChain', ['.default', $chainDepth]);
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

                    <? if ($headerData['showButton'] && !empty($headerData['buttonHref'])) { ?>
                        <a class="btn <?= in_array('banner-product--type-corp', $headerData['additionalClasses']) ? 'btn-orange' : 'btn-tertiary' ?> btn-lg-lg banner-product__button"
                           href="<?= $headerData['buttonHref'] ?>">
                            <?= $headerData['buttonText'] ?>
                        </a>
                    <? } ?>
                </div>

                <? if (!empty($headerData['footerHtml'])) { ?>
                    <div class="banner-product__footer row row-gap-4 mt-6 mt-lg-16 mt-xl-26">
                        <?= $headerData['footerHtml'] ?>
                    </div>
                <? } ?>

            </div>
            <picture class="pattern-bg banner-product__pattern">
                <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        </div>
        <? return ob_get_clean();
    }

    private function compact(array $headerData, int $chainDepth, ?string $termsHtml)
    {
        ob_start(); ?>
        <section class="banner-text <?= $headerData['bgColorClass'] ?> <?= implode(' ', $headerData['additionalClasses']) ?>">
            <div class="container banner-text__container position-relative z-2">
                <div class="row ps-lg-6">
                    <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                        <div class="d-flex flex-column align-items-start gap-3 gap-md-4">

                            <? if (!empty($this->helper)) {
                                $this->helper->deferredCall('showNavChain', ['.default', $chainDepth]);
                            } ?>

                            <h1 class="banner-text__title dark-0 text-break"><?= $headerData['title'] ?></h1>
                            <? if (!empty($headerData['description'])) { ?>
                                <div class="banner-text__description text-l dark-0"><?= $headerData['description'] ?></div>
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
            <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
                <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        </section>
        <? return ob_get_clean();
    }
}
