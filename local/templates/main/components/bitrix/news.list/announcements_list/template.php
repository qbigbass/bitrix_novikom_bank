<?if (!empty($arResult['ITEMS'])) : ?>
    <div class="row px-lg-6">
        <div class="col-12 col-lg-8 col-xl-7">
            <div class="d-flex flex-column gap-4">
                <?foreach ($arResult['ITEMS'] as $item) : ?>
                    <div class="search-item d-flex flex-column gap-3 gap-md-4 pb-3 pb-md-4 border-bottom-dashed">
                        <div class="search-item__header">
                            <div class="tag tag--outline">
                                <span class="tag__content text-s fw-semibold"><?= $item['PROPERTIES']['TYPE_AD']['VALUE']?></span>
                                <span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <?if( $item['PROPERTIES']['FIX_AD']['VALUE_XML_ID'] === 'yes') : ?>
                                <div class="position-absolute top-0 end-0">
                                    <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-pin"></use>
                                    </svg>
                                </div>
                            <?endif;?>
                        </div>
                        <a class="search-item__content d-flex gap-2 gap-md-3 justify-content-between" href="<?= $item['DETAIL_PAGE_URL']?>">
                            <div class="d-flex flex-column flex-md-row gap-2 gap-md-3">
                                <span class="search-item__date text-m dark-70"><?= $item['PROPERTIES']['DATE']['VALUE']?></span>
                                <span class="search-item__name text-m dark-100"><?= $item['NAME']?></span>
                            </div>
                            <div class="d-none d-md-block">
                                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg>
                            </div>
                        </a>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="section-search-result__pagination">
                <?=$arResult["NAV_STRING"]?>
            </div>
        </div>
    </div>
<?endif;?>
