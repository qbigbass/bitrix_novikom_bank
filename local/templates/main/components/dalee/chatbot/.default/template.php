<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);
?>
<? if (!empty($arResult["ITEMS"])) : ?>
    <div class="chat-bot js-chatbot">
        <div class="chat-bot__button-box chatbot-polygon js-polygon-container">
            <button class="chat-bot__button chatbot-polygon__content js-chatbot-btn" type="button">
                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-more"></use>
                </svg>
            </button>
            <div class="chatbot-polygon__polygon violet-100 js-polygon-container-polygon d-none d-md-block">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="1 1, 1 52, 52 52, 67 67, 67 1" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-dasharray="8 8"></polygon>
                </svg>
            </div>
        </div>
        <div class="chat-bot__popover chatbot-polygon js-chatbot-popover js-polygon-container" hidden>
            <div class="chatbot-polygon__content chat-bot__popover-content bg-blue-10 d-flex flex-column gap-3 gap-lg-4">
                <? foreach ($arResult["ITEMS"] as $arForm) : ?>
                    <button class="d-flex gap-2 align-items-center text-l" type="button" data-bs-toggle="modal" data-bs-target="#<?= $arForm["CODE"] ?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/<?= $arForm["ICON"] ?>"></use>
                        </svg>
                        <span><?= $arForm["TITLE"] ?></span>
                    </button>
                <? endforeach; ?>
                <button class="chat-bot__btn-close js-chatbot-close" type="button">
                    <svg class="icon dark-100 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                    </svg>
                </button>
            </div>
            <div class="chatbot-polygon__polygon violet-100 js-polygon-container-polygon d-none d-md-block">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="1 1, 1 52, 52 52, 67 67, 67 1" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-dasharray="8 8"></polygon>
                </svg>
            </div>
        </div>
    </div>
<? endif; ?>

