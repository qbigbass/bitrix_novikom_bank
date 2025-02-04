<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
use Dalee\Helpers\ComponentRenderer\Renderer;
$renderer = new Renderer($APPLICATION, $component);
?>
<section class="section-layout js-collapsed-mobile">
    <div class="container">
        <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6">
            <?= $arResult['TITLE']?>
        </h3>
        <a
            class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
            data-bs-toggle="collapse"
            href="#additional-info-content"
            role="button"
            aria-expanded="false"
            aria-controls="additional-info-content"
        >
            <?= $arResult['TITLE'] ?>
            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
            </svg>
        </a>
        <? $renderer->render(
            'Tabs',
            $arResult['TABS'],
            null,
            [
                'elementId' => $arResult['ID']
            ]
        ); ?>
    </div>
</section>
