<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
use Dalee\Helpers\CardDetailPageHelper;

$clientCategoryData = CardDetailPageHelper::pageInit($arParams['IBLOCK_ID'], $arResult['VARIABLES']['ELEMENT_CODE'])->fetchClientCategoryByCode($arResult['VARIABLES']['CLIENT_CATEGORY_CODE']);
?>

<?include(__DIR__ . '/component_detail.php');?>

<?$APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php')?>
