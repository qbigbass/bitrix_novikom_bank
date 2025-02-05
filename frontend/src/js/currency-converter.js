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

function convertCurrencyToNumber(value) {
    return parseFloat(value.replace(/\s/g, '').replace(/,/g, '.'));
}

function convertCurrencyToLocaleString(value) {
    const currency = !isNaN(value) ? value : value.replace(/\s/g, '');
    return parseFloat(currency).toLocaleString('ru-RU', {maximumFractionDigits: 2});
}

function findCurrency(currency, STATE) {
    return STATE.currencyData.filter(item => item.currency === currency)[0] ?? RUB;
}

function calculateUnitCurrency(STATE) {
    const valueHave = convertCurrencyToNumber(STATE.currencyHave.base)
    const valueGet = convertCurrencyToNumber(STATE.currencyGet.base);

    STATE.unitHaveToGet = valueHave / valueGet;
    STATE.unitGetToHave = valueGet / valueHave;

    STATE.elements.unitHaveToGet.innerHTML = `1 ${STATE.currencyHave.currency} = ${convertCurrencyToLocaleString(STATE.unitHaveToGet)} ${STATE.currencyGet.currency}`;
    STATE.elements.unitGetToHave.innerHTML = `1 ${STATE.currencyGet.currency} = ${convertCurrencyToLocaleString(STATE.unitGetToHave)} ${STATE.currencyHave.currency}`;
}

function calculateResultCurrency({value, resultInput, unit}, STATE) {
    return STATE.elements[resultInput].value = convertCurrencyToLocaleString(convertCurrencyToNumber(value) * STATE[unit]);
}

function setSelectsCurrency(STATE) {
    let currencies = ['RUB'];
    STATE.currencyData.forEach((currency) => currencies.push(currency.currency));

    setSelectOptions('selectHave', currencies, STATE);
    setSelectOptions('selectGet', currencies, STATE);

    $(ELEMS_CURRENCY.selectGet).val(currencies[1]).trigger('change');
}

function calculateCurrencyConversion(STATE) {
    STATE.currencyHave = findCurrency(STATE.elements.selectHave.value, STATE);
    STATE.currencyGet = findCurrency(STATE.elements.selectGet.value, STATE);

    $(ELEMS_CURRENCY.selectHave).on('select2:select', (e) => {
        STATE.currencyHave = findCurrency(e.target.value, STATE);
        calculateUnitCurrency(STATE);
        calculateResultCurrency({
            value: STATE.elements.inputHave.value,
            resultInput: 'inputGet',
            unit: 'unitHaveToGet'
        }, STATE);
    });

    $(ELEMS_CURRENCY.selectGet).on('select2:select', (e) => {
        STATE.currencyGet = findCurrency(e.target.value, STATE);
        calculateUnitCurrency(STATE);
        calculateResultCurrency({
            value: STATE.elements.inputGet.value,
            resultInput: 'inputHave',
            unit: 'unitGetToHave'
        }, STATE);
    });

    STATE.elements.inputHave.addEventListener('input', (e) => {
        calculateResultCurrency({
            value: e.target.value,
            resultInput: 'inputGet',
            unit: 'unitHaveToGet'
        }, STATE);
    });

    STATE.elements.inputGet.addEventListener('input', (e) => {
        calculateResultCurrency({
            value: e.target.value,
            resultInput: 'inputHave',
            unit: 'unitGetToHave'
        }, STATE);
    });

    STATE.elements.inputHave.addEventListener('blur', (e) => {
        e.target.value = convertCurrencyToLocaleString(e.target.value);
    });

    STATE.elements.inputGet.addEventListener('blur', (e) => {
        e.target.value = convertCurrencyToLocaleString(e.target.value);
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
                setSelectsCurrency(STATE)
                calculateCurrencyConversion(STATE)
                calculateUnitCurrency(STATE)
            })
            .catch(error => {
                console.error('Ошибка в initCurrencyConverter функции:', error);
            });
    }
}
