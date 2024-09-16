<?php

function showHeadingClass() : string {
    global $APPLICATION;

    $headingValue = $APPLICATION->GetPageProperty('NAME');
    $strLength = mb_strlen($headingValue, 'UTF-8');

    return ($strLength > 40) ? 'headline-1' : 'headline-0';
}

function showButton() : string {
    global $APPLICATION;

    $isButtonShow = $APPLICATION->GetPageProperty('IS_BUTTON_SHOW');
    if($isButtonShow == 'Y') {
        return '<a href="#" class="a-button product-card-banner__button a-button--lm a-button--green a-button--link">Оформить заявку</a>';
    } else {
        return '';
    }
}

function showShortConditions() : string {
    global $APPLICATION;
    $shortConditions = $APPLICATION->GetPageProperty('DETAIL_SHORT_CONDITIONS');

    $result = '<div class="product-card-banner__benefits-list">';
    foreach ($shortConditions as $condition) {
        $result .= '<div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="body-l-heavy">' . $condition['SMALL_TEXT'] . '</span>
                            <span class="number-l-heavy">' . $condition['MAIN_TEXT'] . '</span>
                        </div>
                        <div class="body-m-light dark-0">' . $condition['CONDITION_NAME'] . '</div>
                    </div>';
    }
    $result .= '</div>';

    return $result;
}
