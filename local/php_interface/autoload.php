<?php
use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(null, [
    'Galago\Frontend\Asset' => LIBRARY_DIRECTORY . 'Frontend/Asset.php',
    'Galago\CustomFields\CustomElementProperty' => LIBRARY_DIRECTORY . 'CustomFields/CustomElementProperty.php',
    'Galago\Classes\CustomIblockElements' => LIBRARY_DIRECTORY . 'Classes/CustomIblockElements.php',
]);
