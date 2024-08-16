<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
use Galago\Frontend\Asset;
global $APPLICATION;

$APPLICATION->SetTitle('Банковские карты');
Asset::getInstance()->addJsAndCss('index');
?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
