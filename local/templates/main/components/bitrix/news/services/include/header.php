<? use Dalee\Helpers\HeaderView;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arResult */
/** @var Dalee\Helpers\ComponentHelper $helper */
$backgroundStyle = (new HeaderView())->getBackgroundStyle($arResult['PROPERTIES']['BANNER_BACKGROUND']['VALUE'] ?: null);
?>

<section class="banner-text border-green bg-linear-blue banner-text--mh-mobile-unset" <?=$backgroundStyle?>>
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-xxl-8 position-relative z-1 mb-6 mb-md-0 pt-6">
                <div class="banner-text__content d-flex flex-column align-items-start gap-3 gap-lg-4">
                    <?
                    $helper->deferredCall('showNavChain', ['.default']);
                    ?>
                    <h1 class="banner-text__title dark-0 text-break"><?=$arResult['~NAME']?></h1>
                    <div class="banner-text__description text-l dark-0"><?=$arResult['~DETAIL_TEXT']?></div>
                </div>
            </div>
        </div>
    </div>
    <?if (empty($backgroundStyle)):?>
        <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    <?endif;?>
</section>

