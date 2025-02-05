<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);

global $pbModel;

$pbModel = $arResult['CONTENT_JSON'] ?? null;

?>
<section class="pb-section pb-section--gradient-radial-linear pb-section--bg-lines py-xxl-16" id="become_client">
    <div class="container">
        <?php $APPLICATION->IncludeComponent(
            "dalee:form",
            "become_client_form",
            [
                "FORM_CODE" => "become_client_form",
            ],
            $component
        ); ?>
    </div>
</section>
