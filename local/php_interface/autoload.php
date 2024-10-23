<?php
use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(null, [
    'Lib\UserType\CUserTypeStringDescr' => '/local/php_interface/Lib/UserType/CUserTypeStringDescr.php',
    'Lib\Classes\ElementPropertiesFetcher' => '/local/php_interface/Lib/Classes/ElementPropertiesFetcher.php',
    'Lib\Classes\ElementDTO' => '/local/php_interface/Lib/Classes/ElementDTO.php',
    'Lib\Classes\ElementPropertyDTO' => '/local/php_interface/Lib/Classes/ElementPropertyDTO.php',
]);
