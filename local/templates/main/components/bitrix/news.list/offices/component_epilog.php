<?php

$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->addJs('https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=' . COption::GetOptionString('fileman', 'yandex_map_api_key'));
