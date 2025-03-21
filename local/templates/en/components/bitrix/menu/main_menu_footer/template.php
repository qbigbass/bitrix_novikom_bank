<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php if (!empty($arResult)) { ?>
    <nav class="col-lg-12 col-xl-6 d-none d-lg-block">
        <div class="row row-gap-7">
            <?foreach ($arResult as $col => $items) { ?>
                <div class="col-4 d-flex flex-column row-gap-2 align-items-start">
                    <?foreach ($items as $item) {?>
                        <a class="text-s dark-70" href="<?=$item['LINK']?>"><?=$item['TEXT']?></a>
                    <?}?>
                </div>
            <?}?>
        </div>
        <div class="row row-gap-7 mt-7">
            <div class="col-4 d-flex flex-column row-gap-2 align-items-start">
                <a class="text-s dark-70" href="/">Site map</a>
            </div>
            <div class="col-8">
                <div class="d-flex align-items-center gap-3">
                    <img src="/frontend/dist/img/footer-insurance.png" width="120" height="120" alt="" loading="lazy">
                    <div class="d-flex flex-column row-gap-3">
                        <span class="text-s fw-semibold dark-70">General banking license No. 2546 dated November 20, 2014</span>
                        <span class="text-s fw-semibold dark-70">©&nbsp;2009&nbsp;–&nbsp;<?= date('Y') ?> JSCB "NOVIKOMBANK"</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<?php }?>
