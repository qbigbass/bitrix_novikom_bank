<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<div class="text-banner text-banner--blue">
    <div class="content-container">
        <div class="text-banner__inner">
            <div class="text-banner__content">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "",
                    Array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                );?>
                <div class="text-banner__title headline-0"><?=$arResult['NAME']?></div>
                <div class="text-banner__description body-l-light"></div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/build/assets/patterns/section/pattern-dark-l.svg" alt="bg pattenr" loading="lazy">
    </picture>
</div>

<?foreach($arResult['DISPLAY_PROPERTIES'] as $property) {?>
    <?if($property['USER_TYPE'] == 'sprint_editor') {?>
        <?$APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $property['~VALUE'],
            ),
            false,
            Array(
                "HIDE_ICONS" => "Y"
            )
        );?>
    <?}?>
<?}?>
