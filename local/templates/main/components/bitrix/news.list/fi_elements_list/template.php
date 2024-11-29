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
$this->setFrameMode(true);
?>

<?if(!empty($arResult["ITEMS"])):?>
    <?if ($arResult["SHOW_UP_MENU"] && !empty($arResult["UP_MENU"])):?>
        <div class="anchor-panel bg-white sticky-lg-top">
            <div class="container d-flex py-3 overflow-auto">
                <div class="d-flex flex-nowrap flex-md-wrap gap-4 column-gap-md-5 row-gap-md-4 column-gap-lg-6">
                    <?foreach ($arResult["UP_MENU"] as $item):?>
                        <a class="anchor-item text-l text-nowrap" href="#<?= $item["CODE"]?>"><?= $item["TITLE"]?></a>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    <?endif;?>
    <?foreach ($arResult["ITEMS"] as $item):?>
        <section class="section-layout" id="<?= $item['CODE']?>">
            <div class="container">
                <div class="row row-gap-6 row-gap-lg-11">
                    <div class="col-12">
                        <h2 class="mb-3 mb-md-4 px-lg-6"><?= $item['NAME']?></h2>
                        <p class="text-l px-lg-6 m-0"><?= $item['PREVIEW_TEXT']?></p>
                    </div>

                    <?if(!empty($item["QUOTES"]["POS_0"])):?>
                        <div class="col-12">
                            <div class="col-12">
                                <div class="polygon-container js-polygon-container">
                                    <div class="polygon-container__content">
                                        <div class="helper bg-dark-30">
                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                <img class="helper__image w-auto float-end" src="<?= $item["QUOTES"]["POS_0"]["PICTURE"] ?>" alt="Обратите внимание" loading="lazy">
                                                <div class="helper__content text-l">
                                                    <?if($item["QUOTES"]["POS_0"]["TITLE"]):?>
                                                        <h4 class="mb-3"><?= $item["QUOTES"]["POS_0"]["TITLE"] ?></h4>
                                                    <?endif;?>
                                                    <p class="m-0"><?= $item["QUOTES"]["POS_0"]["TEXT"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg" height="208.0001220703125" width="1345.5999755859375">
                                            <polygon points="2,2 1344,2 1344,166 1304,206 2,206" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endif;?>
                </div>
            </div>
        </section>
    <?endforeach;?>
    <?if ($arResult["SHOW_BLOCK_CONTACT"]):?>
        <!-- Блок "Контакты" -->
        <? showBlockContact(); ?>
        <?= $GLOBALS["BLOCK_CONTACT"]; ?>
    <?endif;?>
<?endif;?>
