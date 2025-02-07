<?php

function getStylizedCardCondition(array $cardConditionData): string
{
    if ($formattedConditionValue = getFormattedConditionValue($cardConditionData['description'])) {
        $result =
            '<div class="card-product-list__condition d-flex flex-column gap-2 w-100 w-sm-50 w-xl-auto">
                <div class="d-inline-flex flex-nowrap align-items-baseline gap-1">
                    ' . getConditionHtml($formattedConditionValue) . '
                </div>
                <span class="text-m dark-70">' . $cardConditionData['value'] . '</span>
            </div>';
    } else {
        $result =
            '<div class="card-product-list__condition d-flex flex-column gap-2 w-100 w-sm-50 w-xl-auto align-self-end">
                <div class="d-inline-flex flex-nowrap align-items-baseline gap-1">
                    <span class="h4">' . $cardConditionData['description'] . '</span>
                </div>
                <span class="text-m dark-70">'.$cardConditionData['value'].'</span>
            </div>';
    }

    return $result;
}

function getFormattedConditionValue(string $cardConditionData): array
{
    $result = [];
    if (preg_match("/\[([^\]]*)\]/", $cardConditionData, $bigText)) {
        $smallText = preg_split('/\[([^\]]*)\]/', $cardConditionData);

        $result = [
            'small_text_before' => $smallText[0],
            'big_text' => $bigText[1],
            'small_text_after' => $smallText[1],
        ];
    }
    return $result;
}

function getConditionHtml(array $conditionValue): string
{
    $result = '';
    if (!empty($conditionValue['small_text_before'])) {
        $result .= '<span class="text-l fw-semibold">' . $conditionValue['small_text_before'] . '</span>';
    }

    $result .= '<span class="text-number-l fw-bold">' . wrapCurrencySymbolRub($conditionValue['big_text']) . '</span>';

    if (!empty($conditionValue['small_text_after'])) {
        $result .= '<span class="text-l fw-semibold">' . $conditionValue['small_text_after'] . '</span>';
    }

    return $result;
}

function wrapCurrencySymbolRub(string $value): string
{
    return str_replace('₽', '</span><span class="text-number-l currency fw-bold">₽', $value);
}
