<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    ".default",
    Array(
        "JSON" => $arResult['SECTION']['~UF_BANNER'],
    ),
    false,
    Array(
        "HIDE_ICONS" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    ".default",
    Array(
        "JSON" => $arResult['SECTION']['~UF_CONDITIONS'],
    ),
    false,
    Array(
        "HIDE_ICONS" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    ".default",
    Array(
        "JSON" => $arResult['SECTION']['~UF_STEP_BY_STEP'],
    ),
    false,
    Array(
        "HIDE_ICONS" => "Y"
    )
);?>
