<?php
use \Bitrix\Main\Loader;
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if(Loader::includeModule('iblock')){
    $elements = \Bitrix\Iblock\ElementTable::getList([
        'select' => ['ID', 'NAME'],
        'filter' => [
            'IBLOCK_ID' => iblock('loan_program_types'),
        ],
    ])->fetchAll();

    print_r(json_encode($elements));
} else {
    print_r(json_encode(['error' => 'Module iblock not found']));
}
