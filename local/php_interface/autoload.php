<?php
use Bitrix\Main\Loader;

//Loader::registerAutoLoadClasses(null, [
//    'Lib\UserType\CUserTypeStringDescr' => '/local/php_interface/lib/UserType/CUserTypeStringDescr.php',
//    'Lib\Classes\ElementPropertiesFetcher' => '/local/php_interface/lib/Classes/ElementPropertiesFetcher.php',
//    'Lib\Classes\ElementDTO' => '/local/php_interface/lib/Classes/ElementDTO.php',
//    'Lib\Classes\ElementPropertyDTO' => '/local/php_interface/lib/Classes/ElementPropertyDTO.php',
//    'Lib\Classes\RatesFetcher' => '/local/php_interface/lib/Classes/RatesFetcher.php',
//]);

Loader::registerNamespace('Dalee', __DIR__ . '/lib/Dalee');
Loader::registerNamespace('Dalee\\Jsoneditor\\', $_SERVER['DOCUMENT_ROOT'] . '/local/modules/dalee.jsoneditor/lib');
Loader::registerNamespace('Dalee\\Jsonschema\\', $_SERVER['DOCUMENT_ROOT'] . '/local/modules/dalee.jsonschema/lib');
