<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');
/**
 * @global CMain $APPLICATION
 */

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>

    <section class="section-layout page-error">
        <div class="container">
            <div class="d-flex flex-column flex-xl-row column-gap-xl-6">
                <div class="d-flex flex-column align-items-md-start row-gap-4 row-gap-md-5 row-gap-lg-6">
                    <h1>Страница не&nbsp;найдена</h1>
                    <p class="text-l m-0">
                        Возможно, эта страница больше не&nbsp;существует или переехала в&nbsp;другой раздел.
                    </p>
                    <a class="btn btn-primary btn-lg-lg" href="/" role="button"
                       aria-label="Перейти на главную страницу">
                        На главную
                    </a>
                </div>
                <img class="page-error__image" src="/frontend/dist/img/big-illustrations/large-individual/404.png"
                     alt="" loading="lazy">
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" loading="lazy">
        </picture>
    </section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>
<? $APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php'); ?>

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
