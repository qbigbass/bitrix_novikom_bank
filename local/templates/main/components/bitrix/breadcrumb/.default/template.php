<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if(empty($arResult))
	return "";

$strReturn = '<div class="breadcrumbs d-flex flex-wrap gap-2 banner-product__breadcrumbs">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex(strip_tags($arResult[$index]["TITLE"]));
	$arrow = ($index > 0 ? '
        <svg class="icon size-s text-white-50 d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
        </svg>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
        $strReturn .= '
            <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s text-white-50 d-inline-flex d-none" href="' . $arResult[$index]["LINK"] . '">
                ' . $arrow . '
                <span>' . $title . '</span>
            </a>';
	}
	else
	{
		$strReturn .= '
			<div class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s text-white-50 d-inline-flex">
                ' . $arrow . '
                <span>' . $title . '</span>
            </div>';
	}
}

$strReturn .= '</div>';

return $strReturn;
