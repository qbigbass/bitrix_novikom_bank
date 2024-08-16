<?php
use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(null, [
    'Galago\Frontend\Asset' => LIBRARY_DIRECTORY . 'Frontend/Asset.php',
]);
