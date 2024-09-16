<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(empty($arResult)) {
    return '';
}

$strReturn = '<nav class="breadcrumbs body-s-light"><ul class="breadcrumbs__list">';

foreach($arResult as $item) {
	$title = htmlspecialcharsex($item['TITLE']);
    if($item["LINK"] <> "") {
        $strReturn .= '
        <li class="breadcrumbs__item">
            <a href="' . $item['LINK'] . '" class="breadcrumbs__link">
                ' . $title . '
            </a>
        </li>';
    } else {
        $strReturn .= '
        <li class="breadcrumbs__item">
            <span class="breadcrumbs__link">
                ' . $title . '
            </span>
        </li>';
    }
}

$strReturn .= '</ul>';
$strReturn .= '<a href="' . $arResult[0]['LINK'] . '" class="breadcrumbs__link breadcrumbs__link-mobile">
                    <span class="a-icon size-s">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                        </svg>
                    </span>
                    ' . htmlspecialcharsex($arResult[0]['TITLE']) . '
                </a>';
$strReturn .= '</nav>';

return $strReturn;
