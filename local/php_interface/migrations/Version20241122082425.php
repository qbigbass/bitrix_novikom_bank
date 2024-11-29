<?php

namespace Sprint\Migration;


class Version20241122082425 extends Version
{
    protected $author = "r.machmutov@astarus.ru";

    protected $description = "Поля \"Иконка\" и \"Тип клиента\" для ИБ \"Продукты и услуги\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_support:products_services_SECTION',
  'FIELD_NAME' => 'UF_SUPPORT_PRODUCT__ICON',
  'USER_TYPE_ID' => 'file',
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
    'LIST_WIDTH' => 0,
    'LIST_HEIGHT' => 0,
    'MAX_SHOW_SIZE' => 0,
    'MAX_ALLOWED_SIZE' => 0,
    'EXTENSIONS' => 
    array (
    ),
    'TARGET_BLANK' => 'Y',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Иконка',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Иконка',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Иконка',
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
  'ENTITY_ID' => 'IBLOCK_support:products_services_SECTION',
  'FIELD_NAME' => 'UF_SUPPORT_PRODUCT_TYPE',
  'USER_TYPE_ID' => 'enumeration',
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
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 1,
    'CAPTION_NO_VALUE' => '',
    'SHOW_NO_VALUE' => 'Y',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Тип клиента',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Тип клиента',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Тип клиента',
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
  'ENUM_VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Частный',
      'DEF' => 'Y',
      'SORT' => '500',
      'XML_ID' => 'private',
    ),
    1 => 
    array (
      'VALUE' => 'Корпоративный',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'corporate',
    ),
    2 => 
    array (
      'VALUE' => 'МСБ',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'msb',
    ),
  ),
));
    }

}
