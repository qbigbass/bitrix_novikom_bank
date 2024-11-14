<?

use Bitrix\Main\Config\Option;

IncludeModuleLangFile(__FILE__);
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/options.php");
require_once("prolog.php");
global $APPLICATION;

$module_id = "novikom.settings";
$install_status = CModule::IncludeModuleEx($module_id);

$RIGHT = $APPLICATION->GetGroupRight($module_id);
$RIGHT_W = ($RIGHT >= "W");
$RIGHT_R = ($RIGHT >= "R");

if ($RIGHT_R) {
    $arGroups = [
        "group1" => [
            "NAME" => GetMessage("NOVIKOM_URLPAY_LINK"),
        ],
    ];

    $arOptions = [];
    $arErrors = [];
    $arSettings = [];

    if (
        $_SERVER["REQUEST_METHOD"] == "POST"
        && mb_strlen($_REQUEST["Update"]) > 0
        && $RIGHT_W
        && check_bitrix_sessid()
    ) {
        foreach ($arOptions as $key => $arOption) {
            if ($arOption["TYPE"] == "CHECKBOX") {
                if (isset($_REQUEST["arrOptions"][$key]) && $_REQUEST["arrOptions"][$key] == "Y") {
                    COption::SetOptionString($module_id, $arOption["CODE"], "Y", false, $arOption["SITE_ID"]);
                } else {
                    COption::SetOptionString($module_id, $arOption["CODE"], "N", false, $arOption["SITE_ID"]);
                }
            }

            if ($arOption["TYPE"] == "TEXT") {
                if (isset($_REQUEST["arrOptions"][$key])) {
                    COption::SetOptionString($module_id, $arOption["CODE"], $_REQUEST["arrOptions"][$key], false, $arOption["SITE_ID"]);
                }
            }

            if ($arOption["TYPE"] == "INTEGER") {
                if (isset($_REQUEST["arrOptions"][$key])) {
                    if (mb_strlen($_REQUEST["arrOptions"][$key]) > 0) {
                        $val = intval($_REQUEST["arrOptions"][$key]);
                        $min = $arOption["MIN"];

                        if (mb_strlen($min) > 0 && $val < $min) {
                            $val = $min;
                        }

                        COption::SetOptionString($module_id, $arOption["CODE"], $val, false, $arOption["SITE_ID"]);
                    }
                }
            }
        }
    }

    if (
        $_SERVER["REQUEST_METHOD"] == "POST"
        && $RIGHT_W
        && mb_strlen($_REQUEST["RestoreDefaults"]) > 0
        && check_bitrix_sessid()
    ) {
        foreach ($arOptions as $key => $arOption) {
            Option::delete(
                $module_id,
                [
                    "name" => $arOption["CODE"],
                ]
            );
        }

        $z = CGroup::GetList($v1 = "id", $v2 = "asc", ["ACTIVE" => "Y", "ADMIN" => "N"], $get_users_amount = "N");
        while ($zr = $z->Fetch()) {
            $APPLICATION->DelGroupRight($module_id, [$zr["ID"]]);
        }
    }

    $arDisplayOptions = [];

    foreach ($arOptions as $key => $arOption) {
        $arOptionAdd = $arOption;

        $option_value = COption::GetOptionString($module_id, $arOption["CODE"], "", $arOption["SITE_ID"]);

        $arOptionAdd["INPUT_ID"] = "option_" . $key;
        $arOptionAdd["INPUT_NAME"] = "arrOptions[" . $key . "]";
        $arOptionAdd["~INPUT_VALUE"] = $option_value;
        $arOptionAdd["INPUT_VALUE"] = htmlspecialcharsbx($option_value);

        $arDisplayOptions[$key] = $arOptionAdd;
    }

    foreach ($arGroups as $group_key => $arGroup) {
        $arGroups[$group_key]["~NAME"] = $arGroup["NAME"];
        $arGroups[$group_key]["NAME"] = htmlspecialcharsbx($arGroup["NAME"]);
    }
    ?>

    <?= BeginNote(); ?>
    <?= GetMessage("NOVIKOM_SETTINGS_MODULE_NOTES2"); ?>
    <?= EndNote(); ?>

    <?

    $aTabs = [
        ["DIV" => "edit3", "TAB" => GetMessage("MAIN_TAB_RIGHTS"), "ICON" => "", "TITLE" => GetMessage("MAIN_TAB_TITLE_RIGHTS")],
    ];

    $tabControl = new CAdminTabControl("tabControl", $aTabs);
    $tabControl->Begin();
    ?>

    <form method="post"
          action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialchars($_REQUEST["mid"]) ?>&lang=<?= LANGUAGE_ID ?>&mid_menu=<?= urlencode($_REQUEST["mid_menu"]) ?>"
    <?= bitrix_sessid_post() ?>

    <? $tabControl->BeginNextTab(); ?>
    <? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/admin/group_rights.php"); ?>
    <? $tabControl->Buttons(); ?>
    <input <? if (!$RIGHT_W) echo "disabled" ?> type="submit" name="Update"
                                                value="<?= GetMessage("MAIN_SAVE") ?>"
                                                title="<?= GetMessage("MAIN_OPT_SAVE_TITLE") ?>">
    <input <? if (!$RIGHT_W) echo "disabled" ?> type="submit" name="RestoreDefaults"
                                                title="<? echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS") ?>"
                                                OnClick="return confirm('<? echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING")) ?>')"
                                                value="<? echo GetMessage("MAIN_RESTORE_DEFAULTS") ?>">
    <? $tabControl->End(); ?>
    </form>
    <?
}
?>
