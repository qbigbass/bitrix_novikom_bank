<?php

namespace Sprint\Migration;


class Version20241105224546 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Пользовательские поля инфоблока с детальными страницами карточек";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:cards_detail_pages_ru_SECTION',
  'FIELD_NAME' => 'UF_CARD_ICON',
  'USER_TYPE_ID' => 'file',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
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
      'jpg' => true,
      'gif' => true,
      'bmp' => true,
      'png' => true,
      'jpeg' => true,
      'webp' => true,
      'svg' => true,
    ),
    'TARGET_BLANK' => 'Y',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Детальная иконка карты',
    'ru' => 'Детальная иконка карты',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Детальная иконка карты',
    'ru' => 'Детальная иконка карты',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Детальная иконка карты',
    'ru' => 'Детальная иконка карты',
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
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:cards_detail_pages_ru_SECTION',
  'FIELD_NAME' => 'UF_OUTPUT_NAME',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 70,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Наименование карты для вывода на детальной',
    'ru' => 'Наименование карты для вывода на детальной',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Наименование карты для вывода на детальной',
    'ru' => 'Наименование карты для вывода на детальной',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Наименование карты для вывода на детальной',
    'ru' => 'Наименование карты для вывода на детальной',
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
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:cards_detail_pages_ru_SECTION',
  'FIELD_NAME' => 'UF_BANNER_STYLE',
  'USER_TYPE_ID' => 'hlblock',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 1,
    'HLBLOCK_ID' => 'CardBannerStyles',
    'HLFIELD_ID' => 'UF_NAME',
    'DEFAULT_VALUE' => 0,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Стиль баннера',
    'ru' => 'Стиль баннера',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Стиль баннера',
    'ru' => 'Стиль баннера',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Стиль баннера',
    'ru' => 'Стиль баннера',
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
