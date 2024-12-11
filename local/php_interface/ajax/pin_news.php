<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

if ($request->isPost()) {
    $itemId = $request->getPost('itemId');
    $path = $request->getPost('path');

    if (!empty($itemId) && !empty($path)) {
        if (!isset($_SESSION['PINS'][$path])) {
            $_SESSION['PINS'][$path] = [];
            $_SESSION['PINS'][$path][] = $itemId;
        } else {
            if (in_array($itemId, $_SESSION['PINS'][$path])) {
                unset($_SESSION['PINS'][$path][array_search($itemId, $_SESSION['PINS'][$path])]);
            } else {
                $_SESSION['PINS'][$path][] = $itemId;
            }
        }
    }
}
