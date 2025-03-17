<?php

namespace Sprint\Migration;


class Version20250317140131 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Новое свойство в ИБ ПиП";

    protected $moduleVersion = "4.18.1";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('payments_and_transfers', 'for_private_clients_ru');
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Детальное описание',
            'ACTIVE' => 'Y',
            'SORT' => '50',
            'CODE' => 'DETAIL_HTML',
            'DEFAULT_VALUE' =>
                array(
                    'TEXT' => '',
                    'TYPE' => 'HTML',
                ),
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'HTML',
            'USER_TYPE_SETTINGS' =>
                array(
                    'height' => 200,
                ),
            'HINT' => '',
        ));
    }
}
