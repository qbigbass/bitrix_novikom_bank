<?php

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Dalee\Helpers\FormHelper;

class DaleeContentJson extends \CBitrixComponent implements Controllerable, Errorable
{
    protected CMain $app;
    protected ErrorCollection $errorCollection;
    protected array $form;

    public function configureActions(): array
    {
        return [];
    }

    public function onPrepareComponentParams($arParams): array
    {
        try {
            if (!Loader::includeModule('iblock')) {
                throw new LoaderException('Module "iblock" is not installed');
            }
        } catch (LoaderException $e) {
            ShowError($e->getMessage());
        }

        $this->app = $GLOBALS['APPLICATION'];
        $this->errorCollection = new ErrorCollection();

        return $arParams;
    }

    public function executeComponent(): void
    {
        $res = CIBlockElement::GetList(
            [],
            [
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                '=CODE' => $this->arParams['CODE'],
            ],
            false,
            false,
            [
                'PROPERTY_CONTENT_JSON',
            ]
        );

        if ($row = $res->Fetch()) {
            $this->arResult['CONTENT_JSON'] = json_decode($row['PROPERTY_CONTENT_JSON_VALUE'], true);
        } else {
            $this->arResult['CONTENT_JSON'] = [];
        }

        $this->includeComponentTemplate();
    }

    public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    public function getErrorByCode($code): ?Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }
}
