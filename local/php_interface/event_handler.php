<?php

use Bitrix\Main;
use Dalee\UserType\CUserTypeStringDescr;

$eventManager = Main\EventManager::getInstance();

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringDescr::class, 'OnIBlockPropertyBuildList']);
