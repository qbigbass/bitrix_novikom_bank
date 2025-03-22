<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if(empty($arResult))
    return "";

$strReturn = '<div class="breadcrumbs d-flex flex-wrap gap-2">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex(strip_tags($arResult[$index]["TITLE"]));
    $arrow = ($index > 0 ? '
        <svg class="icon size-s d-inline-block" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
        </svg>' : '');

    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
    {
        $strReturn .= '
            <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-none" href="' . $arResult[$index]["LINK"] . '">
                <span>' . $title . '</span>
            </a>';
    }
    else
    {
        $strReturn .= '
            <a href="' . $arResult[$index-1]["LINK"] . '" class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-block d-md-none">
                ' . $arrow . '
                <span>' . $title . '</span>
            </a>
			<div class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-none">
                <span>' . $title . '</span>
            </div>';
    }
}

$strReturn .= '</div>';

return $strReturn;
