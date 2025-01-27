<?php

use Bitrix\Main\Context;
use Dalee\Services\DocumentHandler;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php";

try {
    $request = Context::getCurrent()->getRequest();
    $handler = new DocumentHandler($request);
    $handler->handleRequest();
} catch (Exception $e) {
    CHTTP::SetStatus("500 Internal Server Error");
    echo "An error occurred: " . $e->getMessage();
    exit;
}
