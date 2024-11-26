<?
IncludeModuleLangFile(__FILE__);

global $USER;

$RIGHT = $APPLICATION->GetGroupRight("novikom.settings");
$RIGHT_W = ($RIGHT >= "W");
$RIGHT_R = ($RIGHT >= "R");

if ($RIGHT_R) {
    CModule::IncludeModule('novikom.settings');
    $aMenu = [
        "parent_menu" => "global_menu_settings",
        "section" => "novikom.settings",
        "sort" => 10000,
        "module_id" => "novikom.settings",
        "text" => GetMessage("NOVIKOM_SETTINGS_MENU_MAIN"),
        "title" => GetMessage("NOVIKOM_SETTINGS_MENU_MAIN_TITLE"),
        "url" => "novikom_settings_edit.php?lang=" . LANGUAGE_ID,
        "icon" => "novikom_settings_menu_icon",
        "items_id" => "menu_novikom_settings",
    ];
    return $aMenu;
}
return false;
?>
