const CURRENCY = {
    "base": "RUB",
    "time_last_updated": 1738195201,
    "rates": {
        "RUB": 1,
        "AED": 0.0371,
        "AFN": 0.797,
        "ALL": 0.971,
        "AMD": 4.07,
        "ANG": 0.0181,
        "AOA": 9.44,
        "ARS": 10.63,
        "AUD": 0.0162,
        "AWG": 0.0181,
        "AZN": 0.0173,
        "BAM": 0.019,
        "BBD": 0.0202,
        "BDT": 1.23,
        "BGN": 0.019,
        "BHD": 0.0038,
        "BIF": 30.22,
        "BMD": 0.0101,
        "BND": 0.0136,
        "BOB": 0.0707,
        "BRL": 0.0594,
        "BSD": 0.0101,
        "BTN": 0.874,
        "BWP": 0.142,
        "BYN": 0.0338,
        "BZD": 0.0202,
        "CAD": 0.0146,
        "CDF": 29.13,
        "CHF": 0.00916,
        "CLP": 10.14,
        "CNY": 0.0733,
        "COP": 43.03,
        "CRC": 5.17,
        "CUP": 0.243,
        "CVE": 1.07,
        "CZK": 0.244,
        "DJF": 1.8,
        "DKK": 0.0722,
        "DOP": 0.629,
        "DZD": 1.38,
        "EGP": 0.508,
        "ERN": 0.152,
        "ETB": 1.3,
        "EUR": 0.0097,
        "FJD": 0.0237,
        "FKP": 0.00812,
        "FOK": 0.0722,
        "GBP": 0.00812,
        "GEL": 0.0293,
        "GGP": 0.00812,
        "GHS": 0.156,
        "GIP": 0.00812,
        "GMD": 0.739,
        "GNF": 87.9,
        "GTQ": 0.0789,
        "GYD": 2.14,
        "HKD": 0.0787,
        "HNL": 0.26,
        "HRK": 0.0731,
        "HTG": 1.33,
        "HUF": 3.97,
        "IDR": 163.32,
        "ILS": 0.0362,
        "IMP": 0.00812,
        "INR": 0.874,
        "IQD": 13.38,
        "IRR": 431.62,
        "ISK": 1.42,
        "JEP": 0.00812,
        "JMD": 1.6,
        "JOD": 0.00717,
        "JPY": 1.57,
        "KES": 1.32,
        "KGS": 0.889,
        "KHR": 40.97,
        "KID": 0.0162,
        "KMF": 4.77,
        "KRW": 14.56,
        "KWD": 0.00314,
        "KYD": 0.00842,
        "KZT": 5.24,
        "LAK": 223.07,
        "LBP": 904.67,
        "LKR": 3.03,
        "LRD": 2.03,
        "LSL": 0.188,
        "LYD": 0.0501,
        "MAD": 0.102,
        "MDL": 0.189,
        "MGA": 47.81,
        "MKD": 0.603,
        "MMK": 21.41,
        "MNT": 34.73,
        "MOP": 0.081,
        "MRU": 0.408,
        "MUR": 0.473,
        "MVR": 0.158,
        "MWK": 17.72,
        "MXN": 0.207,
        "MYR": 0.0441,
        "MZN": 0.652,
        "NAD": 0.188,
        "NGN": 15.68,
        "NIO": 0.375,
        "NOK": 0.114,
        "NPR": 1.4,
        "NZD": 0.0179,
        "OMR": 0.00389,
        "PAB": 0.0101,
        "PEN": 0.0378,
        "PGK": 0.0414,
        "PHP": 0.588,
        "PKR": 2.81,
        "PLN": 0.0408,
        "PYG": 80.66,
        "QAR": 0.0368,
        "RON": 0.0486,
        "RSD": 1.15,
        "RWF": 14.35,
        "SAR": 0.0379,
        "SBD": 0.0866,
        "SCR": 0.146,
        "SDG": 5.56,
        "SEK": 0.111,
        "SGD": 0.0136,
        "SHP": 0.00812,
        "SLE": 0.232,
        "SLL": 231.72,
        "SOS": 5.83,
        "SRD": 0.359,
        "SSP": 41.35,
        "STN": 0.238,
        "SYP": 132.32,
        "SZL": 0.188,
        "THB": 0.34,
        "TJS": 0.111,
        "TMT": 0.0356,
        "TND": 0.0325,
        "TOP": 0.0246,
        "TRY": 0.361,
        "TTD": 0.0693,
        "TVD": 0.0162,
        "TWD": 0.331,
        "TZS": 25.93,
        "UAH": 0.427,
        "UGX": 37.57,
        "USD": 0.0101,
        "UYU": 0.443,
        "UZS": 131.85,
        "VES": 0.582,
        "VND": 254.21,
        "VUV": 1.23,
        "WST": 0.0289,
        "XAF": 6.36,
        "XCD": 0.0273,
        "XDR": 0.00779,
        "XOF": 6.36,
        "XPF": 1.16,
        "YER": 2.54,
        "ZAR": 0.188,
        "ZMW": 0.285,
        "ZWL": 0.266
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
        e.target.value = Number(e.target.value.replace(/[^\d,]/g, '')).toLocaleString('ru-RU');
        calculateConversionResult(e.target.value, inputHave, inputGet, currencyValueHave, currencyValueGet)
    });

    inputGet.addEventListener('input', (e) => {
        e.target.value = Number(e.target.value.replace(/[^\d,]/g, '')).toLocaleString('ru-RU');
        calculateConversionResult(e.target.value, inputGet, inputHave, currencyValueGet, currencyValueHave)
    });
}
