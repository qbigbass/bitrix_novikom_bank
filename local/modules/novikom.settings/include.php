<?
if (!function_exists('htmlspecialcharsbx')) {
    function htmlspecialcharsbx($string, $flags = ENT_COMPAT)
    {
        return htmlspecialchars($string, $flags, (defined("BX_UTF") ? "UTF-8" : "ISO-8859-1"));
    }
}

CModule::AddAutoloadClasses("novikom.settings", [
    "CNovicomSettings" => "classes/general/settings.php",
]);
?>
