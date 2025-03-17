<?php

use Bitrix\Main;
use Dalee\Helpers\FormHelper;
use Dalee\Helpers\IblockHelper;
use Dalee\Services\CacheHandler;
use Dalee\Services\RatesPlaceholderManager;
use Dalee\UserType\CUserTypeSectionStringDescr;
use Dalee\UserType\CUserTypeStringDescr;
use Dalee\UserType\CUserTypeStringWithTabs;
use Dalee\UserType\PlaceholderChecker;

$eventManager = Main\EventManager::getInstance();

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringDescr::class, 'OnIBlockPropertyBuildList']);
$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringWithTabs::class, 'OnIBlockPropertyBuildList']);

$eventManager->addEventHandler('main', 'OnUserTypeBuildList', [CUserTypeSectionStringDescr::class, 'GetUserTypeDescription']);
$eventManager->addEventHandler('main', 'OnBeforeEventAdd', [FormHelper::class, 'sendFeedBack']);

$eventManager->addEventHandler("main", "OnEndBufferContent", [RatesPlaceholderManager::class, 'handle']);

$eventManager->addEventHandler('form', 'OnBeforeResultAdd', [FormHelper::class, 'onBeforeResultAdd']);

// Сбрасываем тегированный кеш у связанных инфоблоков
$eventManager->addEventHandler("iblock", "OnAfterIBlockElementUpdate", [CacheHandler::class, "onAfterIBlockElementUpdateHandler"]);
$eventManager->addEventHandler("iblock", "OnAfterIBlockElementDelete", [CacheHandler::class, "onAfterIBlockElementUpdateHandler"]);

$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [PlaceholderChecker::class, 'checkTabPlaceholders']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', [PlaceholderChecker::class, 'checkTabPlaceholders']);

// Сбрасываем тегированный кеш "bitrix:menu" при изменении раздела в ИБ
$eventManager->addEventHandler('iblock', 'OnAfterIBlockSectionAdd', [IblockHelper::class, 'onAfterIBlockSectionUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockSectionUpdate', [IblockHelper::class, 'onAfterIBlockSectionUpdateHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockSectionDelete', [IblockHelper::class, 'onAfterIBlockSectionDeleteHandler']);
