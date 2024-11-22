<?php

use Bitrix\Main;
use Dalee\Helpers\FormHelper;
use Dalee\Services\PlaceholderManager;
use Dalee\UserType\CUserTypeStringDescr;
use Dalee\UserType\CUserTypeStringWithTabs;
use Dalee\UserType\CUserTypeComplexProperty;
use Dalee\UserType\CIBEditComplexProp;

$eventManager = Main\EventManager::getInstance();

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringDescr::class, 'OnIBlockPropertyBuildList']);
$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringWithTabs::class, 'OnIBlockPropertyBuildList']);
$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeComplexProperty::class, 'OnIBlockPropertyBuildList']);

$eventManager->addEventHandler('iblock', 'OnStartIBlockElementAdd', [CIBEditComplexProp::class, 'OnStartIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnStartIBlockElementUpdate', [CIBEditComplexProp::class, 'OnStartIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', [CIBEditComplexProp::class, 'OnBeforeIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [CIBEditComplexProp::class, 'OnBeforeIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockElementAdd', [CIBEditComplexProp::class, 'OnAfterIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockElementUpdate', [CIBEditComplexProp::class, 'OnAfterIBlockElementUpdateHandler']);

$eventManager->addEventHandler('main', 'OnBeforeProlog', [CIBEditComplexProp::class, 'OnBeforePrologHandler']);

$eventManager->addEventHandler("main", "OnEndBufferContent", [PlaceholderManager::class, 'handle']);

$eventManager->addEventHandler('form', 'OnBeforeResultAdd', [FormHelper::class, 'onBeforeResultAdd']);
