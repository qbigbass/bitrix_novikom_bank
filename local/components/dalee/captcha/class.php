<?php

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Dalee\Entities\CaptchaTable;

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

    public function onPrepareComponentParams($arParams): array
    {
        $this->app = $GLOBALS['APPLICATION'];
        $this->db = $GLOBALS['DB'];
        $this->errorCollection = new ErrorCollection();

        return $arParams;
    }

    public function executeComponent(): void
    {
        $this->arResult['CAPTCHA_CODE'] = $this->app->CaptchaGetCode();

        $this->includeComponentTemplate();
    }

    public function updateAction(): ?array
    {
        if (!$this->errorCollection->isEmpty()) {
            return null;
        }

        $code = $this->app->CaptchaGetCode();

        return [
            'captcha_sid' => $code,
        ];
    }

    public function audioAction(): ?array
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

    public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    public function getErrorByCode($code)
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    protected function findWordBySid($sid): string
    {
        $result = CaptchaTable::query()
            ->setSelect(['CODE'])
            ->where('ID', $sid)
            ->exec()
            ->fetchObject();

        if ($result && $code = $result->getCode()) {
            return $code;
        }

        return '';
    }

    protected function makeAudioByWord($word): array
    {
        $symbols = str_split(mb_strtolower($word));
        $chunks = [];
        foreach ($symbols as $symbol) {
            $chunks[] = base64_encode(file_get_contents(__DIR__ . '/audio/' . $symbol . '.mp3'));
        }
        return $chunks;
    }
}
