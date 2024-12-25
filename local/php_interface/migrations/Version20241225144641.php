<?php

namespace Sprint\Migration;


class Version20241225144641 extends Version
{
    protected $author = "r.machmutov";

    protected $description = "Поля для разделов ИБ \"МСБ / Каталог услуг\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_msb:msb_catalog_SECTION',
  'FIELD_NAME' => 'UF_TITLE_MENU',
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
    'en' => '',
    'ru' => 'Заголовок раздела для верхнего меню',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Заголовок раздела для верхнего меню',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Заголовок раздела для верхнего меню',
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
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_msb:msb_catalog_SECTION',
  'FIELD_NAME' => 'UF_SORT_MENU',
  'USER_TYPE_ID' => 'integer',
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
    'MIN_VALUE' => 0,
    'MAX_VALUE' => 0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Индекс сортировки раздела для меню',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Индекс сортировки раздела для меню',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Индекс сортировки раздела для меню',
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
