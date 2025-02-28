<?php
/**
 * @global CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Карта сайта");

$APPLICATION->IncludeComponent("dalee:main.map", ".default", Array(
	    "LEVEL" => "3",	// Максимальный уровень вложенности (0 - без вложенности)
		"COL_NUM" => "2",	// Количество колонок
		"SHOW_DESCRIPTION" => "Y",	// Показывать описания
        'THIRD_LEVEL_MENU_TYPE' => 'iblock_sections', // Тип меню для 3-е уровня
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
