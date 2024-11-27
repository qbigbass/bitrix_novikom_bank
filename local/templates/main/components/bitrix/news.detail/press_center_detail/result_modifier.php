<?php
/** @var array $arResult */

use Dalee\Services\ContentPlaceholderManager;

$properties = [
    'IMAGES' => fn($value) => '<img src="' . $value . '" class="mobile-element-full-width" alt="" loading="lazy">',
    'QUOTE' => fn($value) => '
        <div class="polygon-container js-polygon-container quote-polygon-container">
            <div class="polygon-container__content quote-polygon-container__content">
                <div class="quote bg-blue-10">
                    <div class="quote__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-md-2 gap-lg-4">
                        <img src="/frontend/dist/img/small-quote-sticker.png" class="quote__image my-md-auto mt-md-0 position-relative" alt="" loading="lazy">
                        <div class="quote__content text-l">' . $value['TEXT'] . '</div>
                    </div>
                </div>
            </div>
            <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-dasharray="10"></polygon>
                </svg>
            </div>
        </div>',
    'EXCLAMATION' => fn($value) => '
        <div class="polygon-container js-polygon-container">
            <div class="polygon-container__content">
                <div class="helper bg-dark-10">
                    <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                        <img alt="Обратите внимание" src="/frontend/dist/img/restructuring-additional-info.png" class="helper__image w-auto float-end" loading="lazy">
                        <div class="helper__content text-l">' . $value['TEXT'] . '</div>
                    </div>
                </div>
            </div>
            <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-dasharray="10"></polygon>
                </svg>
            </div>
        </div>'
];

$placeholderManager = new ContentPlaceholderManager($properties);
$placeholderManager->processResult($arResult);

$arResult['PLACEHOLDER_CLASS'] = $placeholderManager;
