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

$page = $_SESSION['section_page'][$arParams['MENU_DIR']] ?? '';
?>

<script>
    function setPage(page) {
        const [section, element] = page.split('.');
        fetch('/local/php_interface/ajax/ajax_set_page.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                action: 'set_page',
                section: section,
                element: element
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    location.href = section;
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
<div class="tabs-panel js-tabs-slider overflow-hidden position-relative px-1">
    <? if (count($arResult) >= 4) { ?>
        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
            <span
                class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </span>
            <span
                class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </span>
        </div>
    <? } ?>
    <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded section-catalog__tab-list">
        <? foreach ($arResult as $key => $menuItem) { ?>

            <? if ($key == 0 && empty($page)) {
                $class = ' active';
            } else {
                $class = $menuItem['LINK'] == $page ? ' active' : '';
            } ?>

            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                <button
                    class="tabs-panel__list-item-link nav-link bg-transparent section-catalog__tab-list-item<?= $class ?>"
                    onclick="setPage('<?= $arParams['MENU_DIR'] ?>.<?= $menuItem['LINK'] ?>')">
                    <?= $menuItem['TEXT'] ?>
                </button>
            </li>
        <? } ?>
    </ul>
</div>
