<? if (!check_bitrix_sessid()) return; ?>
<?
global $novikom_settings_global_errors;
$novikom_settings_global_errors = is_array($novikom_settings_global_errors) ? $novikom_settings_global_errors : [];

if (is_array($novikom_settings_global_errors) && count($novikom_settings_global_errors) > 0) {
    foreach ($novikom_settings_global_errors as $val) {
        $alErrors .= $val . "<br>";
    }
    echo CAdminMessage::ShowMessage(["TYPE" => "ERROR", "MESSAGE" => GetMessage("MOD_INST_ERR"), "DETAILS" => $alErrors, "HTML" => true]);
} else {
    echo CAdminMessage::ShowNote(GetMessage("MOD_INST_OK"));

    ?>
    <p><a href="novikom_settings_edit.php?lang=<?= LANG ?>"><?= GetMessage("NOVIKOM_SETTINGS_SETTINGS_PAGE") ?></a></p>
    <?
}
?>
<form action="<? echo $APPLICATION->GetCurPage() ?>">
    <input type="hidden" name="lang" value="<? echo LANG ?>">
    <input type="submit" name="" value="<? echo GetMessage("MOD_BACK") ?>">
</form>
