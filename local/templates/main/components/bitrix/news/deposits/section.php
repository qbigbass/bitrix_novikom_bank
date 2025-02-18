<?

$code = $arResult['VARIABLES']['SECTION_CODE'];
$element = Dalee\Helpers\IblockHelper::getIblockElementByFilter([
    '=CODE' => $code,
    'ACTIVE' => 'Y',
    'IBLOCK_ID' => $arParams['IBLOCK_ID']
]);
if (!empty($element)) {
    unset($arResult["VARIABLES"]["SECTION_CODE"]);
    $arResult["VARIABLES"]["ELEMENT_CODE"] = $code;
    $arResult["VARIABLES"]["ELEMENT_ID"] = $element[0]['ID'];
    include($_SERVER["DOCUMENT_ROOT"] . "/" . $this->GetFolder() . "/detail.php");
} else {
    include($_SERVER["DOCUMENT_ROOT"] . "/" . $this->GetFolder() . "/elements_list.php");
}
