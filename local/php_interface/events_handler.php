<?php
use Bitrix\Main;
$eventManager = Main\EventManager::getInstance();

//$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', ['Galago\UserTypesField\PropSectionCustom', 'GetUserTypeDescription']);

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', ['Galago\CustomFields\CustomElementProperty', 'GetUserTypeDescription']);
