<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @global CMain $APPLICATION */

$elementDetailCardQuery = $arResult['elementDetailCardQuery'];

// подключение компонента sprint.editor
$this->__template->SetViewTarget('detailCardInformation');

$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    "",
    Array(
        "JSON" => $elementDetailCardQuery['ADVANTAGES_VALUE'],
    ),
    false,
    Array(
        "HIDE_ICONS" => "Y"
    )
);

$this->__template->EndViewTarget();
