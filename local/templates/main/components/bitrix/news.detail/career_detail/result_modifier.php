<?php
/** @var array $arResult */

use Dalee\Services\ContentPlaceholderManager;

$properties = [
    'BUTTON' => fn($value) => '
        <button class="btn btn-secondary btn-lg-lg d-inline-block w-100 w-md-auto" data-bs-toggle="modal"
            data-bs-target="#modal-vacancy-form">' . $value . '</span>
        </button>
    ',
];

$placeholderManager = new ContentPlaceholderManager($properties);
$placeholderManager->processResult($arResult);

$arResult['PLACEHOLDER_CLASS'] = $placeholderManager;
