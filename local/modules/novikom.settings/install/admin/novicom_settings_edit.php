<?
if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/modules/novikom.settings/admin/novikom_settings_edit.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/modules/novikom.settings/admin/novikom_settings_edit.php");
} else {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/novikom.settings/admin/novikom_settings_edit.php");
}
?>
