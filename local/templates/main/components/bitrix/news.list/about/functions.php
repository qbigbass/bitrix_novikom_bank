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

function renderClasses(int $key, bool|array $detailPicture): string
{
    if (!empty($detailPicture['SRC'])) {
        $classes = 'card-product card-product--transparent h-auto flex-basis-100 ' . ($key < 4 ? 'flex-basis-md-25' : 'flex-basis-xl-25') . ' flex-grow-1 bg-white';
    } else {
        $classes = 'card-product card-product--transparent card-product--size-height-auto flex-basis-100 flex-basis-md-25 h-auto flex-grow-1 bg-white';
    }

    return $classes . ($key < 4 ? ' card-product--size-xl' : '');
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
