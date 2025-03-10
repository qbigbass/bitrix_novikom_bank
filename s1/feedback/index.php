<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Направить обращение");
global $FORMS;
$FORMS->includeForm('feedback_form');
$FORMS->showAll();
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
