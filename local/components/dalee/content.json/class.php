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
        return [
            'saveLead' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST]),
                    new ActionFilter\Csrf(true),
                ],
            ],
        ];
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

    public function saveLeadAction(): ?array
    {
        $input = $this->request->getPostList()->toArray();

        $form = FormHelper::getByCode($input['FORM_CODE']);
        $formId = $form['ID'];

        if (!empty($input['PHONE'])) {
            $input['PHONE'] = preg_replace('/[^0-9\+]/', '', $input['PHONE']);
        }

        $values = FormHelper::remapRequestFields($formId, $input);

        if ($form['USE_CAPTCHA'] === 'Y') {
            $values['captcha_word'] = $input['captcha_word'];
            $values['captcha_sid'] = $input['captcha_sid'];
        }

        $errors = \CForm::Check($formId, $values);
        if ($errors) {
            $messages = explode('<br>', $errors);
            foreach ($messages as $message) {
                $this->errorCollection[] = new Error($message);
            }
        }

        if ($this->errorCollection->isEmpty()) {
            $resultId = \CFormResult::Add($formId, $values);
            if (!$resultId) {
                $this->errorCollection[] = new Error('Не удалось сохранить результат');
            }

            if ($this->errorCollection->isEmpty()) {
                $res = \CFormResult::Mail($resultId);
                if (!$res) {
                    $this->errorCollection[] = new Error('Не удалось отправить уведомление');
                }
            }
        }

        if (!$this->errorCollection->isEmpty()) {
            return null;
        }

        return [
            'result' => 'OK',
        ];
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
