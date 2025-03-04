<?php
/** @var array $arResult */

use Dalee\Services\ContentPlaceholderManager;

$properties = [
    'BUTTON' => fn($value) => '
        <div class="px-lg-6">
            <button class="btn btn-secondary btn-lg-lg d-inline-block w-100 w-md-auto" data-bs-toggle="modal"
                data-bs-target="#vacancy_form">' . $value . '
            </button>
        </div>
    ',
];

$placeholderManager = new ContentPlaceholderManager($properties);
$placeholderManager->processResult($arResult);

$arResult['PLACEHOLDER_CLASS'] = $placeholderManager;
