<?php

define("PUBLIC_AJAX_MODE", true);
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_STATISTIC", true);
define("NO_AGENT_CHECK", true);
define("DisableEventsCheck", true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$data = [];
if ( !empty($_FILES) ) {
    $error = false;
    $responseFile = "";
    $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/upload/";

    foreach ($_FILES as $file) {
        $fileNameCmps = explode(".", $file["name"]);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $file["name"]) . '.' . $fileExtension;

        if ( move_uploaded_file($file["tmp_name"], $uploadDir . $newFileName) ) {
            $responseFile = "/upload/" . $newFileName;
        } else {
            $error = true;
        }
    }

    $data = $error ? ["error" => "Ошибка загрузки файла."] : ["file" => $responseFile];
}

exit(json_encode($data));