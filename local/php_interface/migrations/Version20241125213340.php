<?php

namespace Sprint\Migration;


class Version20241125213340 extends Version
{
    protected $author = "admin";

    protected $description = "Создает форму \"Заявка на ипотеку\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Заявка на ипотеку',
  'SID' => 'mortgage_form',
  'C_SORT' => '500',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_mortgage_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'STAT_EVENT2' => 'mortgage_form',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Заявка на ипотеку',
    'en' => 'Заявка на ипотеку',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
    0 => 
    array (
      'EVENT_NAME' => 'FORM_FILLING_mortgage_form',
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
    'TITLE' => 'Фамилия',
    'TITLE_TYPE' => 'text',
    'SID' => 'LAST_NAME',
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
    'TITLE' => 'Имя',
    'TITLE_TYPE' => 'text',
    'SID' => 'FIRST_NAME',
    'C_SORT' => '200',
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
    'TITLE' => 'Отчество',
    'TITLE_TYPE' => 'text',
    'SID' => 'MIDDLE_NAME',
    'C_SORT' => '300',
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
    'TITLE' => 'Дата рождения',
    'TITLE_TYPE' => 'text',
    'SID' => 'BIRTHDAY',
    'C_SORT' => '400',
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
  4 => 
  array (
    'TITLE' => 'Телефон',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
    'C_SORT' => '500',
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
    'TITLE' => 'E-mail',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMAIL',
    'C_SORT' => '600',
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
  6 => 
  array (
    'TITLE' => 'Пол',
    'TITLE_TYPE' => 'text',
    'SID' => 'PERSON_SEX',
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
    'TITLE' => 'Гражданство',
    'TITLE_TYPE' => 'text',
    'SID' => 'CITIZENSHIP',
    'C_SORT' => '800',
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
    'TITLE' => 'Общий трудовой стаж',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMPLOYMENT_HISTORY',
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
    'TITLE' => 'Стаж на последнем месте работы',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMPLOYMENT_LAST_WORK',
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
    'TITLE' => 'Ежемесячный доход',
    'TITLE_TYPE' => 'text',
    'SID' => 'MONTHLY_INCOME',
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
    'TITLE' => 'Наименование организации-работодателя',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMPLOYER_NAME',
    'C_SORT' => '1200',
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
  12 => 
  array (
    'TITLE' => 'Тип жилья',
    'TITLE_TYPE' => 'text',
    'SID' => 'TYPE_HOUSING',
    'C_SORT' => '1300',
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
    'TITLE' => 'Сумма ипотеки',
    'TITLE_TYPE' => 'text',
    'SID' => 'MORTGAGE_AMOUNT',
    'C_SORT' => '1400',
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
  14 => 
  array (
    'TITLE' => 'Первоначальный взнос',
    'TITLE_TYPE' => 'text',
    'SID' => 'MORTGAGE_INITIAL_PAYMENT',
    'C_SORT' => '1500',
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
  15 => 
  array (
    'TITLE' => 'Срок ипотеки',
    'TITLE_TYPE' => 'text',
    'SID' => 'MORTGAGE_TERM',
    'C_SORT' => '1600',
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
  16 => 
  array (
    'TITLE' => 'Страхование',
    'TITLE_TYPE' => 'text',
    'SID' => 'INSURANCE',
    'C_SORT' => '1700',
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
  17 => 
  array (
    'TITLE' => 'Офис получения кредита',
    'TITLE_TYPE' => 'text',
    'SID' => 'OFFICE_OBTAINING',
    'C_SORT' => '1800',
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

