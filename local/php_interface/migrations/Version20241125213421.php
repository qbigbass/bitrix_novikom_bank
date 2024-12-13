<?php

namespace Sprint\Migration;


class Version20241125213421 extends Version
{
    protected $author = "admin";

    protected $description = "Создает форму \"Заявка на вакансию\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->saveForm(array (
  'NAME' => 'Заявка на вакансию',
  'SID' => 'vacancy_form',
  'C_SORT' => '700',
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_vacancy_form',
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'STAT_EVENT2' => 'vacancy_form',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Заявка на вакансию',
    'en' => 'Заявка на вакансию',
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
    'TITLE' => 'Имя и отчество',
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
    'TITLE' => 'E-mail',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMAIL',
    'C_SORT' => '300',
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
  3 => 
  array (
    'TITLE' => 'Телефон',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHONE',
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
    'TITLE' => 'Прикрепленные файлы',
    'TITLE_TYPE' => 'text',
    'SID' => 'ATTACH_FILE',
    'C_SORT' => '500',
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
  5 => 
  array (
    'TITLE' => 'Ссылка на online-резюме',
    'TITLE_TYPE' => 'text',
    'SID' => 'CV_LINK',
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
));
    }
}

