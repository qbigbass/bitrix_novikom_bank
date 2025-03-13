<?php

use Bitrix\Main;
use Dalee\Helpers\FormHelper;
use Dalee\Helpers\IblockHelper;
use Dalee\Services\CacheHandler;
use Dalee\Services\RatesPlaceholderManager;
use Dalee\UserType\CIBEditComplexProp;
use Dalee\UserType\CUserTypeComplexProperty;
use Dalee\UserType\CUserTypeSectionStringDescr;
use Dalee\UserType\CUserTypeStringDescr;
use Dalee\UserType\CUserTypeStringWithTabs;

$eventManager = Main\EventManager::getInstance();

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringDescr::class, 'OnIBlockPropertyBuildList']);
$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringWithTabs::class, 'OnIBlockPropertyBuildList']);
$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeComplexProperty::class, 'OnIBlockPropertyBuildList']);

$eventManager->addEventHandler('main', 'OnUserTypeBuildList', [CUserTypeSectionStringDescr::class, 'GetUserTypeDescription']);
$eventManager->addEventHandler('main', 'OnBeforeEventAdd', [FormHelper::class, 'sendFeedBack']);

$eventManager->addEventHandler('iblock', 'OnStartIBlockElementAdd', [CIBEditComplexProp::class, 'OnStartIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnStartIBlockElementUpdate', [CIBEditComplexProp::class, 'OnStartIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', [CIBEditComplexProp::class, 'OnBeforeIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [CIBEditComplexProp::class, 'OnBeforeIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockElementAdd', [CIBEditComplexProp::class, 'OnAfterIBlockElementUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockElementUpdate', [CIBEditComplexProp::class, 'OnAfterIBlockElementUpdateHandler']);

$eventManager->addEventHandler('main', 'OnBeforeProlog', [CIBEditComplexProp::class, 'OnBeforePrologHandler']);
$eventManager->addEventHandler("main", "OnEndBufferContent", [RatesPlaceholderManager::class, 'handle']);

$eventManager->addEventHandler('form', 'OnBeforeResultAdd', [FormHelper::class, 'onBeforeResultAdd']);

// Сбрасываем тегированный кеш у связанных инфоблоков
$eventManager->addEventHandler("iblock", "OnAfterIBlockElementUpdate", [CacheHandler::class, "onAfterIBlockElementUpdateHandler"]);
$eventManager->addEventHandler("iblock", "OnAfterIBlockElementDelete", [CacheHandler::class, "onAfterIBlockElementUpdateHandler"]);

$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [CIBEditComplexProp::class, 'checkTabPlaceholders']);

// Сбрасываем тегированный кеш "bitrix:menu" при изменении раздела в ИБ
$eventManager->addEventHandler('iblock', 'OnAfterIBlockSectionAdd', [IblockHelper::class, 'onAfterIBlockSectionUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockSectionUpdate', [IblockHelper::class, 'onAfterIBlockSectionUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockSectionDelete', [IblockHelper::class, 'onAfterIBlockSectionDeleteHandler']);
