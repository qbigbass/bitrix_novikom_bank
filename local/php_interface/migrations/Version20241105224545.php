<?php

namespace Sprint\Migration;


class Version20241105224545 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "HL со стилями баннера в картах";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
    $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'CardBannerStyles',
  'TABLE_NAME' => 'card_banner_styles',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Стили баннера на детальной карт',
    ),
    'en' => 
    array (
      'NAME' => 'Стили баннера на детальной карт',
    ),
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_NAME',
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
    'en' => 'Название стиля баннера',
    'ru' => 'Название стиля баннера',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Название стиля баннера',
    'ru' => 'Название стиля баннера',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Название стиля баннера',
    'ru' => 'Название стиля баннера',
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
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_CSS_CLASSES',
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
    'en' => 'Css классы для оформления баннера',
    'ru' => 'Css классы для оформления баннера',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Css классы для оформления баннера',
    'ru' => 'Css классы для оформления баннера',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Css классы для оформления баннера',
    'ru' => 'Css классы для оформления баннера',
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
