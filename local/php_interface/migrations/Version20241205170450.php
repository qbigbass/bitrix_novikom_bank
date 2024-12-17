<?php

namespace Sprint\Migration;


class Version20241205170450 extends Version
{
    protected $author = "admin";

    protected $description = "Добавляет поля в форму \"Заявка на кредитную карту\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $formId = $helper->Form()->getFormIdIfExists('credit_card_form');
            $helper->Form()->saveField($formId, array (
  'TITLE' => 'Серия паспорта',
  'TITLE_TYPE' => 'text',
  'SID' => 'PASSPORT_SERIES',
  'C_SORT' => '2000',
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
  'C_SORT' => '2100',
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

