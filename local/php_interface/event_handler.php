<?php

use Bitrix\Main;
use Dalee\UserType\CUserTypeStringDescr;
use Dalee\UserType\CUserTypeStringWithTabs;

$eventManager = Main\EventManager::getInstance();

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringDescr::class, 'OnIBlockPropertyBuildList']);
$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringWithTabs::class, 'OnIBlockPropertyBuildList']);
