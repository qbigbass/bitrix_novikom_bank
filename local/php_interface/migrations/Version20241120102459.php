<?php

namespace Sprint\Migration;


class Version20241120102459 extends Version
{
    protected $author = "r.machmutov@astarus.ru";

    protected $description = "Св-во \"Иконка\" для ИБ \"Бенефиты\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('benefits', 'additional');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Иконка',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'ICON',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'F',
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
));
    
    }
}
