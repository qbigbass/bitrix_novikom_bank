<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @global CMain $APPLICATION
 */
?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "hero",
    [
        'CODE' => 'hero',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "special_conditions",
    [
        'CODE' => 'special_conditions',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "supreme",
    [
        'CODE' => 'supreme',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "bank_for_you",
    [
        'CODE' => 'bank_for_you',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "services",
    [
        'CODE' => 'services',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "become_client",
    [
        'CODE' => 'become_client',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
$APPLICATION->IncludeComponent(
    "dalee:content.json",
    "contacts",
    [
        'CODE' => 'contacts',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
