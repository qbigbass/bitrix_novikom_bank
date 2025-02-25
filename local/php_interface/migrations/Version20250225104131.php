<?php

namespace Sprint\Migration;


class Version20250225104131 extends Version
{
    protected $author = "r.machmutov";

    protected $description = "Заполнена web-форма \"express_guarantee_form\"";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Event()->saveEventType('FORM_FILLING_express_guarantee_form', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заполнена web-форма "express_guarantee_form"',
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
#ORGANIZATION# - Наименование организации
#ORGANIZATION_RAW# - Наименование организации (оригинальное значение)
#INN# - ИНН
#INN_RAW# - ИНН (оригинальное значение)
#CONTACT_NAME# - Контактное лицо
#CONTACT_NAME_RAW# - Контактное лицо (оригинальное значение)
#PHONE# - Номер телефона
#PHONE_RAW# - Номер телефона (оригинальное значение)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (оригинальное значение)
#GUARANTEE_AMOUNT# - Сумма гарантии
#GUARANTEE_AMOUNT_RAW# - Сумма гарантии (оригинальное значение)
#FZ# - ФЗ
#FZ_RAW# - ФЗ (оригинальное значение)
#ADVANCE# - Аванс по контракту
#ADVANCE_RAW# - Аванс по контракту (оригинальное значение)
#ADVANCE_AMOUNT# - Сумма аванса
#ADVANCE_AMOUNT_RAW# - Сумма аванса (оригинальное значение)
#CONTRACT# - Контракт уже заключен?
#CONTRACT_RAW# - Контракт уже заключен? (оригинальное значение)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORM_FILLING_express_guarantee_form', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Web form filled "express_guarantee_form"',
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
#ORGANIZATION# - Наименование организации
#ORGANIZATION_RAW# - Наименование организации (original value)
#INN# - ИНН
#INN_RAW# - ИНН (original value)
#CONTACT_NAME# - Контактное лицо
#CONTACT_NAME_RAW# - Контактное лицо (original value)
#PHONE# - Номер телефона
#PHONE_RAW# - Номер телефона (original value)
#EMAIL# - E-mail
#EMAIL_RAW# - E-mail (original value)
#GUARANTEE_AMOUNT# - Сумма гарантии
#GUARANTEE_AMOUNT_RAW# - Сумма гарантии (original value)
#FZ# - ФЗ
#FZ_RAW# - ФЗ (original value)
#ADVANCE# - Аванс по контракту
#ADVANCE_RAW# - Аванс по контракту (original value)
#ADVANCE_AMOUNT# - Сумма аванса
#ADVANCE_AMOUNT_RAW# - Сумма аванса (original value)
#CONTRACT# - Контракт уже заключен?
#CONTRACT_RAW# - Контракт уже заключен? (original value)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('FORM_FILLING_express_guarantee_form', array (
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

Наименование организации
*******************************
#ORGANIZATION#

ИНН
*******************************
#INN#

Контактное лицо
*******************************
#CONTACT_NAME#

Номер телефона
*******************************
#PHONE#

E-mail
*******************************
#EMAIL#

Сумма гарантии
*******************************
#GUARANTEE_AMOUNT#

ФЗ
*******************************
#FZ#

Аванс по контракту
*******************************
#ADVANCE#

Сумма аванса
*******************************
#ADVANCE_AMOUNT#

Контракт уже заключен?
*******************************
#CONTRACT#


Для просмотра воспользуйтесь ссылкой:
http://#SERVER_NAME#/bitrix/admin/form_result_view.php?lang=ru&WEB_FORM_ID=#RS_FORM_ID#&RESULT_ID=#RS_RESULT_ID#

-------------------------------------------------------
Письмо сгенерировано автоматически.
						',
  'BODY_TYPE' => 'text',
  'BCC' => '',
  'REPLY_TO' => '',
  'CC' => '',
  'IN_REPLY_TO' => '',
  'PRIORITY' => '',
  'FIELD1_NAME' => '',
  'FIELD1_VALUE' => '',
  'FIELD2_NAME' => '',
  'FIELD2_VALUE' => '',
  'SITE_TEMPLATE_ID' => '',
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => '',
  'EVENT_TYPE' => '[ FORM_FILLING_express_guarantee_form ] Заполнена web-форма "express_guarantee_form"',
));
        }
}
