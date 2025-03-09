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

$arItem = $arResult;

?>
<section class="border-top border-blue10 section-office">
    <div
        class="map-wrapper"
        id="map"
        data-params="<?= htmlspecialchars(json_encode($arResult['PARAMS'], JSON_UNESCAPED_UNICODE)); ?>"
    ></div>
    <div class="map-content">
        <div class="map-content__header map-content__header--type-back d-flex flex-column row-gap-4 row-gap-md-6">
            <div class="d-flex gap-3 justify-content-between align-items-center">
                <a class="btn btn-link btn-lg btn-icon" href="<?= $arItem['SECTION_URL'] ?>">
                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-left"></use>
                    </svg>
                    Назад
                </a>
            </div>
            <div class="d-flex flex-column row-gap-3">
                <h4><?= $arItem['NAME'] ?></h4>
                <p class="m-0"><?= $arItem['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'] ?></p>
            </div>
        </div>
        <div class="map-content__body d-flex flex-column gap-4 gap-md-6">
            <?php if (!empty($arItem['DISPLAY_PROPERTIES']["METRO"]["LINK_ELEMENT_VALUE"])) : ?>
                <div class="d-flex flex-column row-gap-3">
                    <?php foreach ($arItem['DISPLAY_PROPERTIES']["METRO"]["LINK_ELEMENT_VALUE"] as $arMetro) : ?>
                        <div class="d-inline-flex gap-3 align-items-center">
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" style="color: #EF1E25;">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-metro"></use>
                            </svg>
                            <span class="fw-semibold"><?= $arMetro['NAME'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif;?>
            <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'])) : ?>
                <div class="d-flex flex-column row-gap-3">
                    <h5 class="fw-semibold">Режим обслуживания</h5>
                    <ul class="list-contact d-flex flex-column row-gap-3">
                        <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'] as $idx => $line) : ?>
                            <li>
                                <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'][$idx] ?>:
                                <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME']['DESCRIPTION'][$idx] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif;?>
            <?php if (0) : // @todo ?>
                <div class="d-flex flex-column row-gap-3">
                    <h5 class="fw-semibold">Юридические лица</h5>
                    <ul class="list-contact d-flex flex-column row-gap-3">
                        <li>пн-чт: 10:00-17:00</li>
                        <li>пт: 10:00-16:00</li>
                    </ul>
                </div>
                <div class="d-flex flex-column row-gap-3">
                    <h5 class="fw-semibold">Операционная касса</h5>
                    <ul class="list-contact d-flex flex-column row-gap-3">
                        <li>пн-чт: 10:00-20:00</li>
                        <li>пт: 10:00-19:00</li>
                    </ul>
                </div>
            <?php endif;?>
            <?php if (!empty($arItem['DISPLAY_PROPERTIES']['SERVICES']['VALUE'])) : ?>
                <div class="d-flex flex-column row-gap-3">
                    <h5 class="fw-semibold">Услуги</h5>
                    <ul class="list">
                        <?php foreach ($arItem['DISPLAY_PROPERTIES']['SERVICES']['VALUE'] as $service) : ?>
                            <li><span><?= $service ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif;?>
            <?php if (
                !empty($arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE'])
                || !empty($arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])
                || !empty($arItem['DISPLAY_PROPERTIES']['FAX']['VALUE'])
            ): ?>
                <div class="d-flex flex-column row-gap-3">
                    <h5 class="fw-semibold">Контакты</h5>
                    <ul class="list-contact d-flex flex-column row-gap-3">
                        <?php if (!empty($arItem['DISPLAY_PROPERTIES']['PHONE']['~VALUE'])) : ?>
                            <?php foreach ($arItem['DISPLAY_PROPERTIES']['PHONE']['~VALUE'] as $keyP => $phone) : ?>
                                <li class="d-flex column-gap-3">
                                    <span class="icon size-m violet-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                        </svg>
                                    </span>
                                    <a class="list-contact__link" href="tel:<?= preg_replace('/[^\d\+]/', '', $phone); ?>"
                                    ><?= $phone ?>
                                     <?php if (!empty($arItem['DISPLAY_PROPERTIES']['PHONE']['DESCRIPTION'][$keyP])) : ?>
                                         доб. <?= $arItem['DISPLAY_PROPERTIES']['PHONE']['DESCRIPTION'][$keyP] ?>
                                     <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!empty($arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])) : ?>
                            <?php foreach ($arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE'] as $email) : ?>
                                <li class="d-flex column-gap-3">
                                    <span class="icon size-m violet-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                        </svg>
                                    </span>
                                    <a class="list-contact__link" href="mailto:<?= $email ?>"><?= $email ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!empty($arItem['DISPLAY_PROPERTIES']['FAX']['VALUE'])) : ?>
                            <li class="d-flex column-gap-3">
                                <span class="icon size-m violet-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-fax"></use>
                                    </svg>
                                </span>
                                <a class="list-contact__link" href="tel:<?= preg_replace('/[^\d\+]/', '', $arItem['DISPLAY_PROPERTIES']['FAX']['VALUE']); ?>"><?= $arItem['DISPLAY_PROPERTIES']['FAX']['VALUE'] ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif;?>
            <div class="accordion accordion--size-sm" id="accordion-office">
                <?php if (
                    !empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_RUB']['VALUE'])
                    || !empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_FOREIGN']['VALUE'])
                    || !empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_INTERNAL']['VALUE'])
                ) : ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1"><span class="text-l fw-semibold">Продолжительность обслуживания физических лиц. Режим работы операционных касс по&nbsp;обслуживанию клиентов</span></button>
                        </div>
                        <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-office">
                            <div class="accordion-body">
                                <div class="d-flex flex-column row-gap-5">
                                    <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_RUB']['VALUE'])) : ?>
                                        <div class="d-flex flex-column row-gap-3">
                                            <p class="text-m mb-0 fw-semibold">Для внешних платежей в&nbsp;рублях</p>
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_RUB']['VALUE'] as $idx => $line) : ?>
                                                    <li>
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_RUB']['VALUE'][$idx] ?>:
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_RUB']['DESCRIPTION'][$idx] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif;?>
                                    <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_FOREIGN']['VALUE'])) : ?>
                                        <div class="d-flex flex-column row-gap-3">
                                            <p class="text-m mb-0 fw-semibold">Для внешних платежей в&nbsp;иностранной валюте</p>
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_FOREIGN']['VALUE'] as $idx => $line) : ?>
                                                    <li>
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_FOREIGN']['VALUE'][$idx] ?>:
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_FOREIGN']['DESCRIPTION'][$idx] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif;?>
                                    <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_INTERNAL']['VALUE'])) : ?>
                                        <div class="d-flex flex-column row-gap-3">
                                            <p class="text-m mb-0 fw-semibold">Для внутрибанковских платежей</p>
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_INTERNAL']['VALUE'] as $idx => $line) : ?>
                                                    <li>
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_INTERNAL']['VALUE'][$idx] ?>:
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_INDIVIDUAL_INTERNAL']['DESCRIPTION'][$idx] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php if (
                    !empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_RUB']['VALUE'])
                    || !empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_FOREIGN']['VALUE'])
                    || !empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_INTERNAL']['VALUE'])
                ) : ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-controls="2"><span class="text-l fw-semibold">Продолжительность операционного дня для юридических лиц и&nbsp;индивидуальных предпринимателей</span></button>
                        </div>
                        <div class="accordion-collapse collapse" id="2" data-bs-parent="#accordion-office">
                            <div class="accordion-body">
                                <div class="d-flex flex-column row-gap-5">
                                    <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_RUB']['VALUE'])) : ?>
                                        <div class="d-flex flex-column row-gap-3">
                                            <p class="text-m mb-0 fw-semibold">Для внешних платежей в&nbsp;рублях</p>
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_RUB']['VALUE'] as $idx => $line) : ?>
                                                    <li>
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_RUB']['VALUE'][$idx] ?>:
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_RUB']['DESCRIPTION'][$idx] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif;?>
                                    <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_FOREIGN']['VALUE'])) : ?>
                                        <div class="d-flex flex-column row-gap-3">
                                            <p class="text-m mb-0 fw-semibold">Для внешних платежей в&nbsp;иностранной валюте</p>
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_FOREIGN']['VALUE'] as $idx => $line) : ?>
                                                    <li>
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_FOREIGN']['VALUE'][$idx] ?>:
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_FOREIGN']['DESCRIPTION'][$idx] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif;?>
                                    <?php if (!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_INTERNAL']['VALUE'])) : ?>
                                        <div class="d-flex flex-column row-gap-3">
                                            <p class="text-m mb-0 fw-semibold">Для внутрибанковских платежей</p>
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_INTERNAL']['VALUE'] as $idx => $line) : ?>
                                                    <li>
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_INTERNAL']['VALUE'][$idx] ?>:
                                                        <?= $arItem['DISPLAY_PROPERTIES']['WORKTIME_CORPORATE_INTERNAL']['DESCRIPTION'][$idx] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php if (!empty($arItem['DISPLAY_PROPERTIES']['BANK_DETAILS']['VALUE'])) : ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-controls="3"><span class="text-l fw-semibold">Реквизиты</span></button>
                        </div>
                        <div class="accordion-collapse collapse" id="3" data-bs-parent="#accordion-office">
                            <div class="accordion-body">
                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['BANK_DETAILS']['VALUE'] as $idx => $line) : ?>
                                    <p class="text-m mb-0">
                                        <?= $arItem['DISPLAY_PROPERTIES']['BANK_DETAILS']['VALUE'][$idx] ?>:
                                        <?= $arItem['DISPLAY_PROPERTIES']['BANK_DETAILS']['DESCRIPTION'][$idx] ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
