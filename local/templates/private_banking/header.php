<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

use \Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();

$asset->addCss('/frontend/dist/css/bootstrap.css');
$asset->addCss('/frontend/dist/css/swiper.css');
$asset->addCss('/frontend/dist/css/select2.css');
$asset->addCss('/frontend/dist/css/air-datepicker.css');
$asset->addCss('/frontend/dist/css/all.css');

$asset->addJs('/frontend/dist/js/vendors/jquery.min.js');
$asset->addJs('/frontend/dist/js/vendors/popover.js');
$asset->addJs('/frontend/dist/js/vendors/bootstrap.min.js');
$asset->addJs('/frontend/dist/js/vendors/swiper.min.js');
$asset->addJs('/frontend/dist/js/vendors/select2.min.js');
$asset->addJs('/frontend/dist/js/vendors/airdatepicker.js');
$asset->addJs('/frontend/dist/js/vendors/jquery.mask.min.js');
$asset->addJs('/frontend/dist/js/chatBot.js');
$asset->addJs('/frontend/dist/js/datepicker.js');
$asset->addJs('/frontend/dist/js/dropDownMenu.js');
$asset->addJs('/frontend/dist/js/formFeedback.js');
$asset->addJs('/frontend/dist/js/formSend.js');
$asset->addJs('/frontend/dist/js/formSteps.js');
$asset->addJs('/frontend/dist/js/inputSlider.js');
$asset->addJs('/frontend/dist/js/uploadFile.js');
$asset->addJs('/frontend/dist/js/polygon-container.js');
$asset->addJs('/frontend/dist/js/setPage.js');
$asset->addJs('/frontend/dist/js/sliders.js');
$asset->addJs('/frontend/dist/js/tabs.js');
$asset->addJs('/frontend/dist/js/yMap.js');
$asset->addJs('/frontend/dist/js/private-banking.js');
$asset->addJs('/frontend/dist/js/calculator-deposit.js');
$asset->addJs('/frontend/dist/js/calculator-loan.js');
$asset->addJs('/frontend/dist/js/calculator-mortgage.js');
$asset->addJs('/frontend/dist/js/calculator-bonus.js');
$asset->addJs('/frontend/dist/js/charts.js');
$asset->addJs('/frontend/dist/js/index.js');

?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="/favicon.ico">
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body class="pb">
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>

<!-- #WORK_AREA# ----------------------------------------------------------------------------------------------------->
