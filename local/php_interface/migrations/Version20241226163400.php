<?php

namespace Sprint\Migration;


class Version20241226163400 extends Version
{
    protected $author = "admin";

    protected $description = "Добавляет свойство в ИБ \"Офисы и банкоматы\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('offices', 'offices_atm');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Свободный доступ',
  'ACTIVE' => 'Y',
  'SORT' => '242',
  'CODE' => 'FREE_ACCESS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'C',
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
      'VALUE' => 'Y',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'Y',
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
));

    }
}
