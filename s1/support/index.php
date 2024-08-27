<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
use Galago\Frontend\Asset;
global $APPLICATION;

$APPLICATION->SetTitle('Помощь');
Asset::getInstance()->addJsAndCss('index');
?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
