<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$terms = [
    'RATE_TO' => [
        'SIGN' => 'Процентная ставка',
        'FROM_TO' => 'до&nbsp;',
    ],
    'SUM_FROM' => [
        'SIGN' => 'Сумма',
        'FROM_TO' => 'от&nbsp;',
    ],
    'PERIOD_FROM' => [
        'SIGN' => 'Срок',
        'FROM_TO' => 'от&nbsp;',
        'PERIOD' => 'days',
    ]
];

?>

<? foreach ($arResult['ITEMS'] as $item) { ?>
    <?
    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div
        class="card-product-list overflow-hidden position-relative mh-100 h-auto bg-dark-10 w-100 pt-7 pb-6 py-sm-9 py-md-9 py-lg-11 px-3 px-sm-4 px-md-5 px-lg-6 pe-xxl-11"
        id="<?= $this->GetEditAreaId($item['ID']); ?>">
        <div
            class="card-product-list__inner d-flex flex-column flex-lg-row align-items-start h-100 gap-3 gap-md-6 gap-xxl-11">
            <div class="card-product-list__image-container mx-auto">
                <img class="card-product-list__image" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>"
                     alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
            </div>
            <div class="card-product-list__content flex-column d-flex align-items-start gap-6 gap-lg-9 w-100">
                <div class="card-product-list__title-group d-flex flex-column gap-4 gap-lg-6">
                    <a href="<?=$item['DETAIL_PAGE_URL']?>">
                        <h2 class="card-product-list__title text-break"><?= $item['~NAME'] ?></h2>
                    </a>
                    <span class="text-l card-product-list__description m-0"><?= $item['~PREVIEW_TEXT'] ?></span>
                </div>

                <? if (!empty($item['PROPERTIES']['TERMS'])) { ?>
                    <div
                        class="card-product-list__condition-list w-100 w-lg-auto d-flex justify-content-between justify-content-lg-start flex-column flex-sm-row flex-wrap row-gap-4 row-gap-sm-6 row-gap-lg-6 row-gap-xxl-6 gap-xl-12 gap-xxl-16">

                        <? $termsValues = processTerms($terms, $item['PROPERTIES']['TERMS'], true);
                        foreach ($termsValues as $term) { ?>
                            <div class="card-product-list__condition d-flex flex-column gap-2 w-100 w-sm-50 w-xl-auto justify-content-end">
                                <div class="d-inline-flex flex-nowrap align-items-baseline">
                                    <span
                                        class='text-l fw-semibold'><?= preg_match('/\d/', $term['VALUE']) ? $term['FROM_TO'] : '' ?></span>
                                    <span class='<?= preg_match('/\d/', $term['VALUE']) ? 'text-number-l' : 'text-number-m' ?> fw-bold'><?= $term['VALUE'] ?></span>
                                </div>
                                <span class='text-m dark-70'><?= $term['SIGN'] ?></span>
                            </div>
                        <? } ?>

                    </div>
                <? } ?>

                <div class="d-flex flex-column flex-sm-row align-items-center gap-5 gap-sm-6 w-100">
                    <? if (!empty($item['PROPERTIES']['BUTTON_DETAIL']['VALUE']) && !empty($item['PROPERTIES']['BUTTON_HREF_DETAIL']['VALUE'])): ?>
                        <a class="btn btn-tertiary btn-lg-lg card-product-list__button w-100 w-sm-auto" href="<?=$item['PROPERTIES']['BUTTON_HREF_DETAIL']['VALUE']?>">
                            <?= $item['PROPERTIES']['BUTTON_TEXT_DETAIL']['VALUE'] ?>
                        </a>
                    <? elseif (!empty($item['PROPERTIES']['BUTTON_DETAIL']['VALUE']) && !empty($item['PROPERTIES']['BUTTON_CODE_FORM']['VALUE'])): ?>
                        <button class="btn btn-tertiary btn-lg-lg card-product-list__button w-100 w-sm-auto" type="button" data-bs-toggle="modal" data-bs-target="#<?=$item['PROPERTIES']['BUTTON_CODE_FORM']['VALUE']?>">
                            <?= $item['PROPERTIES']['BUTTON_TEXT_DETAIL']['VALUE'] ?>
                        </button>
                        <?
                        global $FORMS;
                        $FORMS->includeForm($item['PROPERTIES']['BUTTON_CODE_FORM']['VALUE']);
                        ?>
                    <? endif; ?>
                    <a class="btn btn-link btn-lg-lg d-inline-flex gap-2 align-items-center card-product-list__button-more"
                       href="<?= $item['CODE'] == 'restructuring' ? '/loans/restructuring/' : $item['DETAIL_PAGE_URL'] ?>">
                        <span>Подробнее</span>
                        <svg class="card-product-list__button-icon" xmlns="http://www.w3.org/2000/svg" width="100%"
                             height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
<? } ?>
