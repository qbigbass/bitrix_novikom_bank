<?php
/**
 * @param int $key
 * @return string
 */
function renderStartTags(int $key): string
{
    $html = '';

    if ($key % 2 == 0 && $key < 4) {
        $html = '<div class="d-flex flex-wrap cards-gap">';
    }
    if ($key == 4) {
        $html = '<div class="collapse d-md-block" id="more-ratifications">
            <div class="d-flex flex-column cards-gap">';
    }
    if ($key >= 4 && ($key - 1) % 3 == 0) {
        $html .= '<div class="d-flex flex-wrap flex-xl-nowrap cards-gap">';
    }

    return $html;
}

/**
 * @param int $key
 * @param array $items
 * @return string
 */
function renderEndTags(int $key, array $items): string
{
    $html = '';

    if (($key + 1) % 2 == 0 && $key < 4) {
        $html = '</div>';
    }
    if ($key >= 6 && $key % 3 == 0) {
        $html = '</div>';
    }
    if ($key == array_key_last($items)) {
        $html = '</div></div>';
    }

    return $html;
}
