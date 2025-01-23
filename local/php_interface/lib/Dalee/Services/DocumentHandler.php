<?php

namespace Dalee\Services;

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
            $this->send404();
        }

        $code = $this->extractCodeFromPath($path);
        $element = $this->getElementByCode($code);

        if (empty($element)) {
            $this->send404();
        }

        $filePath = $this->getFilePath($element);

        if (empty($filePath)) {
            $this->send404();
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
            'CODE' => $code,
            '<=PROPERTY_ACTIVE_FROM' => date('Y-m-d H:i:s'),
            '>=PROPERTY_ACTIVE_TO' => date('Y-m-d H:i:s')
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
        $fileData = pathinfo($filePath);
        header("Content-Disposition:attachment;filename=" . $code . "." . $fileData['extension']);
        readfile($filePath);
        exit;
    }

    /**
     * @return void
     */
    #[NoReturn] private function send404(): void
    {
        require($_SERVER["DOCUMENT_ROOT"] . "/404.php");
        exit;
    }
}
