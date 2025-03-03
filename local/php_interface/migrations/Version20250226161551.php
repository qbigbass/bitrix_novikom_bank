<?php

namespace Sprint\Migration;


class Version20250226161551 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Новые свойства инфоврезок для страниц КК";

    protected $moduleVersion = "4.18.1";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('corporate_clients', 'for_corporate_clients_ru');
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Заголовок инфоврезки 1',
            'ACTIVE' => 'Y',
            'SORT' => '1705',
            'CODE' => 'QUOTE_HEADER_1',
            'DEFAULT_VALUE' => null,
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
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:1:{s:6:"height";i:200;}',
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Текст инфоврезки 1',
            'ACTIVE' => 'Y',
            'SORT' => '1710',
            'CODE' => 'QUOTE_TEXT_1',
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
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Заголовок инфоврезки 2',
            'ACTIVE' => 'Y',
            'SORT' => '1715',
            'CODE' => 'QUOTE_HEADER_2',
            'DEFAULT_VALUE' => null,
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
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:1:{s:6:"height";i:200;}',
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Текст инфоврезки 2',
            'ACTIVE' => 'Y',
            'SORT' => '1720',
            'CODE' => 'QUOTE_TEXT_2',
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
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Заголовок инфоврезки 3',
            'ACTIVE' => 'Y',
            'SORT' => '1725',
            'CODE' => 'QUOTE_HEADER_3',
            'DEFAULT_VALUE' => '',
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
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => null,
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Текст инфоврезки 3',
            'ACTIVE' => 'Y',
            'SORT' => '1730',
            'CODE' => 'QUOTE_TEXT_3',
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
