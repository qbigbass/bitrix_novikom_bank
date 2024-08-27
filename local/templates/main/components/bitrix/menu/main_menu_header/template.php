<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
    <nav class="desktop-main-menu">
        <div class="desktop-main-menu__links js-desktop-main-menu">
            <?foreach($arResult['NOT_HIDDEN'] as $key => $notHiddenItem) {?>
                <?$isActive = ($notHiddenItem['SELECTED']) ? ' is-active' : ''?>
                <?if($key == 0) {?>
                    <a class="desktop-main-menu-link body-s-light<?=$isActive?>" href="<?=$notHiddenItem['LINK']?>"><?=$notHiddenItem['TEXT']?></a>
                <?} else {?>
                    <a class="desktop-main-menu-link body-s-light js-desktop-move-link<?=$isActive?>" href="<?=$notHiddenItem['LINK']?>"><?=$notHiddenItem['TEXT']?></a>
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
                        <?foreach($arResult['HIDDEN'] as $hiddenItem) {?>
                            <?$isActive = ($hiddenItem['SELECTED']) ? ' is-active' : ''?>
                            <a class="drop-down-menu__link<?=$isActive?>" href="<?=$hiddenItem['LINK']?>"><?=$hiddenItem['TEXT']?></a>
                        <?}?>
                    </div>
                </button>
            <?}?>
        </div>
    </nav>
<?}?>
