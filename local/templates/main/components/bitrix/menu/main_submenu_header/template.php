<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
    <div class="desktop-nav-layout__second-menu">
        <nav data-spoiler-event="click" class="desktop-secondary-menu js-desktop-secondary-menu js-spoiler-group">
            <?foreach($arResult['FIRST_LEVEL_MENU']['NOT_HIDDEN'] as $notHiddenItem) {?>
                <?$issetChildren = isset($arResult['SECOND_LEVEL_MENU'][$notHiddenItem['ITEM_INDEX']])?>
                <?$jsDesktopMoveLink = ($notHiddenItem['JS_DESKTOP_MOVE_LINK']) ? ' js-desktop-move-link' : '';?>
                <?if($issetChildren) {?>
                    <span class="desktop-secondary-menu__item body-m-heavy js-spoiler-button<?=$jsDesktopMoveLink?>" data-spoiler-id="spoiler-<?=$notHiddenItem['ITEM_INDEX']?>">
                        <span class="icon-box icon-box--gap-xs">
                            <span class="icon-box__body">
                                <?=$notHiddenItem['TEXT']?>
                            </span>
                            <span class="icon-box__icon">
                                <span class="a-icon size-s" slot="icon-after">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down-small"></use>
                                    </svg>
                                </span>
                            </span>
                        </span>
                    </span>
                <?} else {?>
                    <a href="<?=$notHiddenItem['LINK']?>" class="desktop-secondary-menu__item body-m-heavy<?=$jsDesktopMoveLink?>">
                        <span class="icon-box icon-box--gap-xs">
                            <span class="icon-box__body">
                                <?=$notHiddenItem['TEXT']?>
                            </span>
                        </span>
                    </a>
                <?}?>
            <?}?>
            <?if(!empty($arResult['HIDDEN'])) {?>
                <button class="a-button drop-down-button js-drop-down-button a-button--s a-button--transparent">
                    <span class="a-icon size-m">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-more"></use>
                        </svg>
                    </span>
                    <div class="drop-down-menu js-drop-down-menu">
                        <?foreach ($arResult['FIRST_LEVEL_MENU']['HIDDEN'] as $hiddenItem) {?>
                            <a href="<?=$hiddenItem['LINK']?>" class="drop-down-menu__link"><?=$hiddenItem['TEXT']?></a>
                        <?}?>
                    </div>
                </button>
            <?}?>
            <button type="button" class="button-search js-spoiler-button" data-spoiler-id="search">
                <span class="a-icon size-m">
                    <svg>
                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-search"></use>
                    </svg>
                </span>
            </button>
        </nav>
    </div>
    <div class="desktop-nav-layout__third-menu">
        <?foreach ($arResult['SECOND_LEVEL_MENU'] as $indexItem => $secondLevelItems) {?>
            <div class="desktop-third-lvl-nav" data-spoiler="spoiler-<?=$indexItem?>">
                <div class="desktop-third-lvl-nav__column">
                    <?$count = 1;?>
                    <?foreach ($secondLevelItems as $item) {?>
                        <a href="<?=$item['LINK']?>" class="inherits-link body-m-heavy"><?=$item['TEXT']?></a>
                        <?if($count == 4) {?>
                            </div>
                            <div class="desktop-third-lvl-nav__column">
                            <?$count = 1;?>
                        <?} else {?>
                            <?$count++;?>
                        <?}?>
                    <?}?>
                </div>
                <div class="desktop-third-lvl-nav__aside">
                    <div class="a-polygon-container js-a-polygon-container">
                        <div class="a-polygon-container__content">
                            <div class="card-menu">
                                <h3 class="card-menu__title headline-4">Зарплатная карта «Мир»</h3>
                                <p class="card-menu__description body-s-light">
                                    Карта с&nbsp;полным набором<br>
                                    операций в&nbsp;торговых точках<br>
                                    и&nbsp;интернете
                                </p>
                            </div>
                        </div>
                        <div class="a-polygon-container__polygon js-a-polygon-container-polygon green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="js-a-polygon-container-svg">
                                <polygon points="" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
        <div class="search-desktop" data-spoiler="search">
            <div class="search-desktop__wrapper">
                <form class="search-desktop__form">
                    <div class="input-wrapper">
                        <span class="a-icon input-wrapper__icon">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-search"></use>
                            </svg>
                        </span>
                        <input placeholder="Поиск по сайту" class="input-wrapper__input">
                    </div>
                </form>
                <div class="search-desktop__tag-layout">
                    <p class="body-m-light dark-70">Популярные запросы:</p>
                    <div class="search-desktop__tag-wrapper">
                        <a class="tag-simple body-s-light" href="#">
                            Зарплатный проект
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Зарплатная карта
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Расчетный счет
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Ипотека в новостройке
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Кредит на бизнес
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Депозиты
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Вклады
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Социально-платежная карта МИР
                        </a>
                        <a class="tag-simple body-s-light" href="#">
                            Банковские гарантии
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>
