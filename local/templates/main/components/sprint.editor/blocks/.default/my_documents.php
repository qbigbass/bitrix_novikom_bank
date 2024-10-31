<?php
/** @var $block array */
$elements = Sprint\Editor\Blocks\IblockSections::getElements($block, ['select' => ['PROPERTY_FILE']]);
$sections = Sprint\Editor\Blocks\IblockSections::getList($block, ['select' => ['DESCRIPTION']]);

$newElements = [];
foreach ($elements as &$element) {
    $element['FILE'] = CFile::GetByID($element['PROPERTY_FILE_VALUE'])->Fetch();
    $element['FILE']['FORMAT_DATE'] = FormatDate("d.m.Y H:i", MakeTimeStamp($element['FILE']['TIMESTAMP_X']));
    $element['FILE']['EXTENSION_FILE'] = GetFileExtension($element['FILE']['SRC']);
    $newElements[$element['IBLOCK_SECTION_ID']][] = $element;
}
unset($element);

foreach ($sections as &$section) {
    $section['ELEMENTS'] = $newElements[$section['ID']] ?? [];
}
unset($section);
?>

<div class="section-help-content-layout">
    <div class="section-help-content-layout__left">
        <div class="a-accordion js-a-accordion a-accordion-component">
            <?foreach ($sections as $section) {?>
                <div class="a-accordion-panel js-a-accordion-panel">
                    <button class="a-accordion-header js-a-accordion-header">
                        <div class="body-l-light"><?=$section['NAME']?></div>
                        <span class="a-icon a-accordion-header__icon size-m">
                            <svg>
                                <use xlink:href="/frontend/dist/assets/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </span>
                    </button>
                    <div class="a-accordion-content js-a-accordion-content">
                        <p class="body-m-light dark-70" style="margin-bottom: 1.5rem;"><?=$section['DESCRIPTION']?></p>
                        <?foreach ($section['ELEMENTS'] as $element) {?>
                            <div class="document-download body-m-light">
                                <a href="<?=$element['FILE']['SRC']?>" class="document-download__head body-m-light" download><?=$element['NAME']?></a>
                                <div class="document-download__body">
                                    <div class="document-download__file caption-m">
                                        <span class="document-download__date-time"><?=$element['FILE']['FORMAT_DATE']?></span>
                                        <span class="document-download__file-type"><?=$element['FILE']['EXTENSION_FILE']?></span>
                                    </div>
                                    <a href="<?=$element['FILE']['SRC']?>" class="document-download__link">
                                        <span class="a-icon size-s">
                                            <svg>
                                                <use xlink:href="/frontend/dist/assets/svg-sprite.svg#icon-download"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            <?}?>
        </div>
    </div>
    <div class="section-help-content-layout__right">
        <div class="benefit-card benefit-card--grey">
            <div class="benefit-card__title">
                <div class="headline-3">Защита от мошенников</div>
            </div>
            <div class="benefit-card__description body-m-light">Узнайте как уберечь себя и своих близких от финансового мошенничества.</div>
            <div class="benefit-card__footer">
                <span class="a-icon green-100 size-xxl">
                    <svg>
                        <use xlink:href="/frontend/dist/assets/svg-sprite.svg#icon-a-protection"></use>
                    </svg>
                </span>
                <a href="#" class="a-button a-button--m a-button--primary a-button--link a-button--text">Подробнее
                    <span class="a-icon a-button__icon">
                        <svg>
                            <use xlink:href="/frontend/dist/assets/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

