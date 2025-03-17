<?php
namespace Dalee\Helpers;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Loader;

class Forms
{
    private string $hlBlockName = 'Formlist';
    private array $formCodes = [];
    public function includeForm(string $code): void
    {
        if (!$this->isCodeExists($code)) {
            $this->formCodes[] = $code;
        }

        $this->getHlFormData();
    }

    private function getHlFormData()
    {
        Loader::includeModule('highloadblock');

        $hlblock = HighloadBlockTable::getList([
            'filter' => ['=NAME' => $this->hlBlockName]
        ])->fetch();

        $obEntity = HighloadBlockTable::compileEntity($hlblock);
        $entityDataClass = $obEntity->getDataClass();

        $rsData = $entityDataClass::getList([
            'select' => ['UF_XML_ID'],
        ]);

        while ($arItem = $rsData->Fetch()) {
            if (!$this->isCodeExists($arItem['UF_XML_ID'])) {
                $this->formCodes[] = $arItem['UF_XML_ID'];
            }
        }
    }

    private function isCodeExists(string $code): bool
    {
        return in_array($code, $this->formCodes);
    }

    public function showAll(): void
    {
        global $APPLICATION;

        ob_start();
        foreach ($this->formCodes as $code) {
            $APPLICATION->IncludeComponent(
                "dalee:form",
                $code,
                [
                    "FORM_CODE" => $code,
                ]
            );
        }
        echo ob_get_clean();
    }
}
