<?php

namespace Sprint\Migration;


class Version20250225103933 extends Version
{
    protected $author = "r.machmutov";

    protected $description = "Заявка на экспресс-гарантию";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Заявка на экспресс-гарантию',
  'SID' => 'express_guarantee_form',
  'C_SORT' => '1200',
  'USE_CAPTCHA' => 'Y',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_express_guarantee_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'STAT_EVENT2' => 'express_guarantee_form',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Заявка на экспресс-гарантию',
    'en' => 'Заявка на экспресс-гарантию',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
    0 => 
    array (
      'EVENT_NAME' => 'FORM_FILLING_express_guarantee_form',
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
    'TITLE' => 'ИНН',
    'TITLE_TYPE' => 'text',
    'SID' => 'INN',
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
    'TITLE' => 'Контактное лицо',
    'TITLE_TYPE' => 'text',
    'SID' => 'CONTACT_NAME',
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
    'TITLE' => 'Номер телефона',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
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
    'TITLE' => 'E-mail',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMAIL',
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
    'TITLE' => 'Сумма гарантии',
    'TITLE_TYPE' => 'text',
    'SID' => 'GUARANTEE_AMOUNT',
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
    'TITLE' => 'ФЗ',
    'TITLE_TYPE' => 'text',
    'SID' => 'FZ',
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
        'MESSAGE' => '44-ФЗ',
        'VALUE' => 'fz44',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'MESSAGE' => '223-ФЗ',
        'VALUE' => 'fz223',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '200',
      ),
      2 => 
      array (
        'MESSAGE' => 'ЕПОЗ (коммерческая)',
        'VALUE' => 'fzEpoz',
        'FIELD_TYPE' => 'radio',
        'C_SORT' => '300',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  7 => 
  array (
    'TITLE' => 'Аванс по контракту',
    'TITLE_TYPE' => 'text',
    'SID' => 'ADVANCE',
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
        'MESSAGE' => 'Предусмотрен',
        'VALUE' => 'true',
        'FIELD_TYPE' => 'checkbox',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'MESSAGE' => 'Не предусмотрен',
        'VALUE' => 'false',
        'FIELD_TYPE' => 'checkbox',
        'C_SORT' => '200',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  8 => 
  array (
    'TITLE' => 'Сумма аванса',
    'TITLE_TYPE' => 'text',
    'SID' => 'ADVANCE_AMOUNT',
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
    'TITLE' => 'Контракт уже заключен?',
    'TITLE_TYPE' => 'text',
    'SID' => 'CONTRACT',
    'C_SORT' => '1000',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'N',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'Да',
        'VALUE' => 'true',
        'FIELD_TYPE' => 'checkbox',
        'C_SORT' => '100',
      ),
      1 => 
      array (
        'MESSAGE' => 'Нет',
        'VALUE' => 'false',
        'FIELD_TYPE' => 'checkbox',
        'C_SORT' => '200',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
));
    }
}

