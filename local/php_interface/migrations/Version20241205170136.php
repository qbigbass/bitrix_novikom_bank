<?php

namespace Sprint\Migration;


class Version20241205170136 extends Version
{
    protected $author = "admin";

    protected $description = "Добавляет поля в форму \"Заявка на кредит\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->getFormIdIfExists('loan_form');
            $helper->Form()->saveField($formId, array (
  'TITLE' => 'Серия паспорта',
  'TITLE_TYPE' => 'text',
  'SID' => 'PASSPORT_SERIES',
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
));
            $helper->Form()->saveField($formId, array (
  'TITLE' => 'Номер паспорта',
  'TITLE_TYPE' => 'text',
  'SID' => 'PASSPORT_NUMBER',
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
));
        }
}

