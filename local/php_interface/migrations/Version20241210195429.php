<?php

namespace Sprint\Migration;


class Version20241210195429 extends Version
{
    protected $author = "admin";

    protected $description = "Добавляет форму \"Перезвоните мне\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Перезвоните мне',
  'SID' => 'simple_callback_form',
  'C_SORT' => '900',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_simple_callback_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'STAT_EVENT2' => 'simple_callback_form',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Перезвоните мне',
    'en' => 'Перезвоните мне',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
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
    'TITLE' => 'Телефон',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
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

