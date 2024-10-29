<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
    <nav class="main-menu">
        <?foreach($arResult['NOT_HIDDEN'] as $key => $notHiddenItem) {?>
            <?$isActive = ($notHiddenItem['SELECTED']) ? ' is-active' : ''?>
            <?if($key == 0) {?>
                <a class="main-menu__link text-s<?=$isActive?>" href="<?=$notHiddenItem['LINK']?>"><?=$notHiddenItem['TEXT']?></a>
            <?} else {?>
                <a class="main-menu__link text-s d-none d-xl-block<?=$isActive?>" href="<?=$notHiddenItem['LINK']?>"><?=$notHiddenItem['TEXT']?></a>
            <?}?>
        <?}?>

        <?if(!empty($arResult['HIDDEN'])) {?>
            <div class="dropdown">
                <button class="icon size-m dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-more"></use>
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <?foreach($arResult['HIDDEN'] as $hiddenItem) {?>
                        <?$isActive = ($hiddenItem['SELECTED']) ? ' is-active' : ''?>
                        <li><a class="dropdown-item fw-bold<?=$isActive?>" href="<?=$hiddenItem['LINK']?>"><?=$hiddenItem['TEXT']?></a></li>
                    <?}?>
                </ul>
            </div>
        <?}?>
    </nav>
<?}?>
