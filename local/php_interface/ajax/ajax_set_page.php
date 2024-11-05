<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'set_page') {

    $_SESSION['current_page'] = $_POST['page'];

    $response = [
        'status' => 'success',
        'currentPage' => $_POST['page'],
    ];

    echo json_encode($response);
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
