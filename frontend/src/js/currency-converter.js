const ELEMS_CURRENCY = {
    root: '.js-currency-converter',
    inputHave: '.js-currency-input-have',
    inputGet: '.js-currency-input-get',
    selectHave: '.js-currency-select-have',
    selectGet: '.js-currency-select-get',
    unitHaveToGet: '.js-currency-unit-have',
    unitGetToHave: '.js-currency-unit-get',
    radiosTypeRate: 'input[name="TYPE_RATE"]',
}

const RUB = {
    "buy": 1,
    "sell": 1,
    "base": 1,
    "currency": "RUB",
    "currencyName": "Российский рубль"
}

const initElementsCurrencyConverter = (root) => {
    const inputHave = root.querySelector(ELEMS_CURRENCY.inputHave);
    const inputGet = root.querySelector(ELEMS_CURRENCY.inputGet);
    const selectHave = root.querySelector(ELEMS_CURRENCY.selectHave);
    const selectGet = root.querySelector(ELEMS_CURRENCY.selectGet);
    const unitHaveToGet = root.querySelector(ELEMS_CURRENCY.unitHaveToGet);
    const unitGetToHave = root.querySelector(ELEMS_CURRENCY.unitGetToHave);
    const radiosTypeRate = root.querySelectorAll(ELEMS_CURRENCY.radiosTypeRate);

    return {
        root,
        inputHave,
        inputGet,
        selectHave,
        selectGet,
        unitHaveToGet,
        unitGetToHave,
        radiosTypeRate
    }
}

function setOptionsSelectCurrency(STATE) {
    STATE.currencies = ['RUB'];
    STATE.currencyData.forEach((currency) => STATE.currencies.push(currency.currency));

    setSelectOptions('selectHave', STATE.currencies, STATE);
    setSelectOptions('selectGet', STATE.currencies, STATE);

    const triggerSelect = STATE.typeRate === 'sell' ? 'Get' : 'Have';
    $(ELEMS_CURRENCY[`select${triggerSelect}`]).val(STATE.currencies[1]).trigger('change');
}

function convertCurrencyToNumber(value) {
    return parseFloat(String(value).replace(/\s/g, '').replace(/,/g, '.'));
}

function convertCurrencyToLocaleString(value) {
    const valueNum = convertCurrencyToNumber(value);
    return isNaN(valueNum) ? '' : valueNum.toLocaleString('ru-RU', {maximumFractionDigits: 2});
}

function getCurrency(currency, STATE) {
    return STATE.currencyData.filter(item => item.currency === currency)[0] ?? RUB;
}

function getTypeRate(STATE) {
    const checkedTypeRate = [...STATE.elements.radiosTypeRate].find(typeRate => typeRate.checked);
    return checkedTypeRate.value;
}

function calculateUnitCurrency(STATE) {
    const valueHave = convertCurrencyToNumber(STATE.currencyHave[STATE.typeRate]);
    const valueGet = convertCurrencyToNumber(STATE.currencyGet[STATE.typeRate]);

    STATE.unitHaveToGet = valueHave / valueGet;
    STATE.unitGetToHave = valueGet / valueHave;

    STATE.elements.unitHaveToGet.innerHTML = `1 ${STATE.currencyHave.currency} = ${convertCurrencyToLocaleString(STATE.unitHaveToGet)} ${STATE.currencyGet.currency}`;
    STATE.elements.unitGetToHave.innerHTML = `1 ${STATE.currencyGet.currency} = ${convertCurrencyToLocaleString(STATE.unitGetToHave)} ${STATE.currencyHave.currency}`;
}

function calculateResultCurrency({value, from, to}, STATE) {
    const inputTo = STATE.elements[`input${to}`];
    const valueNum = convertCurrencyToNumber(value);

    inputTo.value = convertCurrencyToLocaleString(valueNum * STATE[`unit${from}To${to}`]);
}

function handlerFocusInputCurrency(e) {
    if (e.target.value.trim() !== '') {
        e.target.value = e.target.value.replace(/\s/g, '');
    }
}

function handlerBlurInputCurrency(e) {
    if (e.target.value.trim() !== '') {
        e.target.value = convertCurrencyToLocaleString(e.target.value);
    }
}

function handlerChangeRadioTypeRate(radio, STATE) {
    STATE.typeRate = radio.value;

    if (STATE.typeRate === 'sell') {
        if (STATE.elements.selectHave.value === 'RUB') {
            const setValueHave = STATE.elements.selectGet.value !== 'RUB' ? STATE.elements.selectGet.value : STATE.currencies[1];
            $(ELEMS_CURRENCY[`selectHave`]).val(setValueHave).trigger('change');
        }
        $(ELEMS_CURRENCY[`selectGet`]).val(STATE.currencies[0]).trigger('change');
    } else {
        if (STATE.elements.selectGet.value === 'RUB') {
            const setValueGet = STATE.elements.selectHave.value !== 'RUB' ? STATE.elements.selectHave.value : STATE.currencies[1];
            $(ELEMS_CURRENCY[`selectGet`]).val(setValueGet).trigger('change');
        }
        $(ELEMS_CURRENCY[`selectHave`]).val(STATE.currencies[0]).trigger('change');
    }

    STATE.currencyHave = getCurrency(STATE.elements.selectHave.value, STATE);
    STATE.currencyGet = getCurrency(STATE.elements.selectGet.value, STATE);

    calculateUnitCurrency(STATE);

    calculateResultCurrency({
        value: STATE.elements[`inputHave`].value,
        from: 'Have',
        to: 'Get',
    }, STATE);
}

function toggleTypeRate(STATE) {
    const currentTypeRate = STATE.typeRate;
    STATE.elements.radiosTypeRate.forEach(radio => {
        if (radio.value !== currentTypeRate) {
            radio.checked = true;
            const tabTrigger = new bootstrap.Tab(radio.nextElementSibling);
            tabTrigger.show();
            radio.dispatchEvent(new Event('change'));
        }
    });
}

function handlerChangeSelectCurrency({value, from, to}, STATE) {
    const isSell = STATE.typeRate === 'sell';
    const isRUB = value === 'RUB';

    if (value === STATE.elements[`select${to}`].value) {
        if ($(ELEMS_CURRENCY[`select${to}`]).find("option[value='" + STATE[`currency${from}`].currency + "']").length) {
            $(ELEMS_CURRENCY[`select${to}`]).val(STATE[`currency${from}`].currency).trigger('change');
        }
    }

    if (from === 'Have') {
        if ((isSell && isRUB) || (!isSell && !isRUB)) {
            toggleTypeRate(STATE);
            return;
        }
    }

    if (from === 'Get') {
        if ((isSell && !isRUB) || (!isSell && isRUB)) {
            toggleTypeRate(STATE);
            return;
        }
    }

    STATE.currencyHave = getCurrency(STATE.elements.selectHave.value, STATE);
    STATE.currencyGet = getCurrency(STATE.elements.selectGet.value, STATE);

    calculateUnitCurrency(STATE);

    calculateResultCurrency({
        value: STATE.elements[`input${from}`].value,
        from: from,
        to: to,
    }, STATE);
}


function registerEventsCurrencyConversion(STATE) {
    STATE.elements.radiosTypeRate.forEach(radio => {
        radio.addEventListener('change', () => {
            handlerChangeRadioTypeRate(radio, STATE);
        });
    });

    $(ELEMS_CURRENCY.selectHave).on('select2:select', (e) => {
        handlerChangeSelectCurrency({
            value: e.target.value,
            from: 'Have',
            to: 'Get'
        }, STATE);
    });

    $(ELEMS_CURRENCY.selectGet).on('select2:select', (e) => {
        handlerChangeSelectCurrency({
            value: e.target.value,
            from: 'Get',
            to: 'Have'
        }, STATE);
    });

    STATE.elements.inputHave.addEventListener('input', (e) => {
        calculateResultCurrency({
            value: e.target.value,
            from: 'Have',
            to: 'Get'
        }, STATE);
    });

    STATE.elements.inputGet.addEventListener('input', (e) => {
        calculateResultCurrency({
            value: e.target.value,
            from: 'Get',
            to: 'Have'
        }, STATE);
    });

    [STATE.elements.inputHave, STATE.elements.inputGet].forEach(input => {
        input.addEventListener('focus', handlerFocusInputCurrency);
        input.addEventListener('blur', handlerBlurInputCurrency);
    });
}

function initStateCurrencyConverter(converter) {
    return getRates(converter.dataset)
        .then(currencyData => {
            const elements = initElementsCurrencyConverter(converter);

            return {
                elements,
                currencyData
            }
        })
        .catch(error => {
            console.error('error initStateCurrencyConverter', error);
        });
}

function initCurrencyConverter() {
    const currencyConverter = document.querySelectorAll(ELEMS_CURRENCY.root);

    for (const converter of currencyConverter) {
        initStateCurrencyConverter(converter)
            .then(STATE => {
                registerEventsCurrencyConversion(STATE);
                setOptionsSelectCurrency(STATE);

                STATE.typeRate = getTypeRate(STATE);
                STATE.currencyHave = getCurrency(STATE.elements.selectHave.value, STATE);
                STATE.currencyGet = getCurrency(STATE.elements.selectGet.value, STATE);

                calculateUnitCurrency(STATE);
            })
            .catch(error => {
                console.error('Ошибка в initCurrencyConverter функции:', error);
            });
    }
}
