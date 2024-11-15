<?
IncludeModuleLangFile(__FILE__);

if (class_exists('novikom_settings')) return;

class novikom_settings extends CModule
{
    var $MODULE_ID = "novikom.settings";
    var $PARTNER_NAME = "Новиком Банк";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $MODULE_GROUP_RIGHTS = 'Y';

    public $MY_DIR = "local";

    public function __construct()
    {
        $arModuleVersion = [];

        $path = str_replace('\\', '/', __FILE__);
        $path = mb_substr($path, 0, mb_strlen($path) - mb_strlen('/index.php'));
        include($path . '/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = GetMessage('NOVIKOM_SETTINGS_MODULE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('NOVIKOM_SETTINGS_MODULE_DESCRIPTION');
    }

    public function DoInstall()
    {
        global $APPLICATION, $DB;

        global $novikom_settings_global_errors;
        $novikom_settings_global_errors = [];

        if (count($novikom_settings_global_errors) == 0) {
            if ($this->InstallDB()) {
                $this->InstallFiles();
                RegisterModule("novikom.settings");
            } else {
                $novikom_settings_global_errors[] = GetMessage("NOVIKOM_SETTINGS_INSTALL_TABLE_ERROR");
            }
        }

        $APPLICATION->IncludeAdminFile(GetMessage("NOVIKOM_SETTINGS_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"] . "/local/modules/" . $this->MODULE_ID . "/install/step.php");
        return true;
    }

    function InstallDB()
    {
        return true;
    }

    function InstallFiles($arParams = [])
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/" . $this->MY_DIR . "/modules/" . $this->MODULE_ID . "/install/admin/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/");
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/" . $this->MY_DIR . "/modules/" . $this->MODULE_ID . "/install/themes/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/themes/", true, true);

        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/" . $this->MY_DIR . "/modules/" . $this->MODULE_ID . "/install/activities", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/activities", true, true);
    }

    public function DoUninstall()
    {
        global $APPLICATION;

        $this->UnInstallFiles();
        $this->UnInstallDB();

        UnRegisterModule('novikom.settings');

        $APPLICATION->IncludeAdminFile(GetMessage("NOVIKOM_SETTINGS_UNINSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"] . "/" . $this->MY_DIR . "/modules/" . $this->MODULE_ID . "/install/unstep.php");
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"] . "/" . $this->MY_DIR . "/modules/" . $this->MODULE_ID . "/install/admin/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");
        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"] . "/" . $this->MY_DIR . "/modules/" . $this->MODULE_ID . "/install/themes/.default/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/themes/.default");//css
        DeleteDirFilesEx("/bitrix/themes/.default/icons/" . $this->MODULE_ID . "/");

        DeleteDirFilesEx("/bitrix/activities/custom/novikom_settings_setvariableactivity/");
    }

    function UnInstallDB($arParams = [])
    {
        return true;
    }
}

?>
