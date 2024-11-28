<?php
global $APPLICATION;
$currentDirArray = explode('/', $APPLICATION->GetCurPage());
$parentDir = $currentDirArray[3];
$aMenuLinks = [
    [
        "Все записи",
        "./" . $parentDir . "/",
        [],
        [],
        ""
    ]
];
?>
