<?php
use Bitrix\Main;
use Lib\UserType\CUserTypeStringDescr;

$eventManager = Main\EventManager::getInstance();

$eventManager->addEventHandler('iblock', 'OnIBlockPropertyBuildList', [CUserTypeStringDescr::class, 'OnIBlockPropertyBuildList']);
