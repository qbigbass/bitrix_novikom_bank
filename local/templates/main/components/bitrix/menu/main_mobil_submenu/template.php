<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
    <div class="a-accordion js-a-accordion a-accordion-component">
        <?foreach ($arResult['FIRST_LEVEL_MENU'] as $firstLevelItem) {?>
            <?if ($firstLevelItem['IS_PARENT']) {?>
                <div class="a-accordion-panel js-a-accordion-panel">
                    <button class="a-accordion-header js-a-accordion-header">
                        <span class="mobile-menu__title"><?=$firstLevelItem['TEXT']?></span>
                        <span class="a-icon a-accordion-header__icon size-m">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </span>
                    </button>
                    <div class="a-accordion-content js-a-accordion-content">
                        <div class="mobile-submenu">
                            <div class="mobile-submenu__col">
                                <?$count = 1;?>
                                <?$parentItemIndex = $firstLevelItem['ITEM_INDEX'];?>
                                <?foreach ($arResult['SECOND_LEVEL_MENU'][$parentItemIndex] as $secondLevelItem) {?>
                                <a href="<?=$secondLevelItem['LINK']?>" class="mobile-submenu__link"><?=$secondLevelItem['TEXT']?></a>
                                <?if($count == 4) {?>
                            </div>
                            <div class="mobile-submenu__col">
                                <?$count = 1;?>
                                <?} else {?>
                                    <?$count++;?>
                                <?}?>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            <?} else {?>
                <div class="a-accordion-panel">
                    <a href="<?=$firstLevelItem['LINK']?>" class="a-accordion-header">
                        <span class="mobile-menu__title"><?=$firstLevelItem['TEXT']?></span>
                    </a>
                </div>
            <?}?>
        <?}?>
    </div>
<?}?>
