<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

use Dalee\Helpers\ComponentHelper;
use Dalee\Helpers\ComponentRenderer\Renderer;

$parentTemplateFolder = $component->GetParent()->getTemplate()->GetFolder();
$helper = new ComponentHelper($component);
$renderer = new Renderer($APPLICATION, $component);
?>

<?$APPLICATION->IncludeFile(
    $parentTemplateFolder . '/include/header.php',
    [
        'helper' => $helper,
        'arResult' => $arResult
    ]
)?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE'])): ?>
                <div class="row mb-6 mb-lg-7">
                    <h3><?=$arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE']?></h3>
                </div>
            <?endif;?>
            <div class="row row-gap-6">
                <? $renderer->render('Benefits', $arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE']); ?>
            </div>
        </div>
    </section>
<?endif;?>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);
} ?>

<?$helper->saveCache();?>
