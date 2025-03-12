<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$parentElementCode = basename($APPLICATION->GetCurPage());
$element = \Bitrix\Iblock\ElementTable::getList([
    'filter' => [
        'CODE' => $parentElementCode
    ],
    'select' => ['NAME', 'PREVIEW_TEXT']
])->fetch();

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();
$headerView->render(
    $element['NAME'],
    $element['PREVIEW_TEXT'],
    ['border-green'],
);
?>

<section class="section-layout pt-xl-11">
    <div class="container">
        <div class="row px-lg-6">
            <div class="col-12">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "iblock_sections",
                    [
                        "ROOT_MENU_TYPE" => "iblock_sections",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => [],
                        "COMPONENT_TEMPLATE" => "iblock_sections",
                    ],
                );
                ?>
            </div>
        </div>
    </div>
</section>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);
} ?>

<? $helper->saveCache(); ?>
