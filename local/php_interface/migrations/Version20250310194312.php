<?php

namespace Sprint\Migration;


class Version20250310194312 extends Version
{
    protected $author = "dmitry.sidorenko@dalee.ru";

    protected $description = "Для ИБ \"Дополнительно\" -> \"Варианты реструктуризации\" добавлено свойство \"Этапы шаблон\"";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('restructuring', 'additional');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Этапы шаблон',
  'ACTIVE' => 'Y',
  'SORT' => '650',
  'CODE' => 'STEPS_TEMPLATE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'В колонку',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'column',
    ),
    1 => 
    array (
      'VALUE' => 'С табами',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'with_tabs',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
    
    }
}
