<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
        return;
    }
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>
<nav>
    <ul class="pagination d-none d-lg-flex justify-content-start">
        <li class="page-item disabled d-none">
            <span class="page-link"><?= GetMessage("MAIN_UI_PAGINATION__PAGES") ?></span>
        </li>
        <?php if ($arResult["NavPageNomer"] > 1) : ?>
            <?php if ($arResult["nStartPage"] > 1) : ?>
                <?php if ($arResult["bSavePage"]) : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1">1</a>
                    </li>
                <?php else : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
                    </li>
                <?php endif; ?>
                <?php if ($arResult["nStartPage"] > 2) : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= round($arResult["nStartPage"] / 2) ?>">...</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php do { ?>
            <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
                <li class="page-item active">
                    <span class="page-link"><?= $arResult["nStartPage"] ?></span>
                </li>
            <?php elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                </li>
            <?php endif; ?>
            <?php
            $arResult["nStartPage"]++;
        } while ($arResult["nStartPage"] <= $arResult["nEndPage"]); ?>

        <?php if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>
            <?php if ($arResult["nEndPage"] < $arResult["NavPageCount"]) : ?>
                <?php if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)) : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2) ?>">...</a>
                    </li>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= $arResult["NavPageCount"] ?></a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
    <ul class="pagination d-flex d-lg-none justify-content-between">
        <li class="page-item <?= $arResult["NavPageNomer"] == 1 ? 'page-item--disabled' : ''; ?>">
            <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageNomer"] - 1 ?>">
                <svg class="icon size-m <?= $arResult["NavPageNomer"] == 1 ? 'dark-50' : ''; ?>" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                </svg>
            </a>
        </li>
        <li class="w-120w">
            <form action="<?= $arResult["sUrlPath"] ?>">
                <div class="position-relative w-100">
                    <select
                        class="form-select --form-select--size-small --js-select"
                        id="pagination-select"
                        name="pageNomer"
                        aria-label="Выбрать страницу"
                        data-placeholder="<?= $arResult['NavPageNomer'] . '/' . $arResult['NavPageCount'] ?>"
                    >
                        <option></option>
                        <?php for ($page = 1; $page <= $arResult["NavPageCount"]; $page++) : ?>
                            <option value="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $page ?>">
                                <?= $page ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            </form>
        </li>
        <li class="page-item <?= $arResult["NavPageNomer"] >= $arResult['NavPageCount'] ? 'page-item--disabled' : ''; ?>">
            <a class="page-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageNomer"] + 1 ?>">
                <svg class="icon size-m <?= $arResult["NavPageNomer"] >= $arResult['NavPageCount'] ? 'dark-50' : ''; ?>" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                </svg>
            </a>
        </li>
    </ul>
</nav>
