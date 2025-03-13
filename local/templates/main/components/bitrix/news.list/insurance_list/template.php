<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

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

use Dalee\Libs\Tabs\TabContent;

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();
$title = $arResult["SECTION"]["PATH"][0]["~NAME"] ?? '';
$headerView->render(
    $title,
    "",
    ["border-green", "banner-text--mh-mobile-unset"]
);
?>
<? if (!empty($arResult["ITEMS"])) : ?>
    <section class="section-layout py-4 py-md-7 py-lg-11 px-lg-6">
        <div class="container">
            <div class="row row-gap-5 row-gap-md-6 row-gap-lg-7">
                <div class="col-12">
                    <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-insurance-programs">
                        <?foreach ($arResult["ITEMS"] as $index => $value): ?>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?= $index ?>"
                                        aria-expanded="false"
                                        aria-controls="<?= $index ?>"
                                    >
                                        <span class="fw-bold h4"><?= $value["NAME"] ?></span>
                                    </button>
                                </div>
                                <div
                                    class="accordion-collapse collapse"
                                    id="<?= $index ?>"
                                    data-bs-parent="#accordion-insurance-programs"
                                >
                                    <div class="accordion-body">
                                        <? if (!empty($value["DETAIL_TEXT"])) : ?>
                                            <?= TabContent::render(
                                                $value['~DETAIL_TEXT'],
                                                $value['DISPLAY_PROPERTIES'],
                                                $value['ID'] ?? null,
                                                true,
                                                $value,
                                                true,
                                                [
                                                    "DOCUMENTS_PLACEHOLDER_TEMPLATE" => "SIMPLE"
                                                ]
                                            ) ?>
                                        <? endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
            <picture class="pattern-bg pattern-bg--position-sm-top">
                <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
            </picture>
    </section>
<? endif; ?>

<? $helper->saveCache(); ?>
