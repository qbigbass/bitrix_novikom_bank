<?php

namespace Dalee\Services;

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Request;
use CFile;
use CIBlockElement;
use Exception;
use JetBrains\PhpStorm\NoReturn;

class DocumentHandler
{
    private Request $request;
    private int $iblockId;

    /**
     * @param $request
     * @throws LoaderException
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->initializeModules();
        $this->iblockId = iblock("documents");
    }

    /**
     * @return void
     * @throws LoaderException
     */
    private function initializeModules(): void
    {
        if (!Loader::includeModule("iblock")) {
            throw new Exception("Failed to load iblock module.");
        }
    }

    public function handleRequest()
    {
        $path = $this->request->getQuery("path");

        if (empty($path)) {
            $this->send404('Не указано название файла');
        }

        $code = $this->extractCodeFromPath($path);
        $element = $this->getElementByCode($code);

        if (empty($element)) {
            $this->send404('Файл отсутствует');
        }

        $filePath = $this->getFilePath($element);

        if (empty($filePath)) {
            $this->send404('Файл отсутствует');
        }

        $this->sendFile($filePath, $code);
    }

    /**
     * @param $path
     * @return string
     */
    private function extractCodeFromPath($path): string
    {
        return explode('.', $path)[0];
    }

    /**
     * @param $code
     * @return bool|array
     */
    private function getElementByCode($code): bool|array
    {
        $filter = [
            'IBLOCK_ID' => $this->iblockId,
            '=CODE' => $code,
        ];

        $select = ['PROPERTY_FILE'];

        $elements = CIBlockElement::GetList(
            ["SORT" => "ASC"],
            $filter,
            false,
            false,
            $select
        );

        return $elements->Fetch();
    }

    /**
     * @param $element
     * @return string|null
     */
    private function getFilePath($element): ?string
    {
        return CFile::GetPath($element['PROPERTY_FILE_VALUE']);
    }

    /**
     * @param $filePath
     * @param $code
     * @return void
     */
    #[NoReturn] private function sendFile($filePath, $code): void
    {
        $GLOBALS['APPLICATION']->RestartBuffer();
        $fileData = pathinfo($filePath);
        header("Content-Disposition:attachment;filename=" . $code . "." . $fileData['extension']);
        readfile($_SERVER['DOCUMENT_ROOT'] . $filePath);
        exit;
    }

    /**
     * @param $message
     * @return void
     */
    #[NoReturn] private function send404($message): void
    {
        Tools::process404($message, true, true, true);
        exit;
    }
}
