<?php

namespace Sprint\Migration;


class Version20250222212514 extends Version
{
    protected $author = "dmitry.sidorenko@dalee.ru";

    protected $description = "Для ИБ \"Частным клиентам\" -> \"Карты\" добавление 2-х свойств \"Заголовки для инфоврезки\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('cards_detail_pages_ru', 'for_private_clients_ru');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок для инфоврезки (для карт)',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'ADDITIONAL_INFO_HEADER',
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
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок для инфоврезки (для бонусных программ)',
  'ACTIVE' => 'Y',
  'SORT' => '1000',
  'CODE' => 'INFO_BOX_HEADER',
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
