<?php

namespace Sprint\Migration;


class Version20241204094413 extends Version
{
    protected $author = "r.machmutov@astarus.ru";

    protected $description = "ИБ Каталог услуг / Пользовательские поля";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_financial_institutes:fi_catalog_SECTION',
  'FIELD_NAME' => 'UF_FI_ICON',
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
    'en' => 'Icon',
    'ru' => 'Иконка',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Icon',
    'ru' => 'Иконка',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Icon',
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
  'ENTITY_ID' => 'IBLOCK_for_financial_institutes:fi_catalog_SECTION',
  'FIELD_NAME' => 'UF_FI_POS',
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
    'ru' => 'Положение раздела на гл. стр. Финансовым институтам',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Положение раздела на гл. стр. Финансовым институтам',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Положение раздела на гл. стр. Финансовым институтам',
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
      'VALUE' => 'Сверху',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'up',
    ),
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_financial_institutes:fi_catalog_SECTION',
  'FIELD_NAME' => 'UF_FI_SHOW_SECT',
  'USER_TYPE_ID' => 'boolean',
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
    'DEFAULT_VALUE' => 0,
    'DISPLAY' => 'DROPDOWN',
    'LABEL' => 
    array (
      0 => '',
      1 => '',
    ),
    'LABEL_CHECKBOX' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Отображать меню из элементов',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Отображать меню из элементов',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Отображать меню из элементов',
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
  'ENTITY_ID' => 'IBLOCK_for_financial_institutes:fi_catalog_SECTION',
  'FIELD_NAME' => 'UF_FI_SHOW_CONTACT',
  'USER_TYPE_ID' => 'boolean',
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
    'DEFAULT_VALUE' => 0,
    'DISPLAY' => 'DROPDOWN',
    'LABEL' => 
    array (
      0 => '',
      1 => '',
    ),
    'LABEL_CHECKBOX' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Отображать блок Контакты',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Отображать блок Контакты',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => '',
    'ru' => 'Отображать блок Контакты',
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
