<?php

namespace Sprint\Migration;


class Version20241122215224 extends Version
{
    protected $author = "admin";

    protected $description = "Создает почтовые события для форм";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Event()->saveEventType('FORM_FILLING_callback_form', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заполнена web-форма "callback_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#FULL_NAME# - Имя
#FULL_NAME_RAW# - Имя (оригинальное значение)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (оригинальное значение)
#CALL_TIME# - Удобное время для звонка
#CALL_TIME_RAW# - Удобное время для звонка (оригинальное значение)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORM_FILLING_callback_form', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Web form filled "callback_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - Form ID
#RS_FORM_NAME# - Form name
#RS_FORM_SID# - Form SID
#RS_RESULT_ID# - Result ID
#RS_DATE_CREATE# - Form filling date
#RS_USER_ID# - User ID
#RS_USER_EMAIL# - User e-mail
#RS_USER_NAME# - First and last user names
#RS_USER_AUTH# - User authorized?
#RS_STAT_GUEST_ID# - Visitor ID
#RS_STAT_SESSION_ID# - Session ID
#FULL_NAME# - Имя
#FULL_NAME_RAW# - Имя (original value)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (original value)
#CALL_TIME# - Удобное время для звонка
#CALL_TIME_RAW# - Удобное время для звонка (original value)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('FORM_FILLING_callback_form', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
  'SUBJECT' => '#SERVER_NAME#: заполнена web-форма [#RS_FORM_ID#] #RS_FORM_NAME#',
  'MESSAGE' => '#SERVER_NAME#

Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#
-------------------------------------------------------

Дата - #RS_DATE_CREATE#
Результат - #RS_RESULT_ID#
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#
Посетитель - #RS_STAT_GUEST_ID#
Сессия - #RS_STAT_SESSION_ID#


Имя
*******************************
#FULL_NAME#

Телефон
*******************************
#PHONE#

Удобное время для звонка
*******************************
#CALL_TIME#


Для просмотра воспользуйтесь ссылкой:
http://#SERVER_NAME#/bitrix/admin/form_result_view.php?lang=ru&WEB_FORM_ID=#RS_FORM_ID#&RESULT_ID=#RS_RESULT_ID#

-------------------------------------------------------
Письмо сгенерировано автоматически.
						',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ FORM_FILLING_callback_form ] Заполнена web-форма "callback_form"',
));
            $helper->Event()->saveEventType('FORM_FILLING_feedback_form', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заполнена web-форма "feedback_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#PERSON# - Вы обращаетесь как
#PERSON_RAW# - Вы обращаетесь как (оригинальное значение)
#LAST_NAME# - Фамилия
#LAST_NAME_RAW# - Фамилия (оригинальное значение)
#FIRST_NAME# - Имя
#FIRST_NAME_RAW# - Имя (оригинальное значение)
#MIDDLE_NAME# - Отчество
#MIDDLE_NAME_RAW# - Отчество (оригинальное значение)
#BIRTHDAY# - Дата рождения
#BIRTHDAY_RAW# - Дата рождения (оригинальное значение)
#INN# - ИНН
#INN_RAW# - ИНН (оригинальное значение)
#ORGANIZATION# - Наименование организации
#ORGANIZATION_RAW# - Наименование организации (оригинальное значение)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (оригинальное значение)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (оригинальное значение)
#OTHER_EMAIL# - Получить ответ на E-mail
#OTHER_EMAIL_RAW# - Получить ответ на E-mail (оригинальное значение)
#REPLY_EMAIL# - Адрес, по которому должен быть направлен ответ
#REPLY_EMAIL_RAW# - Адрес, по которому должен быть направлен ответ (оригинальное значение)
#TOPIC# - Причина обращения
#TOPIC_RAW# - Причина обращения (оригинальное значение)
#MESSAGE# - Ваше сообщение
#MESSAGE_RAW# - Ваше сообщение (оригинальное значение)
#ATTACH_FILE# - Прикрепленные файлы
#ATTACH_FILE_RAW# - Прикрепленные файлы (оригинальное значение)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORM_FILLING_feedback_form', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Web form filled "feedback_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - Form ID
#RS_FORM_NAME# - Form name
#RS_FORM_SID# - Form SID
#RS_RESULT_ID# - Result ID
#RS_DATE_CREATE# - Form filling date
#RS_USER_ID# - User ID
#RS_USER_EMAIL# - User e-mail
#RS_USER_NAME# - First and last user names
#RS_USER_AUTH# - User authorized?
#RS_STAT_GUEST_ID# - Visitor ID
#RS_STAT_SESSION_ID# - Session ID
#PERSON# - Вы обращаетесь как
#PERSON_RAW# - Вы обращаетесь как (original value)
#LAST_NAME# - Фамилия
#LAST_NAME_RAW# - Фамилия (original value)
#FIRST_NAME# - Имя
#FIRST_NAME_RAW# - Имя (original value)
#MIDDLE_NAME# - Отчество
#MIDDLE_NAME_RAW# - Отчество (original value)
#BIRTHDAY# - Дата рождения
#BIRTHDAY_RAW# - Дата рождения (original value)
#INN# - ИНН
#INN_RAW# - ИНН (original value)
#ORGANIZATION# - Наименование организации
#ORGANIZATION_RAW# - Наименование организации (original value)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (original value)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (original value)
#OTHER_EMAIL# - Получить ответ на E-mail
#OTHER_EMAIL_RAW# - Получить ответ на E-mail (original value)
#REPLY_EMAIL# - Адрес, по которому должен быть направлен ответ
#REPLY_EMAIL_RAW# - Адрес, по которому должен быть направлен ответ (original value)
#TOPIC# - Причина обращения
#TOPIC_RAW# - Причина обращения (original value)
#MESSAGE# - Ваше сообщение
#MESSAGE_RAW# - Ваше сообщение (original value)
#ATTACH_FILE# - Прикрепленные файлы
#ATTACH_FILE_RAW# - Прикрепленные файлы (original value)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('FORM_FILLING_feedback_form', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
  'SUBJECT' => '#SERVER_NAME#: заполнена web-форма [#RS_FORM_ID#] #RS_FORM_NAME#',
  'MESSAGE' => '#SERVER_NAME#

Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#
-------------------------------------------------------

Дата - #RS_DATE_CREATE#
Результат - #RS_RESULT_ID#
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#
Посетитель - #RS_STAT_GUEST_ID#
Сессия - #RS_STAT_SESSION_ID#


Вы обращаетесь как
*******************************
#PERSON#

Фамилия
*******************************
#LAST_NAME#

Имя
*******************************
#FIRST_NAME#

Отчество
*******************************
#MIDDLE_NAME#

Дата рождения
*******************************
#BIRTHDAY#

ИНН
*******************************
#INN#

Наименование организации
*******************************
#ORGANIZATION#

E-mail
*******************************
#EMAIL#

Телефон
*******************************
#PHONE#

Получить ответ на E-mail
*******************************
#OTHER_EMAIL#

Адрес, по которому должен быть направлен ответ
*******************************
#REPLY_EMAIL#

Причина обращения
*******************************
#TOPIC#

Ваше сообщение
*******************************
#MESSAGE#

Прикрепленные файлы
*******************************
#ATTACH_FILE#


Для просмотра воспользуйтесь ссылкой:
http://#SERVER_NAME#/bitrix/admin/form_result_view.php?lang=ru&WEB_FORM_ID=#RS_FORM_ID#&RESULT_ID=#RS_RESULT_ID#

-------------------------------------------------------
Письмо сгенерировано автоматически.
						',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ FORM_FILLING_feedback_form ] Заполнена web-форма "feedback_form"',
));
            $helper->Event()->saveEventType('FORM_FILLING_loan_form', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заполнена web-форма "loan_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#LAST_NAME# - Фамилия
#LAST_NAME_RAW# - Фамилия (оригинальное значение)
#FIRST_NAME# - Имя
#FIRST_NAME_RAW# - Имя (оригинальное значение)
#MIDDLE_NAME# - Отчество
#MIDDLE_NAME_RAW# - Отчество (оригинальное значение)
#BIRTHDAY# - Дата рождения
#BIRTHDAY_RAW# - Дата рождения (оригинальное значение)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (оригинальное значение)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (оригинальное значение)
#PERSON_SEX# - Пол
#PERSON_SEX_RAW# - Пол (оригинальное значение)
#CITIZENSHIP# - Гражданство
#CITIZENSHIP_RAW# - Гражданство (оригинальное значение)
#EMPLOYMENT_HISTORY# - Общий трудовой стаж
#EMPLOYMENT_HISTORY_RAW# - Общий трудовой стаж (оригинальное значение)
#EMPLOYMENT_LAST_WORK# - Стаж на последнем месте работы
#EMPLOYMENT_LAST_WORK_RAW# - Стаж на последнем месте работы (оригинальное значение)
#MONTHLY_INCOME# - Ежемесячный доход
#MONTHLY_INCOME_RAW# - Ежемесячный доход (оригинальное значение)
#EMPLOYER_NAME# - Наименование организации-работодателя
#EMPLOYER_NAME_RAW# - Наименование организации-работодателя (оригинальное значение)
#LOAN_AMOUNT# - Сумма кредита
#LOAN_AMOUNT_RAW# - Сумма кредита (оригинальное значение)
#LOAN_TERM# - Срок кредита
#LOAN_TERM_RAW# - Срок кредита (оригинальное значение)
#OFFICE_OBTAINING# - Офис получения кредита
#OFFICE_OBTAINING_RAW# - Офис получения кредита (оригинальное значение)
#LOAN_PROGRAM# - Кредитная программа
#LOAN_PROGRAM_RAW# - Кредитная программа (оригинальное значение)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORM_FILLING_loan_form', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Web form filled "loan_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - Form ID
#RS_FORM_NAME# - Form name
#RS_FORM_SID# - Form SID
#RS_RESULT_ID# - Result ID
#RS_DATE_CREATE# - Form filling date
#RS_USER_ID# - User ID
#RS_USER_EMAIL# - User e-mail
#RS_USER_NAME# - First and last user names
#RS_USER_AUTH# - User authorized?
#RS_STAT_GUEST_ID# - Visitor ID
#RS_STAT_SESSION_ID# - Session ID
#LAST_NAME# - Фамилия
#LAST_NAME_RAW# - Фамилия (original value)
#FIRST_NAME# - Имя
#FIRST_NAME_RAW# - Имя (original value)
#MIDDLE_NAME# - Отчество
#MIDDLE_NAME_RAW# - Отчество (original value)
#BIRTHDAY# - Дата рождения
#BIRTHDAY_RAW# - Дата рождения (original value)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (original value)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (original value)
#PERSON_SEX# - Пол
#PERSON_SEX_RAW# - Пол (original value)
#CITIZENSHIP# - Гражданство
#CITIZENSHIP_RAW# - Гражданство (original value)
#EMPLOYMENT_HISTORY# - Общий трудовой стаж
#EMPLOYMENT_HISTORY_RAW# - Общий трудовой стаж (original value)
#EMPLOYMENT_LAST_WORK# - Стаж на последнем месте работы
#EMPLOYMENT_LAST_WORK_RAW# - Стаж на последнем месте работы (original value)
#MONTHLY_INCOME# - Ежемесячный доход
#MONTHLY_INCOME_RAW# - Ежемесячный доход (original value)
#EMPLOYER_NAME# - Наименование организации-работодателя
#EMPLOYER_NAME_RAW# - Наименование организации-работодателя (original value)
#LOAN_AMOUNT# - Сумма кредита
#LOAN_AMOUNT_RAW# - Сумма кредита (original value)
#LOAN_TERM# - Срок кредита
#LOAN_TERM_RAW# - Срок кредита (original value)
#OFFICE_OBTAINING# - Офис получения кредита
#OFFICE_OBTAINING_RAW# - Офис получения кредита (original value)
#LOAN_PROGRAM# - Кредитная программа
#LOAN_PROGRAM_RAW# - Кредитная программа (original value)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORM_FILLING_credit_card_form', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заполнена web-форма "credit_card_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#LAST_NAME# - Фамилия
#LAST_NAME_RAW# - Фамилия (оригинальное значение)
#FIRST_NAME# - Имя
#FIRST_NAME_RAW# - Имя (оригинальное значение)
#MIDDLE_NAME# - Отчество
#MIDDLE_NAME_RAW# - Отчество (оригинальное значение)
#BIRTHDAY# - Дата рождения
#BIRTHDAY_RAW# - Дата рождения (оригинальное значение)
#FIRST_NAME_LATIN# - Имя в латинской транскрипции
#FIRST_NAME_LATIN_RAW# - Имя в латинской транскрипции (оригинальное значение)
#LAST_NAME_LATIN# - Фамилия в латинской транскрипции
#LAST_NAME_LATIN_RAW# - Фамилия в латинской транскрипции (оригинальное значение)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (оригинальное значение)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (оригинальное значение)
#PERSON_SEX# - Пол
#PERSON_SEX_RAW# - Пол (оригинальное значение)
#CITIZENSHIP# - Гражданство
#CITIZENSHIP_RAW# - Гражданство (оригинальное значение)
#EMPLOYMENT_HISTORY# - Общий трудовой стаж
#EMPLOYMENT_HISTORY_RAW# - Общий трудовой стаж (оригинальное значение)
#EMPLOYMENT_LAST_WORK# - Стаж на последнем месте работы
#EMPLOYMENT_LAST_WORK_RAW# - Стаж на последнем месте работы (оригинальное значение)
#MONTHLY_INCOME# - Ежемесячный доход
#MONTHLY_INCOME_RAW# - Ежемесячный доход (оригинальное значение)
#EMPLOYER_NAME# - Наименование организации-работодателя
#EMPLOYER_NAME_RAW# - Наименование организации-работодателя (оригинальное значение)
#CARD# - Карта
#CARD_RAW# - Карта (оригинальное значение)
#CURRENCY# - Валюта
#CURRENCY_RAW# - Валюта (оригинальное значение)
#TYPE_BORROWER# - Тип заемщика
#TYPE_BORROWER_RAW# - Тип заемщика (оригинальное значение)
#RECEIPT_OFFICE# - Офис получения карты
#RECEIPT_OFFICE_RAW# - Офис получения карты (оригинальное значение)
#CREDIT_LIMIT# - Кредитный лимит по карте
#CREDIT_LIMIT_RAW# - Кредитный лимит по карте (оригинальное значение)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORM_FILLING_credit_card_form', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Web form filled "credit_card_form"',
  'DESCRIPTION' => '#RS_FORM_ID# - Form ID
#RS_FORM_NAME# - Form name
#RS_FORM_SID# - Form SID
#RS_RESULT_ID# - Result ID
#RS_DATE_CREATE# - Form filling date
#RS_USER_ID# - User ID
#RS_USER_EMAIL# - User e-mail
#RS_USER_NAME# - First and last user names
#RS_USER_AUTH# - User authorized?
#RS_STAT_GUEST_ID# - Visitor ID
#RS_STAT_SESSION_ID# - Session ID
#LAST_NAME# - Фамилия
#LAST_NAME_RAW# - Фамилия (original value)
#FIRST_NAME# - Имя
#FIRST_NAME_RAW# - Имя (original value)
#MIDDLE_NAME# - Отчество
#MIDDLE_NAME_RAW# - Отчество (original value)
#BIRTHDAY# - Дата рождения
#BIRTHDAY_RAW# - Дата рождения (original value)
#FIRST_NAME_LATIN# - Имя в латинской транскрипции
#FIRST_NAME_LATIN_RAW# - Имя в латинской транскрипции (original value)
#LAST_NAME_LATIN# - Фамилия в латинской транскрипции
#LAST_NAME_LATIN_RAW# - Фамилия в латинской транскрипции (original value)
#PHONE# - Телефон
#PHONE_RAW# - Телефон (original value)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (original value)
#PERSON_SEX# - Пол
#PERSON_SEX_RAW# - Пол (original value)
#CITIZENSHIP# - Гражданство
#CITIZENSHIP_RAW# - Гражданство (original value)
#EMPLOYMENT_HISTORY# - Общий трудовой стаж
#EMPLOYMENT_HISTORY_RAW# - Общий трудовой стаж (original value)
#EMPLOYMENT_LAST_WORK# - Стаж на последнем месте работы
#EMPLOYMENT_LAST_WORK_RAW# - Стаж на последнем месте работы (original value)
#MONTHLY_INCOME# - Ежемесячный доход
#MONTHLY_INCOME_RAW# - Ежемесячный доход (original value)
#EMPLOYER_NAME# - Наименование организации-работодателя
#EMPLOYER_NAME_RAW# - Наименование организации-работодателя (original value)
#CARD# - Карта
#CARD_RAW# - Карта (original value)
#CURRENCY# - Валюта
#CURRENCY_RAW# - Валюта (original value)
#TYPE_BORROWER# - Тип заемщика
#TYPE_BORROWER_RAW# - Тип заемщика (original value)
#RECEIPT_OFFICE# - Офис получения карты
#RECEIPT_OFFICE_RAW# - Офис получения карты (original value)
#CREDIT_LIMIT# - Кредитный лимит по карте
#CREDIT_LIMIT_RAW# - Кредитный лимит по карте (original value)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('FORM_FILLING_credit_card_form', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
  'SUBJECT' => '#SERVER_NAME#: заполнена web-форма [#RS_FORM_ID#] #RS_FORM_NAME#',
  'MESSAGE' => '#SERVER_NAME#

Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#
-------------------------------------------------------

Дата - #RS_DATE_CREATE#
Результат - #RS_RESULT_ID#
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#
Посетитель - #RS_STAT_GUEST_ID#
Сессия - #RS_STAT_SESSION_ID#


Фамилия
*******************************
#LAST_NAME#

Имя
*******************************
#FIRST_NAME#

Отчество
*******************************
#MIDDLE_NAME#

Дата рождения
*******************************
#BIRTHDAY#

Имя в латинской транскрипции
*******************************
#FIRST_NAME_LATIN#

Фамилия в латинской транскрипции
*******************************
#LAST_NAME_LATIN#

Телефон
*******************************
#PHONE#

E-mail
*******************************
#EMAIL#

Пол
*******************************
#PERSON_SEX#

Гражданство
*******************************
#CITIZENSHIP#

Общий трудовой стаж
*******************************
#EMPLOYMENT_HISTORY#

Стаж на последнем месте работы
*******************************
#EMPLOYMENT_LAST_WORK#

Ежемесячный доход
*******************************
#MONTHLY_INCOME#

Наименование организации-работодателя
*******************************
#EMPLOYER_NAME#

Карта
*******************************
#CARD#

Валюта
*******************************
#CURRENCY#

Тип заемщика
*******************************
#TYPE_BORROWER#

Офис получения карты
*******************************
#RECEIPT_OFFICE#

Кредитный лимит по карте
*******************************
#CREDIT_LIMIT#


Для просмотра воспользуйтесь ссылкой:
http://#SERVER_NAME#/bitrix/admin/form_result_view.php?lang=ru&WEB_FORM_ID=#RS_FORM_ID#&RESULT_ID=#RS_RESULT_ID#

-------------------------------------------------------
Письмо сгенерировано автоматически.
						',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ FORM_FILLING_credit_card_form ] Заполнена web-форма "credit_card_form"',
));
        }
}
