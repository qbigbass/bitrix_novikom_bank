<?php
/** @var array $arResult */
/** @var array $arParams */

foreach ($arResult['ITEMS'] as $key => $item) {
    // Формирование списка файлов
    $files = [];

    if (!empty($item['PROPERTIES']['DOCUMENTS']['VALUE'])) {
        $resultDocuments = CIBlockElement::GetList(
            [
                'SORT' => 'ASC'
            ],
            [
                'IBLOCK_ID' => iblock('documents'),
                'SECTION_ID' => $item['PROPERTIES']['DOCUMENTS']['VALUE']
            ],
            false,
            [],
            [
                'ID', 'NAME', 'PREVIEW_TEXT', 'PROPERTY_FILE'
            ]
        );
        while ($document = $resultDocuments->GetNext()) {
            if (!empty($document['PROPERTY_FILE_VALUE'])) {
                $file = CFile::GetFileArray($document['PROPERTY_FILE_VALUE']);
                $files[] = [
                    'PATH' => $file['SRC'],
                    'EXTENSION' => pathinfo($file['SRC'], PATHINFO_EXTENSION),
                    'NAME' => $document['NAME'],
                    'DATE_MODIFIED' => $file['TIMESTAMP_X'],
                ];
            }
        }
    }

    $arResult['ITEMS'][$key]['FILES'] = $files;
}
