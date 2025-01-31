<?php

namespace Sprint\Migration;


class Version20250130210403 extends Version
{
    protected $author = "admin";

    protected $description = "Добавляет форму \"Заявка на господдержку\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Заявка на господдержку',
  'SID' => 'state_support_form',
  'C_SORT' => '1100',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_state_support_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'STAT_EVENT2' => 'state_support_form',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Заявка на господдержку',
    'en' => '',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
    0 => 
    array (
      'EVENT_NAME' => 'FORM_FILLING_state_support_form',
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
    'TITLE' => 'Наименование организации',
    'TITLE_TYPE' => 'text',
    'SID' => 'ORGANIZATION',
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
  1 => 
  array (
    'TITLE' => 'Субъект МСП',
    'TITLE_TYPE' => 'text',
    'SID' => 'SUBJECT',
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
    'TITLE' => 'ИНН',
    'TITLE_TYPE' => 'text',
    'SID' => 'INN',
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
    'TITLE' => 'ОКВЭД',
    'TITLE_TYPE' => 'text',
    'SID' => 'OKVED',
    'C_SORT' => '400',
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
  4 => 
  array (
    'TITLE' => 'Местоположение компании',
    'TITLE_TYPE' => 'text',
    'SID' => 'LOCATION',
    'C_SORT' => '500',
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
  5 => 
  array (
    'TITLE' => 'ФИО',
    'TITLE_TYPE' => 'text',
    'SID' => 'CONTACT_NAME',
    'C_SORT' => '600',
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
  6 => 
  array (
    'TITLE' => 'E-mail',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMAIL',
    'C_SORT' => '700',
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
  7 => 
  array (
    'TITLE' => 'Номер телефона',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
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
        'FIELD_TYPE' => 'text',
        'C_SORT' => '100',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  8 => 
  array (
    'TITLE' => 'Добавочный (при наличии)',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE_ADDITIONAL',
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
    'TITLE' => 'Сумма кредита',
    'TITLE_TYPE' => 'text',
    'SID' => 'LOAN_PAYMENT',
    'C_SORT' => '1000',
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
  10 => 
  array (
    'TITLE' => 'Срок кредита',
    'TITLE_TYPE' => 'text',
    'SID' => 'LOAN_TERM',
    'C_SORT' => '1100',
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
  11 => 
  array (
    'TITLE' => 'Цель финансирования / Комментарии',
    'TITLE_TYPE' => 'text',
    'SID' => 'MESSAGE',
    'C_SORT' => '1200',
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
));
    }
}

