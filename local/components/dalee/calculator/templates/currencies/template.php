<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>

<a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
   data-bs-toggle="collapse" href="#currency-exchange" role="button"
   aria-expanded="false" aria-controls="currency-exchange">Обмен валют
    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
    </svg>
</a>
<div class="section-currency-exchange__wrapper collapse js-currency-converter" id="currency-exchange" data-table="currency-exchange">
    <div class="row">
        <div class="col-12 col-xl-8">
            <div
                class="d-flex flex-column flex-lg-row align-items-lg-end mb-4 mb-md-6 mb-lg-7 pt-4 pt-md-0 gap-md-3">
                <h3 class="d-none d-md-block">Обмен валют</h3>
                <p class="text-s dark-70 mb-0 ms-lg-auto">
                    Курс банка актуален на&nbsp;<?= date('H:i') ?> по&nbsp;МСК <?= FormatDate('j F Y') ?> г.
                </p>
            </div>
            <ul class="nav nav-tabs d-md-none" role="tablist">
                <? foreach ($arResult['ELEMENTS'] as $key => $element):
                    $active = $key == array_key_first($arResult['ELEMENTS']);
                    $currency = $element['PROPERTIES']['CURRENCY']['VALUE'];
                    ?>
                    <li class="nav-item flex-grow-1" role="presentation">
                        <button class="nav-link <?= $active ? 'active' : '' ?>"
                                data-bs-toggle="tab"
                                data-bs-target="#<?= strtolower($currency) ?>"
                                type="button"
                                role="tab"
                                aria-controls="<?= strtolower($currency) ?>"
                            <?= $active ? ' aria-selected' : '' ?>>
                            <?= $element['PROPERTIES']['CURRENCY']['VALUE'] ?>
                        </button>
                    </li>
                <? endforeach; ?>
            </ul>
            <div class="tab-content pt-3 d-md-none">
                <? foreach ($arResult['ELEMENTS'] as $key => $element):
                    $active = $key == array_key_first($arResult['ELEMENTS']);
                    $currency = $element['PROPERTIES']['CURRENCY']['VALUE'];
                    ?>
                    <div class="tab-pane fade <?= $active ? 'show active' : '' ?>"
                         id="<?= strtolower($currency) ?>" role="tabpanel"
                         aria-labelledby="<?= strtolower($currency) ?>"
                         tabindex="0">
                        <div class="table-currency">
                            <div class="table-currency__row">
                                <div class="table-currency__col">
                                    <span class="text-s dark-70">Продать, RUB</span>
                                </div>
                                <div class="table-currency__col">
                                    <span class="text-l dark-100"><?= $element['PROPERTIES']['SELL']['VALUE'] ?></span>
                                </div>
                            </div>
                            <div class="table-currency__row">
                                <div class="table-currency__col">
                                    <span class="text-s dark-70">Купить, RUB</span>
                                </div>
                                <div class="table-currency__col">
                                    <span class="text-l dark-100"><?= $element['PROPERTIES']['BUY']['VALUE'] ?></span>
                                </div>
                            </div>
                            <div class="table-currency__row">
                                <div class="table-currency__col">
                                    <span class="text-s dark-70">ЦБ РФ, RUB</span>
                                </div>
                                <div class="table-currency__col">
                                    <span class="text-l dark-100"><?= $element['PROPERTIES']['BASE']['VALUE'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="table-currency d-none d-md-block">
                <div class="table-currency__row table-currency__row--header">
                    <div class="table-currency__col"><span class="text-s dark-70">Валюта</span></div>
                    <div class="table-currency__col"><span class="text-s dark-70">Продать, RUB</span></div>
                    <div class="table-currency__col"><span class="text-s dark-70">Купить, RUB</span></div>
                    <div class="table-currency__col"><span class="text-s dark-70">ЦБ РФ, RUB</span></div>
                </div>
                <? foreach ($arResult['ELEMENTS'] as $element): ?>
                    <div class="table-currency__row">
                        <div class="table-currency__col"><span class="fw-semibold"><?= $element['NAME'] ?></span></div>
                        <div class="table-currency__col">
                            <span class="text-l dark-100"><?= $element['PROPERTIES']['SELL']['VALUE'] ?></span>
                        </div>
                        <div class="table-currency__col">
                            <span class="text-l dark-100"><?= $element['PROPERTIES']['BUY']['VALUE'] ?></span>
                        </div>
                        <div class="table-currency__col">
                            <span class="text-l dark-100"><?= $element['PROPERTIES']['BASE']['VALUE'] ?></span>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <p class="dark-70 pt-4 text-s mb-0">Банк оставляет за&nbsp;собой право на&nbsp;изменение курса
                купли-продажи иностранной валюты.<br>Действующие на&nbsp;момент совершения операций курсы
                уточняйте в&nbsp;отделениях банка.<br>Список отделений доступен по
                <a href="/map/offices/"
                   tabindex="0"
                   id="linkToList"
                   aria-label="Перейти к списку отделений">ссылке</a>
            </p>
            <p class="dark-70 pt-3 text-s mb-0">Покупка и&nbsp;продажа фунтов стерлингов и&nbsp;швейцарских
                франков осуществляется только в&nbsp;ДО&nbsp;&laquo;Якиманка&raquo;.</p>
        </div>
        <div class="col-12 col-xl-4 mt-4">
            <div
                class="d-flex flex-column gap-4 gap-lg-5 gap-xl-4 bg-dark-0 rounded-3 px-3 py-4 p-md-5 px-lg-6 p-xl-6">
                <div class="d-flex flex-column flex-lg-row flex-xl-column gap-4 justify-content-between">
                    <h4>Предварительный расчет</h4>
                    <ul class="nav nav-tabs">
                        <li class="nav-item flex-grow-1 text-center">
                            <input class="visually-hidden" type="radio" id="sell" name="TYPE_RATE" value="sell" checked>
                            <label class="nav-link active" for="sell" data-bs-toggle="tab" aria-selected="true">Продать</label>
                        </li>
                        <li class="nav-item flex-grow-1 text-center">
                            <input class="visually-hidden" type="radio" id="buy" name="TYPE_RATE" value="buy">
                            <label class="nav-link" for="buy" data-bs-toggle="tab" aria-selected="false">Купить</label>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-12">
                        <label class="form-label" for="have">У вас есть</label>
                        <div class="input-group">
                            <input class="form-control form-control-lg js-currency-input-have" id="have" type="text"
                                   name="you_have" placeholder="">
                            <div class="input-group__currency">
                                <select class="form-select js-select js-currency-select-have" aria-label="Выберите валюту">
                                    <option value="RUB">RUB</option>
                                    <option value="CNY" selected>CNY</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <span class="caption-m dark-70 mt-2 d-block js-currency-unit-have" aria-live="polite"></span>
                    </div>
                    <div class="col-12 col-md-6 col-xl-12 mt-4 mt-md-0 mt-xl-4">
                        <label class="form-label" for="get">Вы получите</label>
                        <div class="input-group">
                            <input class="form-control form-control-lg js-currency-input-get" id="get" type="text" name="you_get"
                                   placeholder="">
                            <div class="input-group__currency">
                                <select class="form-select js-select js-currency-select-get" aria-label="Выберите валюту">
                                    <option value="RUB" selected>RUB</option>
                                    <option value="CNY">CNY</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <span class="caption-m dark-70 mt-2 d-block js-currency-unit-get" aria-live="polite"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
