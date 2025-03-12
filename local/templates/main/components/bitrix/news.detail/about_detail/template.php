<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();
$placeholderManager = $arResult['PLACEHOLDER_CLASS'];
$headerView->render(
    $arResult['~PREVIEW_TEXT'] ?? $arResult['NAME'],
    null,
    ['bg-linear-blue', 'border-green'],
    1
);
?>
<section class="section-layout py-lg-11">
    <div class="container">
        <? $placeholderManager->renderHtml($arResult['~DETAIL_TEXT']); ?>
    </div>
</section>

<? $helper->saveCache(); ?>
