<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
require_once(dirname(__FILE__) . "/../prolog.php");

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

global $APPLICATION;
global $USER;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/options.php");

$errorText = "";

$module_id = "novikom.settings";
$install_status = CModule::IncludeModuleEx($module_id);

$RIGHT = $APPLICATION->GetGroupRight($module_id);
$RIGHT_W = ($RIGHT >= "W");
$RIGHT_R = ($RIGHT >= "R");

if (!$RIGHT_R) {
    $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
}

global $USER_FIELD_MANAGER, $APPLICATION;

$ID = 1;

if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && mb_strlen($_REQUEST["Update"]) > 0
    && $RIGHT_W
    && check_bitrix_sessid()
) {
    $arUpdateFields = [];
    $USER_FIELD_MANAGER->EditFormAddFields("NOVIKOM_SETTINGS", $arUpdateFields); // fill $arUpdateFields from $_POST and $_FILES

    $obSettings = new CNovicomSettings;
    $res = $obSettings->Update($arUpdateFields);
    if ($res) {
        LocalRedirect($APPLICATION->GetCurPageParam("ok=Y", ["ok"]));
    } else {
        $errorText = $obSettings->LAST_ERROR;
    }
}

$APPLICATION->SetTitle(GetMessage("NOVIKOM_SETTINGS_TITLE"));
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");

if (!$RIGHT_W) {
    CAdminMessage::ShowMessage(
        [
            "TYPE" => "OK",
            "MESSAGE" => Loc::getMessage("NOVIKOM_SETTINGS_READ_ONLY"),
            "DETAILS" => "",
            "HTML" => true
        ]
    );
}


$aTabs = [
    ["DIV" => "edit1", "TAB" => GetMessage("NOVIKOM_SETTINGS_TAB1_TITLE"), "ICON" => "", "TITLE" => GetMessage("NOVIKOM_SETTINGS_TAB1_TITLE")],
];
?>
<? if (isset($_REQUEST["ok"]) && $_REQUEST["ok"] == "Y"): ?>
    <?
    CAdminMessage::ShowMessage(
        [
            "TYPE" => "OK",
            "MESSAGE" => GetMessage("NOVIKOM_SETTINGS_SUCCESS"),
            "DETAILS" => "",
            "HTML" => true
        ]
    );
    ?>

<? endif ?>

<? if (mb_strlen($errorText) > 0): ?>
    <?
    CAdminMessage::ShowMessage(
        [
            "TYPE" => "ERROR",
            "MESSAGE" => $errorText,
            "DETAILS" => "",
            "HTML" => true
        ]
    );
    ?>

<? endif ?>

<?
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
?>
<form method="post" action="<? echo $APPLICATION->GetCurPage() ?>?&lang=<?= LANGUAGE_ID ?>"
      enctype="multipart/form-data">
    <?= bitrix_sessid_post() ?>

    <? $tabControl->BeginNextTab();


    if (method_exists($USER_FIELD_MANAGER, 'showscript')) {
        echo $USER_FIELD_MANAGER->ShowScript();
    }
    ?>

    <? if ($USER->IsAdmin()): ?>
        <tr>
            <td colspan="2" align="left">

                <a href="/bitrix/admin/userfield_edit.php?lang=<?= LANGUAGE_ID ?><?
                ?>&amp;ENTITY_ID=NOVIKOM_SETTINGS&amp;back_url=<?= urlencode($APPLICATION->GetCurPageParam() . '&tabControl_active_tab=user_fields_tab') ?><?
                ?>"><?= GetMessage("NOVIKOM_SETTINGS_ADD_UF") ?></a>
                <br><br>
            </td>
        </tr>
    <? endif ?>
    <?


    $bVarsFromForm = false;
    $arUserFields = $USER_FIELD_MANAGER->GetUserFields("NOVIKOM_SETTINGS", $ID, LANGUAGE_ID);
    foreach ($arUserFields as $FIELD_NAME => $arUserField) {
        $arUserField['VALUE_ID'] = $ID;
        ?>
        <tr>
            <td colspan="2" style="color: #CCC;"><?= $FIELD_NAME ?></td>
        </tr>
        <?
        echo $USER_FIELD_MANAGER->GetEditFormHTML($bVarsFromForm, $GLOBALS[$FIELD_NAME], $arUserField);
    }

    ?>


    <tr>
        <td colspan="2">
            <?= BeginNote(); ?>
            <? echo GetMessage("NOVIKOM_SETTINGS_EXAMPLE_TO_USE"); ?>
            <br>
            <br><strong>&lt;?echo \COption::GetOptionString( &quot;novikom.settings&quot;,
                &quot;UF_PHONE&quot;);?&gt;</strong>
            <br><strong>&lt;?$email = \COption::GetOptionString( &quot;novikom.settings&quot;, &quot;UF_EMAIL&quot;);?&gt;</strong>
            <?= EndNote(); ?>
        </td>
    </tr>


    <? $tabControl->Buttons(); ?>

    <? if ($RIGHT_W): ?>
        <input type="submit" name="Update" value="<?= GetMessage("MAIN_SAVE") ?>"
               title="<?= GetMessage("MAIN_OPT_SAVE_TITLE") ?>">
    <? endif ?>
    <? $tabControl->End(); ?>
</form>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php"); ?>
