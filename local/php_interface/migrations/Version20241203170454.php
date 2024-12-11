<?php

namespace Sprint\Migration;


class Version20241203170454 extends Version
{
    protected $author = "admin";

    protected $description = "Обновление формы \"Заказать звонок\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Заказать звонок',
  'SID' => 'callback_form',
  'USE_CAPTCHA' => 'Y',
  'FORM_TEMPLATE' => ' 
<div><?=$FORM->ShowInput(\'SIMPLE_QUESTION_900\')?></div>
 
<div><?=$FORM->ShowInput(\'SIMPLE_QUESTION_910\')?></div>
 
<div><?=$FORM->ShowInput(\'SIMPLE_QUESTION_906\')?></div>
 
<div><?=$FORM->ShowInput(\'SIMPLE_QUESTION_247\')?></div>
 
<div><?=$FORM->ShowSubmitButton("","")?></div>
 ',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_callback_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Заказать звонок',
    'en' => 'Заказать звонок',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
    0 => 
    array (
      'EVENT_NAME' => 'FORM_FILLING_callback_form',
      'SUBJECT' => '#SERVER_NAME#: заполнена web-форма [#RS_FORM_ID#] #RS_FORM_NAME#',
    ),
  ),
));
        $helper->Form()->saveStatuses($formId, array (
  0 => 
  array (
    'CSS' => 'statusgreen',
    'TITLE' => 'DEFAULT',
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
    'TITLE' => 'Имя',
    'TITLE_TYPE' => 'text',
    'SID' => 'FIRST_NAME',
    'REQUIRED' => 'Y',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => 'Имя',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
        'FIELD_WIDTH' => '60',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  1 => 
  array (
    'TITLE' => 'Телефон',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
    'C_SORT' => '200',
    'REQUIRED' => 'Y',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => 'Телефон',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'FIELD_TYPE' => 'text',
      ),
    ),
    'VALIDATORS' => 
    array (
      0 => 
      array (
        'PARAMS' => 
        array (
          'LENGTH_FROM' => 12,
          'LENGTH_TO' => 12,
        ),
        'NAME' => 'text_len',
      ),
    ),
  ),
  2 => 
  array (
    'TITLE' => 'Удобное время для звонка',
    'TITLE_TYPE' => 'text',
    'SID' => 'CALL_TIME',
    'C_SORT' => '300',
    'FIELD_TYPE' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => 'Удобное время для звонка',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => '09:00 - 12:00',
        'VALUE' => '09:00 - 12:00',
        'FIELD_TYPE' => 'radio',
      ),
      1 => 
      array (
        'MESSAGE' => '12:00 - 15:00',
        'VALUE' => '12:00 - 15:00',
        'FIELD_TYPE' => 'radio',
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

