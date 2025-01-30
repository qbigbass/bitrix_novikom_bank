const CURRENCY = {
    "base": "RUB",
    "time_last_updated": 1738195201,
    "rates": {
        "RUB": 1,
        "CNY": 0.0733,
        "USD": 0.0101
    }
}

const ELEMS_CURRENCY = {
    root: '.js-currency-converter',
    timeUpdate: '.js-currency-time-update',
    inputHave: '.js-currency-input-have',
    inputGet: '.js-currency-input-get',
    selectHave: '.js-currency-select-have',
    selectGet: '.js-currency-select-get',
    unitHaveToGet: '.js-currency-have-get',
    unitGetToHave: '.js-currency-get-have',
}

async function getResults() {
    try {
        // TODO: получение данных по валютам
        // const response = await fetch(URL_CURRENCY);
        // const data = await response.json();
        return CURRENCY;
    } catch (error) {
        console.error('Error:', error);
    }
}

function calculateConversionResult(
    value,
    inputFrom,
    inputTo,
    currencyValueFrom,
    currencyValueTo
) {
    if (value === '') {
        inputTo.value = ''
    } else {
        const valueToNumber = Number(value.replace(/\s+/g, '').replaceAll(',', '.'))
        const result = Number(((currencyValueTo / currencyValueFrom) * valueToNumber).toFixed(2));
        inputTo.value = result.toLocaleString();
    }
}

function calculateConversionUnit(
    currencyValueHave,
    currencyValueGet,
    unitGetToHave,
    unitHaveToGet,
    currencyHave,
    currencyGet
) {
    const unitHaveToGetResult = Number(((currencyValueGet / currencyValueHave)).toFixed(2));
    const unitGetToHaveResult = Number(((currencyValueHave / currencyValueGet)).toFixed(2));

    unitHaveToGet.innerHTML = `1 ${currencyHave} = ${unitHaveToGetResult} ${currencyGet}`
    unitGetToHave.innerHTML = `1 ${currencyGet} = ${unitGetToHaveResult} ${currencyHave}`
}

function displayTimeUpdate(el, currency) {
    const lastUpd = new Date(currency.time_last_updated * 1000);
    const date = lastUpd.toLocaleDateString('ru-RU', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
    const time = lastUpd.toLocaleTimeString('ru-RU', {
            timeZone: 'Europe/Moscow',
            hour: '2-digit',
            minute: '2-digit'
        }
    )

    el.innerHTML = `${time} по МСК ${date}`;
}

async function initCurrencyConverter() {
    const currencyConverter = document.querySelector(ELEMS_CURRENCY.root);

    if (!currencyConverter) return;

    const currency = await getResults();

    const timeUpdateEl = currencyConverter.querySelector(ELEMS_CURRENCY.timeUpdate);
    const inputHave = currencyConverter.querySelector(ELEMS_CURRENCY.inputHave);
    const inputGet = currencyConverter.querySelector(ELEMS_CURRENCY.inputGet);
    const selectHaveCurrency = currencyConverter.querySelector(ELEMS_CURRENCY.selectHave);
    const selectGetCurrency = currencyConverter.querySelector(ELEMS_CURRENCY.selectGet);
    const unitHaveToGet = currencyConverter.querySelector(ELEMS_CURRENCY.unitHaveToGet);
    const unitGetToHave = currencyConverter.querySelector(ELEMS_CURRENCY.unitGetToHave);

    let currencyHave = `${selectHaveCurrency.value}`;
    let currencyGet = `${selectGetCurrency.value}`;
    let currencyValueHave = currency.rates[currencyHave];
    let currencyValueGet = currency.rates[currencyGet];

    displayTimeUpdate(timeUpdateEl, currency);
    calculateConversionUnit(currencyValueHave, currencyValueGet, unitGetToHave, unitHaveToGet, currencyHave, currencyGet)

    $(ELEMS_CURRENCY.selectHave).on('select2:select', (e) => {
        currencyHave = `${e.target.value}`;
        currencyValueHave = currency.rates[currencyHave];
        const valueHave = inputHave.value;

        calculateConversionResult(valueHave, inputHave, inputGet, currencyValueHave, currencyValueGet)
        calculateConversionUnit(currencyValueHave, currencyValueGet, unitGetToHave, unitHaveToGet, currencyHave, currencyGet)
    });

    $(ELEMS_CURRENCY.selectGet).on('select2:select', (e) => {
        currencyGet = `${e.target.value}`;
        currencyValueGet = currency.rates[currencyGet];
        const valueHave = inputHave.value;

        calculateConversionResult(valueHave, inputHave, inputGet, currencyValueHave, currencyValueGet)
        calculateConversionUnit(currencyValueHave, currencyValueGet, unitGetToHave, unitHaveToGet, currencyHave, currencyGet)
    });

    inputHave.addEventListener('input', (e) => {
        calculateConversionResult(e.target.value, inputHave, inputGet, currencyValueHave, currencyValueGet)
        // e.target.value = Number(e.target.value.replace(/[^\d,]/g, '')).toLocaleString('ru-RU');
    });

    inputGet.addEventListener('input', (e) => {
        calculateConversionResult(e.target.value, inputGet, inputHave, currencyValueGet, currencyValueHave)
        // e.target.value = Number(e.target.value.replace(/[^\d,]/g, '')).toLocaleString('ru-RU');
    });
}
