<?php

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Dalee\Helpers\FormHelper;

class DaleeForm extends \CBitrixComponent implements Controllerable, Errorable
{
    protected CMain $app;
    protected ErrorCollection $errorCollection;
    protected array $form;

    public function configureActions()
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

    public function onPrepareComponentParams($arParams)
    {
        try {
            if (!Loader::includeModule('form')) {
                throw new LoaderException('Module "form" not installed');
            }
        } catch (LoaderException $e) {
            ShowError($e->getMessage());
        }

        $this->app = $GLOBALS['APPLICATION'];
        $this->form = FormHelper::getByCode($arParams['FORM_CODE']);
        $this->arResult['USE_CAPTCHA'] = $this->form['USE_CAPTCHA'];

        $this->errorCollection = new ErrorCollection();

        return $arParams;
    }

    public function executeComponent()
    {
        if ($this->form['USE_CAPTCHA'] === 'Y') {
            $this->arResult['CAPTCHA_CODE'] = $this->app->CaptchaGetCode();
        }

        $this->arResult['ACTION_URL'] = '/bitrix/services/main/ajax.php?mode=class&c=dalee:form&action=saveLead';

        $this->includeComponentTemplate();
    }

    public function saveLeadAction()
    {
        $input = $this->request->getPostList()->toArray();
        $formId = $this->form['ID'];
        $values = FormHelper::remapRequestFields($formId, $input);

        if ($this->form['USE_CAPTCHA'] === 'Y') {
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

    public function getErrors()
    {
        return $this->errorCollection->toArray();
    }

    public function getErrorByCode($code)
    {
        return $this->errorCollection->getErrorByCode($code);
    }
}
