<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (empty($arResult['SECTIONS'])) {
    $parentSectionId = $arResult['SECTION']['IBLOCK_SECTION_ID'];

    if ($parentSectionId > 0) {
        $activeSectionId = (int)$arResult['SECTION']['ID'];
        $filter = [
            'IBLOCK_ID' => iblock("products_services"),
            'SECTION_ID' => $parentSectionId
        ];
        $rsSections = CIBlockSection::GetList([], $filter, false, []);
        $rsSections->SetUrlTemplates("", $arParams["SECTION_URL"]);

        while ($arSection = $rsSections->GetNext()) {
            if ((int)$arSection['ID'] === $activeSectionId) {
                $arSection['ACTIVE_PAGE'] = 'Y';
            }

            $arResult['SECTIONS'][] = $arSection;
        }
    }
}
