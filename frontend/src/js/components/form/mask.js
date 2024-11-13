import $ from 'jquery';
import '../../vendors/jquery.mask.min';

const MASK_ELEMS = {
    phone: '.js-mask-phone',
    date: '.js-mask-date',
    money: '.js-mask-money',
    inn: '.js-mask-inn',
    latin: '.js-mask-latin',
}

export function initMask() {
    const $inputPhone = $(MASK_ELEMS.phone);
    const $inputDate = $(MASK_ELEMS.date);
    const $inputMoney = $(MASK_ELEMS.money);
    const $inputInn = $(MASK_ELEMS.inn);
    const $inputLatin = $(MASK_ELEMS.latin);

    $inputPhone.mask('+7 (000) 000-00-00', {
        placeholder: "+7",
    });

    $inputDate.mask('00.00.0000', {
        placeholder: "__.__.____",
    });

    $inputMoney.mask('# ##0', {
        reverse: true
    });

    $inputInn.mask('000000000000');

    $inputLatin.on('input', function() {
        this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
    });
}
