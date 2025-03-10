<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

if (!empty($arResult['ITEMS'])) {
    foreach ($arResult['ITEMS'] as &$item) {
        if (!empty($item['PREVIEW_PICTURE'])) {
            $renderImage = CFile::ResizeImageGet(
                $item['PREVIEW_PICTURE'],
                [
                    "width" => 523,
                    "height" => 240
                ],
                BX_RESIZE_IMAGE_EXACT
            );

            if ($renderImage["src"]) {
                $item["PICTURE"] = $renderImage["src"];
            }
        }
    }
}
