<?php
require 'constants.php';
require 'functions.php';
require 'autoload.php';
require 'events_handler.php';

function printIntoFile($text, string $filePath = '/logger.txt') {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . $filePath, print_r($text, true), FILE_APPEND);
}
