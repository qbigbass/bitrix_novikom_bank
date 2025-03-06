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

<section class="section-layout py-4 py-md-7 py-lg-11 px-lg-6">
    <div class="container">
        <div class="row row-gap-5 row-gap-md-6 row-gap-lg-7">
            <div class="col-12">
                <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-insurance-programs">
                    <?foreach ($arResult['DISPLAY_PROPERTIES']['PROGRAMS']['VALUE'] as $index => $value): ?>
                        <?
                            $properties = $value['SUB_VALUES'];
                            $showClass = ($index == 0) ? 'show' : '';
                            $collapsedClass = ($index == 0) ? '' : 'collapsed';
                        ?>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button <?=$collapsedClass?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$index?>" aria-expanded aria-controls="<?=$index?>">
                                    <span class="fw-bold h4"><?=$properties['PROGRAM_NAME']['~VALUE']?></span>
                                </button>
                            </div>
                            <div class="accordion-collapse collapse <?=$showClass?>" id="<?=$index?>" data-bs-parent="#accordion-insurance-programs">
                                <div class="accordion-body">
                                    <? if(!empty($properties['PROGRAM_DESCRIPTION']['~VALUE']['TEXT'])) : ?>
                                        <div class="rte rte--accordion">
                                    <? else: ?>
                                        <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-7">
                                    <? endif; ?>
                                        <?= $properties['PROGRAM_DESCRIPTION']['~VALUE']['TEXT'] ?>
                                        <?if(!empty($properties['PROGRAM_FILE']['VALUE'])): ?>
                                            <?
                                                $file = CFile::GetFileArray($properties['PROGRAM_FILE']['VALUE']);
                                                $fileName = $file['ORIGINAL_NAME'];
                                                $fileType = pathinfo($file['SRC'], PATHINFO_EXTENSION);
                                            ?>
                                            <div>
                                                <h5>Подробнее о программе</h5>
                                                <div class="link-list">
                                                    <a
                                                        class="d-flex flex-column gap-2 py-3 document-download text-m"
                                                        href="<?= $file['SRC'] ?>"
                                                        download="<?= $file['FILE_NAME'] ?>"
                                                    ><?= $fileName ?>
                                                        <div class="d-flex gap-1 align-items-center">
                                                            <div class="document-download__file caption-m dark-70">
                                                                <span class="document-download__date-time"><?= date('d.m.Y H:i', strtotime($file['TIMESTAMP_X'])) ?></span>
                                                                <span class="document-download__file-type"><?= $fileType ?></span>
                                                            </div>
                                                            <span class="icon size-s text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {

    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);

} ?>

<?$helper->saveCache();?>
