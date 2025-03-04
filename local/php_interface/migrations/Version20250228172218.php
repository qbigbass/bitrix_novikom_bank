<?php

namespace Sprint\Migration;


class Version20250228172218 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Перенос нового свойства изображения онлайн-сервисов";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('online_services', 'for_private_clients_ru');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Изображение плашки доп. информации ',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'ADDITIONAL_INFO_IMG',
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
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
    
    }
}
