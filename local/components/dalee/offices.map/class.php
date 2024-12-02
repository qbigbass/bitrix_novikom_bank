<?php

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Dalee\Services\OfficesService;

class OfficesMap extends \CBitrixComponent implements Controllerable, Errorable
{
    protected CMain $app;
    protected CDatabase $db;
    protected ErrorCollection $errorCollection;
    protected OfficesService $service;

    public function configureActions(): array
    {
        return [
            'fetchOffices' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_GET]),
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
        $this->service = new OfficesService();

        return $arParams;
    }

    public function executeComponent(): void
    {
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

    public function fetchOfficesAction(string $type): ?array
    {
        $result = $this->service->fetchOffices($type);

        if (!$this->errorCollection->isEmpty()) {
            return null;
        }

        return [
            'items' => $result['items'],
            'services' => $result['services'],
        ];
    }
}
