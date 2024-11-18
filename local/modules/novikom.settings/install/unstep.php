<? if (!check_bitrix_sessid()) return; ?>
<?
global $novikom_settings_global_errors;
$novikom_settings_global_errors = is_array($novikom_settings_global_errors) ? $novikom_settings_global_errors : [];

if (is_array($novikom_settings_global_errors) && count($novikom_settings_global_errors) > 0) {
    foreach ($novikom_settings_global_errors as $val) {
        $alErrors .= $val . "<br>";
    }
    echo CAdminMessage::ShowMessage(["TYPE" => "ERROR", "MESSAGE" => GetMessage("MOD_UNINST_ERR"), "DETAILS" => $alErrors, "HTML" => true]);
} else {
    echo CAdminMessage::ShowNote(GetMessage("MOD_UNINST_OK"));
}
?>
<form action="<? echo $APPLICATION->GetCurPage() ?>">
    <input type="hidden" name="lang" value="<? echo LANG ?>">
    <input type="submit" name="" value="<? echo GetMessage("MOD_BACK") ?>">
</form>
