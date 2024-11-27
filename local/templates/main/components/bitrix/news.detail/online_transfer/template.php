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
$this->setFrameMode(true);

use Dalee\Helpers\HeaderView;

$headerView = new HeaderView($component);
$helper = $headerView->helper();

$headerView->render(
    $arResult['~NAME'],
    $arResult['~PREVIEW_TEXT'],
    ['bg-linear-blue', 'banner-text--border-green'],
);
?>

<section class="section-layout pt-8">
    <div class="container">
        <div class="iframe-wrapper">
            <iframe class="widget" src="https://widget3.intervale.ru/payment/card2card?portal_id=P2PNOVIKOMWIDGET4DF12944A7853E0D" id="ifm" width="100%" height="900px;"></iframe>
        </div>
    </div>
</section>

<? $helper->saveCache(); ?>
