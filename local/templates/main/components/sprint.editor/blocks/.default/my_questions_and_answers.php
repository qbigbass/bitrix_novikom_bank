<?php
/** @var $block array */

use Sprint\Editor\Blocks\Text;
global $APPLICATION;

$elements = Sprint\Editor\Blocks\IblockSections::getElements($block, ['select' => ['PROPERTY_ANSWER']]);

function getAnswer(string $json) : array {
    $value = json_decode($json, true);
    return $value['blocks']['0'];
}
?>
<div class="section-help-content-layout">
    <div class="section-help-content-layout__left">
        <div class="a-accordion js-a-accordion a-accordion-component">
            <?foreach($elements as $element){?>
                <div class="a-accordion-panel js-a-accordion-panel">
                <button class="a-accordion-header js-a-accordion-header">
                    <div class="body-l-light"><?=$element['NAME']?></div>
                    <span class="a-icon a-accordion-header__icon size-m">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </span>
                </button>
                <div class="a-accordion-content js-a-accordion-content">
                    <div class="a-rte body-m-light">
                        <?$answer = getAnswer($element['~PROPERTY_ANSWER_VALUE']);?>
                        <?=Text::getValue($answer);?>
                    </div>
                </div>
            </div>
            <?}?>
        </div>
        <div class="section-help-content-layout__footer">
            <a href="#" class="a-button a-button--m a-button--primary a-button--link a-button--text">
                Все вопросы и ответы
                <span class="a-icon a-button__icon">
                    <svg>
                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </a>
        </div>
    </div>
    <div class="section-help-content-layout__right">
        <?$APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "questions",
            Array(
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "N",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_URL" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "LIST_URL" => "",
                "SEF_MODE" => "N",
//                "AJAX_MODE" => "Y",
//                "AJAX_OPTION_JUMP" => "Y",
                "USE_EXTENDED_ERRORS" => "Y",
                "SUCCESS_URL" => "",
                "VARIABLE_ALIASES" => Array(
                    "RESULT_ID" => "RESULT_ID",
                    "WEB_FORM_ID" => "WEB_FORM_ID"
                ),
                "WEB_FORM_ID" => "1"
            )
        );?>
    </div>
</div>
