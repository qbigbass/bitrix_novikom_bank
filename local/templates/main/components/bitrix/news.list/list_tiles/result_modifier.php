<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$arResult["UP_ITEMS"] = false;
$arResult["CENTER_ITEMS"] = false;
$arResult["DOWN_ITEMS"] = false;

if (!empty($arResult['ITEMS'])) {
    foreach ($arResult['ITEMS'] as $item) {
        if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] === 'Сверху') {
            $arResult["UP_ITEMS"] = true;
        }

        if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] === 'По центру') {
            $arResult["CENTER_ITEMS"]  = true;
        }

        if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] === 'Снизу') {
            $arResult["DOWN_ITEMS"] = true;
        }
    }
}
