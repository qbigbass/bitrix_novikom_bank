<?php

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;

class DaleeCaptcha extends \CBitrixComponent implements Controllerable, Errorable
{
    protected CMain $app;
    protected CDatabase $db;
    protected ErrorCollection $errorCollection;
    protected array $form;

    public function configureActions()
    {
        return [
            'update' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST]),
                    new ActionFilter\Csrf(false),
                ],
            ],
            'audio' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST]),
                    new ActionFilter\Csrf(false),
                ],
            ],
        ];
    }

    public function onPrepareComponentParams($arParams)
    {
        $this->app = $GLOBALS['APPLICATION'];
        $this->db = $GLOBALS['DB'];
        $this->errorCollection = new ErrorCollection();

        return $arParams;
    }

    public function executeComponent()
    {
        $this->arResult['CAPTCHA_CODE'] = $this->app->CaptchaGetCode();

        $this->includeComponentTemplate();
    }

    public function updateAction()
    {
        if (!$this->errorCollection->isEmpty()) {
            return null;
        }

        $code = $this->app->CaptchaGetCode();

        return [
            'captcha_sid' => $code,
        ];
    }

    public function audioAction()
    {
        $input = json_decode($this->request->getInput(), true);

        $word = $this->findWordBySid($input['captcha_sid']);
        if (empty($word)) {
            $this->errorCollection[] = new Error('Not found code');
        }

        $this->makeAudioByWord($word);

        if (!$this->errorCollection->isEmpty()) {
            return null;
        }

        return [
            'word' => $this->makeAudioByWord($word),
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

    protected function findWordBySid($sid): string
    {
        try {
            $sql = "SELECT CODE FROM b_captcha WHERE ID = '" . $this->db->ForSql($sid) . "'";
            $row = $this->db->Query($sql)->Fetch();
            if (empty($row['CODE'])) {
                throw new Exception('Not found code');
            }
            return $row['CODE'];
        } catch (Exception $e) {
            return '';
        }
    }

    protected function makeAudioByWord($word)
    {
        $symbols = str_split(mb_strtolower($word));
        $chunks = [];
        foreach ($symbols as $symbol) {
            $chunks[] = base64_encode(file_get_contents(__DIR__ . '/audio/' . $symbol . '.wav'));
        }
        return $chunks;
    }
}
