const ELEMS_CURRENCY = {
    root: '.js-currency-converter',
    inputHave: '.js-currency-input-have',
    inputGet: '.js-currency-input-get',
    selectHave: '.js-currency-select-have',
    selectGet: '.js-currency-select-get',
    unitHaveToGet: '.js-currency-unit-have',
    unitGetToHave: '.js-currency-unit-get',
}

const RUB = {
    "buy": "1",
    "sell": "1",
    "base": "1",
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

    return {
        root,
        inputHave,
        inputGet,
        selectHave,
        selectGet,
        unitHaveToGet,
        unitGetToHave
    }
}

function setSelectsCurrency(STATE) {
    let currencies = ['RUB'];
    STATE.currencyData.forEach((currency) => currencies.push(currency.currency));

    setSelectOptions('selectHave', currencies, STATE);
    setSelectOptions('selectGet', currencies, STATE);

    $(ELEMS_CURRENCY.selectGet).val(currencies[1]).trigger('change');
}

function convertCurrencyToNumber(value) {
    return parseFloat(String(value).replace(/\s/g, '').replace(/,/g, '.'));
}

function convertCurrencyToLocaleString(value) {
    const valueNum = convertCurrencyToNumber(value);
    return isNaN(valueNum) ? '' : valueNum.toLocaleString('ru-RU', {maximumFractionDigits: 2});
}

function findCurrency(currency, STATE) {
    return STATE.currencyData.filter(item => item.currency === currency)[0] ?? RUB;
}

function calculateUnitCurrency(STATE) {
    const valueHave = convertCurrencyToNumber(STATE.currencyHave.base);
    const valueGet = convertCurrencyToNumber(STATE.currencyGet.base);

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

function handleChangeSelect({value, from, to}, STATE) {
    if (value === STATE.elements[`select${to}`].value) {
        if ($(ELEMS_CURRENCY[`select${to}`]).find("option[value='" + STATE[`currency${from}`].currency + "']").length) {
            $(ELEMS_CURRENCY[`select${to}`]).val(STATE[`currency${from}`].currency).trigger('change');
        }
    }

    STATE.currencyHave = findCurrency(STATE.elements.selectHave.value, STATE);
    STATE.currencyGet = findCurrency(STATE.elements.selectGet.value, STATE);

    calculateUnitCurrency(STATE);

    if (STATE.elements[`input${from}`].value.trim() !== '') {
        calculateResultCurrency({
            value: STATE.elements[`input${from}`].value,
            from: from,
            to: to,
        }, STATE);
    }
}

function handleFocusInputCurrency(e) {
    if (e.target.value.trim() !== '') {
        e.target.value = convertCurrencyToNumber(e.target.value);
    }
}

function handleBlurInputCurrency(e) {
    if (e.target.value.trim() !== '') {
        e.target.value = convertCurrencyToLocaleString(e.target.value);
    }
}

function calculateCurrencyConversion(STATE) {
    STATE.currencyHave = findCurrency(STATE.elements.selectHave.value, STATE);
    STATE.currencyGet = findCurrency(STATE.elements.selectGet.value, STATE);

    $(ELEMS_CURRENCY.selectHave).on('select2:select', (e) => {
        handleChangeSelect({
            value: e.target.value,
            from: 'Have',
            to: 'Get',
        }, STATE);
    });

    $(ELEMS_CURRENCY.selectGet).on('select2:select', (e) => {
        handleChangeSelect({
            value: e.target.value,
            from: 'Get',
            to: 'Have',
        }, STATE);
    });

    STATE.elements.inputHave.addEventListener('input', (e) => {
        calculateResultCurrency({
            value: e.target.value,
            from: 'Have',
            to: 'Get',
        }, STATE);
    });

    STATE.elements.inputGet.addEventListener('input', (e) => {
        calculateResultCurrency({
            value: e.target.value,
            from: 'Get',
            to: 'Have',
        }, STATE);
    });

    STATE.elements.inputHave.addEventListener('focus', handleFocusInputCurrency);
    STATE.elements.inputGet.addEventListener('focus', handleFocusInputCurrency);

    STATE.elements.inputHave.addEventListener('blur', handleBlurInputCurrency);
    STATE.elements.inputGet.addEventListener('blur', handleBlurInputCurrency);
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
                setSelectsCurrency(STATE);
                calculateCurrencyConversion(STATE);
                calculateUnitCurrency(STATE);
            })
            .catch(error => {
                console.error('Ошибка в initCurrencyConverter функции:', error);
            });
    }
}
