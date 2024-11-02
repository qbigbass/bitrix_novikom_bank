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

// Переменные для заголовка и цвета шапки
$headerH1 = $arResult["~NAME"];
$headerColorClass = 'bg-linear-blue';

// Поделючение шапки
$headerFilePath = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/header/news_detail/compact.php";

if (file_exists($headerFilePath)) {
    include($headerFilePath);
} else {
    echo "Шаблон шапки $headerFilePath не найден";
}?>

<section class="section-layout pb-0 pt-8">
    <div class="container">
        <iframe class="widget" src="https://widget3.intervale.ru/payment/card2card?portal_id=P2PNOVIKOMWIDGET4DF12944A7853E0D" id="ifm" width="100%" height="900px;"></iframe>
    </div>
</section>

<? $helper->saveCache(); ?>
