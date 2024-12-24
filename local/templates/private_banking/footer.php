<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @var array $pbModel
 */
?>

<!-- /#WORK_AREA# -------------------------------------------------------------------------------------------------- -->
<footer class="pb-footer">
    <a class="btn-pb-up js-scroll-to" id="scrollToTop" href="#header" title="Наверх">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <use xlink:href="/frontend/dist/img/svg-sprite.svg#arrow-up"></use>
        </svg>
    </a>
    <?php
    // footer copyright and contacts
    $APPLICATION->IncludeComponent(
        "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
        "footer", // и отрисовывает в шаблоне
        [
            'CODE' => 'footer',
            'PROPERTY_CODE' => 'CONTENT_JSON',
            'IBLOCK_ID' => iblock('pb_blocks_index'),
        ]
    );?>
</footer>
</body>
</html>
