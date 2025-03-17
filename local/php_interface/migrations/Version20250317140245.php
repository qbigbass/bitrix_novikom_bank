<?php

namespace Sprint\Migration;


class Version20250317140245 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Доработки ИБ Якорные ссылки";

    protected $moduleVersion = "4.18.1";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('anchor_links', 'additional');
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Раскрывающийся список',
            'ACTIVE' => 'Y',
            'SORT' => '5100',
            'CODE' => 'ACCORDION',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'additional:tabs',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EAutocomplete',
            'USER_TYPE_SETTINGS' =>
                array(
                    'VIEW' => 'T',
                    'SHOW_ADD' => 'N',
                    'MAX_WIDTH' => 0,
                    'MIN_HEIGHT' => 80,
                    'MAX_HEIGHT' => 1000,
                    'BAN_SYM' => ',;',
                    'REP_SYM' => ' ',
                    'OTHER_REP_SYM' => '',
                    'IBLOCK_MESS' => 'N',
                ),
            'HINT' => '#ACCORDION#',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
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
