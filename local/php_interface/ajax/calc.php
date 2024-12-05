<?php
use Dalee\Services\ProductRatesHandler;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$data = $_POST;

$table = $data['table'] ?? null;
$elementId = $data['elementId'] ?? null;
$name = $data['name'] ?? null;

$handler = new ProductRatesHandler($table, $elementId, $name);
$handler->handle();
$handler->getJson();
