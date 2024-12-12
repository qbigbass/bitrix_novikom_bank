<?php

namespace Sprint\Migration;


class Version20241122214930 extends Version
{
    protected $author = "admin";

    protected $description = "Создает форму \"Направить обращение\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Направить обращение',
  'SID' => 'feedback_form',
  'C_SORT' => '200',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_feedback_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'STAT_EVENT2' => 'feedback_form',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Направить обращение',
    'en' => 'Направить обращение',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
    0 => 
    array (
      'EVENT_NAME' => 'FORM_FILLING_feedback_form',
      'SUBJECT' => '#SERVER_NAME#: заполнена web-форма [#RS_FORM_ID#] #RS_FORM_NAME#',
    ),
  ),
));
        $helper->Form()->saveStatuses($formId, array (
  0 => 
  array (
    'CSS' => 'statusgreen',
    'TITLE' => 'DEFAULT',
    'DESCRIPTION' => '',
    'HANDLER_OUT' => '',
    'HANDLER_IN' => '',
    'arPERMISSION_VIEW' => 
    array (
      0 => '0',
    ),
    'arPERMISSION_MOVE' => 
    array (
      0 => '0',
    ),
    'arPERMISSION_EDIT' => 
    array (
      0 => '0',
    ),
    'arPERMISSION_DELETE' => 
    array (
      0 => '0',
    ),
  ),
));
        $helper->Form()->saveFields($formId, array (
  0 => 
  array (
    'TITLE' => 'Вы обращаетесь как',
    'TITLE_TYPE' => 'text',
    'SID' => 'PERSON',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'Физическое лицо',
        'VALUE' => 'physical',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'MESSAGE' => 'Юридическое лицо или ИП',
        'VALUE' => 'legal',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '200',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  1 => 
  array (
    'TITLE' => 'Фамилия',
    'TITLE_TYPE' => 'text',
    'SID' => 'LAST_NAME',
    'C_SORT' => '200',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  2 => 
  array (
    'TITLE' => 'Имя',
    'TITLE_TYPE' => 'text',
    'SID' => 'FIRST_NAME',
    'C_SORT' => '300',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  3 => 
  array (
    'TITLE' => 'Отчество',
    'TITLE_TYPE' => 'text',
    'SID' => 'MIDDLE_NAME',
    'C_SORT' => '400',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  4 => 
  array (
    'TITLE' => 'Дата рождения',
    'TITLE_TYPE' => 'text',
    'SID' => 'BIRTHDAY',
    'C_SORT' => '500',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'date',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  5 => 
  array (
    'TITLE' => 'ИНН',
    'TITLE_TYPE' => 'text',
    'SID' => 'INN',
    'C_SORT' => '600',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  6 => 
  array (
    'TITLE' => 'Наименование организации',
    'TITLE_TYPE' => 'text',
    'SID' => 'ORGANIZATION',
    'C_SORT' => '700',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  7 => 
  array (
    'TITLE' => 'E-mail',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMAIL',
    'C_SORT' => '800',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'email',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  8 => 
  array (
    'TITLE' => 'Телефон',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
    'C_SORT' => '900',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  9 => 
  array (
    'TITLE' => 'Получить ответ на E-mail',
    'TITLE_TYPE' => 'text',
    'SID' => 'OTHER_EMAIL',
    'C_SORT' => '1000',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'Да',
        'VALUE' => 'false',
        'FIELD_TYPE' => 'checkbox',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'MESSAGE' => 'Нет, на иной адрес',
        'VALUE' => 'true',
        'FIELD_TYPE' => 'checkbox',
        'C_SORT' => '200',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  10 => 
  array (
    'TITLE' => 'Адрес, по которому должен быть направлен ответ',
    'TITLE_TYPE' => 'text',
    'SID' => 'REPLY_EMAIL',
    'C_SORT' => '1100',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'email',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  11 => 
  array (
    'TITLE' => 'Причина обращения',
    'TITLE_TYPE' => 'text',
    'SID' => 'TOPIC',
    'C_SORT' => '1200',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'Направить претензию',
        'VALUE' => 'claim',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'MESSAGE' => 'Задать вопрос',
        'VALUE' => 'question',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '200',
      ),
      2 => 
      array (
        'MESSAGE' => 'Выразить благодарность',
        'VALUE' => 'gratitude',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '300',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  12 => 
  array (
    'TITLE' => 'Ваше сообщение',
    'TITLE_TYPE' => 'text',
    'SID' => 'MESSAGE',
    'C_SORT' => '1300',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  13 => 
  array (
    'TITLE' => 'Прикрепленные файлы',
    'TITLE_TYPE' => 'text',
    'SID' => 'ATTACH_FILE',
    'C_SORT' => '1400',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'file',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'FIELD_TYPE' => 'file',
        'C_SORT' => '200',
      ),
      2 => 
      array (
        'FIELD_TYPE' => 'file',
        'C_SORT' => '300',
      ),
      3 => 
      array (
        'FIELD_TYPE' => 'file',
        'C_SORT' => '400',
      ),
      4 => 
      array (
        'FIELD_TYPE' => 'file',
        'C_SORT' => '500',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
));
    }
}

