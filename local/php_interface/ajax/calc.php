<?php
use Dalee\Services\ProductRatesHandler;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: application/json');

$data = $_POST;

$table = $data['table'] ?? null;
$elementId = $data['id'] ?? null;
$name = $data['name'] ?? null;

$table = 'deposits';

if (empty($table)) {
    echo json_encode(['error' => 'Не указана таблица'], JSON_UNESCAPED_UNICODE);
    die();
}

$handler = new ProductRatesHandler($table, $elementId, $name);
$handler->handle();
$handler->getJson();
