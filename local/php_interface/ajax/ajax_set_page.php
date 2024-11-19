<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'set_page') {

    $_SESSION['section_page'] = $_SESSION['section_page'] ?? [];
    $_SESSION['section_page'][$_POST['section']] = $_POST['element'];

    $response = [
        'status' => 'success',
        'currentSection' => $_POST['section'],
        'currentElement' => $_POST['element'],
    ];

    echo json_encode($response);
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
