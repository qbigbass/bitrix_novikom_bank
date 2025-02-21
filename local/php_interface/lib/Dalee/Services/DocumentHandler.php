<?php

namespace Dalee\Services;

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Request;
use CFile;
use CIBlockElement;
use CIBlockSection;
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

    /**
     * @return void
     */
    #[NoReturn] public function handleRequest(): void
    {
        $path = $this->request->getQuery("path");

        if (empty($path)) {
            $this->send404('Не указано название файла');
        }

        $pathinfo = pathinfo($path);
        $code = $pathinfo['filename'];
        $extension = $pathinfo['extension'];

        $file = $this->getFileByCode($code, $extension);

        if (empty($file)) {
            $file = $this->getFileBySectionCode($code, $extension);
        }

        if (empty($file)) {
            $this->send404('Файл отсутствует');
        }

        $this->sendFile($file, $code);
    }

    /**
     * @param string $code
     * @param string $extensionFromPath
     * @return bool|array
     */
    private function getFileByCode(string $code, string $extensionFromPath): bool|string
    {
        $filter = [
            'IBLOCK_ID' => $this->iblockId,
            'ACTIVE' => 'Y',
            '=CODE' => $code,
        ];

        $select = ['PROPERTY_FILE'];

        $element = CIBlockElement::GetList(
            ["SORT" => "ASC"],
            $filter,
            false,
            false,
            $select
        )->Fetch();

        if (empty($element)) {
            return false;
        }

        $filePath = CFile::GetPath($element['PROPERTY_FILE_VALUE']);
        if (empty($filePath)) {
            return false;
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        if ($extension !== $extensionFromPath) {
            return false;
        }

        return $filePath;
    }

    /**
     * @param string $code
     * @param string $extensionFromPath
     * @return bool|string
     */
    private function getFileBySectionCode(string $code, string $extensionFromPath): bool|string
    {
        $sectionFilter = [
            'IBLOCK_ID' => $this->iblockId,
            'ACTIVE' => 'Y',
            '=CODE' => $code,
        ];

        $section = CIBlockSection::GetList(
            ["SORT" => "ASC"],
            $sectionFilter,
            false,
            false,
            ['ID']
        )->Fetch();

        if (empty($section)) {
            return false;
        }

        $elementsFilter = [
            'IBLOCK_ID' => $this->iblockId,
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
            '=SECTION_CODE' => $code,
            '%CODE' => $code
        ];

        $elements = CIBlockElement::GetList(
            ["DATE_ACTIVE_FROM" => "DESC"],
            $elementsFilter,
            false,
            false,
            ['CODE', 'PROPERTY_FILE']
        );

        $arElements = [];
        while ($element = $elements->Fetch()) {
            $filePath = CFile::GetPath($element['PROPERTY_FILE_VALUE']);
            if (!empty($filePath)) {
                $arElements[] = [
                    'code' => $element['CODE'],
                    'path' => $filePath,
                    'extension' => pathinfo($filePath, PATHINFO_EXTENSION),
                ];
            }
        }

        if (empty($arElements)) {
            return false;
        }

        $file = $arElements[0];

        if ($file['extension'] !== $extensionFromPath) {
            return false;
        }

        return $file['path'];
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
