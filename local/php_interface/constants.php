<?php
const MOBIL_APP_LINK = '/upload/android-v19.apk';
const ONLINE_BANK_LINK = '#';
const OFFICES_AND_ATMS_LINK = '/map/offices/';
const RU_STORE_APP_LINK = 'https://apps.rustore.ru/app/com.bssys.novikomretail';
const RU_MARKET_APP_LINK = 'https://ruplay.market/apps/com.bssys.novikomretail';
const NASH_STORE_APP_LINK = 'https://store.nashstore.ru/store/65b74fde0a39b29c04ad1f2f';
const TELEGRAM_LINK = 'https://t.me/novikombank_official';
const ENGLISH_VERSION_LINK = 'en/';
const RUSSIAN_VERSION_LINK = '/';
/** @var array Инфоблоки для постороения меню (шаблон corporate_submenu_header) */
const MENU_IBLOCKS = [
    'for-corporate-clients' => 150,
    'msb' => 206,
    'financial-institutions' => 208,
];

/** @var float Ключевая ставка % */
const UF_KEY_RATE = 18;
/** @var string Согласие на обработку персональных данных */
const UF_PRIVACY_POLICY_LINK = '/upload/politika_v_obrabotki_personalnih_dannih.pdf';
/**
 * @var string Текст для чатбота
 * Судя по коду не используется. Может еще МР не влили. Пока оставил) *
 */
const UF_CHATBOT_MESSAGE = 'Просто текст для чатбота';
/**
 * @var string Иконка для чатбота(Раньше был ID файла. Без интерфейса будет строка)
 * Судя по коду не используется. Может еще МР не влили. Пока оставил)
 */
const UF_CHATBOT_FILE = '/upload/uf/2aa/y52ouwppvq3k4s17i8c8w3r6mgho0rhe/icons8-%D0%B1%D0%BE%D1%82-%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D0%B5-50.png';
/** @var string Телефон 1 */
const UF_PHONE1 = '+7 (800) 250-70-07';
/** @var string Телефон 2 */
const UF_PHONE2 = '+7 (495) 974-71-87';
/** @var string Длительность отображения слайда на главной слайдере */
const UF_BANNER_DELAY = 5000;
