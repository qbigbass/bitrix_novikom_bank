<?php

namespace Sprint\Migration;


class Version20241105224355 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "пользовательские поля инфоблока спецпредложения";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:special_offers_ru_SECTION',
  'FIELD_NAME' => 'UF_TAG',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Тег раздела',
    'ru' => 'Тег раздела',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Тег раздела',
    'ru' => 'Тег раздела',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Тег раздела',
    'ru' => 'Тег раздела',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
    }

}
