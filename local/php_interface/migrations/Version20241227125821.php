<?php

namespace Sprint\Migration;


class Version20241227125821 extends Version
{
    protected $author = "r.machmutov";

    protected $description = "Св-во \"Цвет фона цитаты\" для ИБ \"МСБ / Цитаты для каталога услуг\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('msb_quotes', 'for_msb');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Цвет фона цитаты',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'COLOR_BG',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
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
