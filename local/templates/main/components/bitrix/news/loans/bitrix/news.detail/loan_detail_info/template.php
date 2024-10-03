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

<?foreach($arResult['DISPLAY_PROPERTIES'] as $property) {?>
    <?if($property['USER_TYPE'] == 'sprint_editor') {?>
        <?$APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $property['~VALUE'],
            ),
            false,
            Array(
                "HIDE_ICONS" => "Y"
            )
        );?>
    <?}?>
<?}?>
