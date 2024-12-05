<?
$novikom_settings_default_option = [];

if (CModule::IncludeModule("novikom.settings")) {
    $novikom_settings_default_option = CNovicomSettings::GetFields();
}
?>
