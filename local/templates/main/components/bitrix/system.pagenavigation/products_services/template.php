<?
/** @var array $arResult */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && !$arResult["NavShowAll"]))
        return;
}

$pageCount = $arResult['NavPageCount'];
$currentPage = $arResult['NavPageNomer'];
?>

<div class="mt-4 mt-md-6 mt-lg-7">
    <nav>
        <ul class="pagination d-none d-md-flex justify-content-start">
            <? if ($currentPage > 1) { ?>
                <li class="page-item">
                    <a class="page-link"
                       href="<?= $arResult['sUrlPath'] ?>?PAGEN_<?= $arResult['NavNum'] ?>=<?= $currentPage - 1 ?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%"
                             height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                        </svg>
                    </a>
                </li>
            <? }

            for ($i = 1; $i <= $pageCount; $i++) {
                // Показываем первую, последнюю, текущую и 2 соседние страницы
                if ($i == 1 || $i == $pageCount || ($i >= $currentPage - 1 && $i <= $currentPage + 3)) { ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active page-item--disabled' : '' ?>" <?= ($i == $currentPage) ? 'aria-current="page"' : '' ?>>
                        <a class="page-link"
                           href="<?= $arResult['sUrlPath'] ?>?PAGEN_<?= $arResult['NavNum'] ?>=<?= $i ?>"><?= $i ?></a>
                    </li>
                <? } elseif ($i == 2 && $currentPage > 3 || $i == $pageCount - 1 && $currentPage < $pageCount - 2) { ?>
                    <!-- Многоточие -->
                    <li class="page-item">
                        <div class="page-link">
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-more"></use>
                            </svg>
                        </div>
                    </li>
                <? }
            }

            if ($currentPage < $pageCount) { ?>
                <li class="page-item">
                    <a class="page-link"
                       href="<?= $arResult['sUrlPath'] ?>?PAGEN_<?= $arResult['NavNum'] ?>=<?= $currentPage + 1 ?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </a>
                </li>
            <? } ?>
        </ul>

        <!-- Мобильная версия -->
        <ul class="pagination d-flex d-md-none justify-content-between">
            <? if ($currentPage > 1) { ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?= $arResult['sUrlPath'] ?>?PAGEN_<?= $arResult['NavNum'] ?>=<?= $currentPage - 1 ?>">
                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </a>
            </li>
            <? } else { ?>
            <li class="page-item page-item--disabled">
                <span class="page-link">
                    <svg class="icon size-m dark-50" xmlns="http://www.w3.org/2000/svg" width="100%"
                         height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </li>
            <? } ?>
            <li class="min-w-50">
                <form>
                    <div class="position-relative w-100">
                        <select class="form-select form-select--size-small js-select" id="pagination-select"
                                aria-label="Выбрать страницу"
                                data-placeholder="<?= $currentPage ?>/<?= $pageCount ?>">
                            <? for ($i = 1; $i <= $pageCount; $i++) { ?>
                                <option value="<?= $i ?>" <?= ($i == $currentPage) ? 'selected' : '' ?>>
                                    <?= $i ?>
                                </option>
                            <? } ?>
                        </select>
                    </div>
                </form>
            </li>
            <? if ($currentPage < $pageCount) { ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?= $arResult['sUrlPath'] ?>?PAGEN_<?= $arResult['NavNum'] ?>=<?= $currentPage + 1 ?>">
                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </a>
            </li>
            <? } else { ?>
            <li class="page-item page-item--disabled">
                <span class="page-link">
                    <svg class="icon size-m dark-50" xmlns="http://www.w3.org/2000/svg" width="100%"
                         height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </li>
            <? } ?>
        </ul>
    </nav>
</div>
