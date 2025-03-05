<?php

namespace Sprint\Migration;


class Version20250228114502 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Изменения в иблоке ФИ";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->saveIblock(array (
  'IBLOCK_TYPE_ID' => 'financial_institutes',
  'LID' => 
  array (
    0 => 's1',
  ),
  'CODE' => 'financial_institutions',
  'API_CODE' => 'FinancialInstitutes',
  'REST_ON' => 'N',
  'NAME' => 'Финансовым институтам',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'LIST_PAGE_URL' => '#SITE_DIR#/financial-institutions/',
  'DETAIL_PAGE_URL' => '#SITE_DIR#/financial-institutions/#ELEMENT_CODE#/',
  'SECTION_PAGE_URL' => '',
  'CANONICAL_PAGE_URL' => '',
  'PICTURE' => NULL,
  'DESCRIPTION' => '',
  'DESCRIPTION_TYPE' => 'text',
  'RSS_TTL' => '24',
  'RSS_ACTIVE' => 'Y',
  'RSS_FILE_ACTIVE' => 'N',
  'RSS_FILE_LIMIT' => NULL,
  'RSS_FILE_DAYS' => NULL,
  'RSS_YANDEX_ACTIVE' => 'N',
  'XML_ID' => NULL,
  'INDEX_ELEMENT' => 'Y',
  'INDEX_SECTION' => 'N',
  'WORKFLOW' => 'N',
  'BIZPROC' => 'N',
  'SECTION_CHOOSER' => 'D',
  'LIST_MODE' => 'C',
  'RIGHTS_MODE' => 'S',
  'SECTION_PROPERTY' => 'N',
  'PROPERTY_INDEX' => 'N',
  'VERSION' => '1',
  'LAST_CONV_ELEMENT' => '0',
  'SOCNET_GROUP_ID' => NULL,
  'EDIT_FILE_BEFORE' => '',
  'EDIT_FILE_AFTER' => '',
  'SECTIONS_NAME' => 'Разделы',
  'SECTION_NAME' => 'Раздел',
  'ELEMENTS_NAME' => 'Элементы',
  'ELEMENT_NAME' => 'Элемент',
  'EXTERNAL_ID' => NULL,
  'LANG_DIR' => '/',
  'IPROPERTY_TEMPLATES' => 
  array (
  ),
  'ELEMENT_ADD' => 'Добавить элемент',
  'ELEMENT_EDIT' => 'Изменить элемент',
  'ELEMENT_DELETE' => 'Удалить элемент',
  'SECTION_ADD' => 'Добавить раздел',
  'SECTION_EDIT' => 'Изменить раздел',
  'SECTION_DELETE' => 'Удалить раздел',
));
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Элементы для блока  (Преимущества услуги/продукта)',
  'ACTIVE' => 'Y',
  'SORT' => '1600',
  'CODE' => 'BENEFITS_SLIDER',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:benefits',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'EAutocomplete',
  'USER_TYPE_SETTINGS' => 
  array (
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
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Элементы для блока (Преимущества Новикома)',
  'ACTIVE' => 'Y',
  'SORT' => '1660',
  'CODE' => 'BENEFITS_TILE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:benefits',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'EAutocomplete',
  'USER_TYPE_SETTINGS' => 
  array (
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
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок инфоврезки 1',
  'ACTIVE' => 'Y',
  'SORT' => '1705',
  'CODE' => 'QUOTE_HEADER_1',
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
  'NAME' => 'Текст инфоврезки 1',
  'ACTIVE' => 'Y',
  'SORT' => '1710',
  'CODE' => 'QUOTE_TEXT_1',
  'DEFAULT_VALUE' => 
  array (
    'TYPE' => 'HTML',
    'TEXT' => '',
  ),
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'Y',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'HTML',
  'USER_TYPE_SETTINGS' => 
  array (
    'height' => 200,
  ),
  'HINT' => '',
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
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок инфоврезки 2',
  'ACTIVE' => 'Y',
  'SORT' => '1715',
  'CODE' => 'QUOTE_HEADER_2',
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
  'NAME' => 'Текст инфоврезки 2',
  'ACTIVE' => 'Y',
  'SORT' => '1720',
  'CODE' => 'QUOTE_TEXT_2',
  'DEFAULT_VALUE' => 
  array (
    'TYPE' => 'HTML',
    'TEXT' => '',
  ),
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'Y',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'HTML',
  'USER_TYPE_SETTINGS' => 
  array (
    'height' => 200,
  ),
  'HINT' => '',
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
            $helper->Iblock()->saveProperty($iblockId, array (
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
  'NAME' => 'Текст инфоврезки 3',
  'ACTIVE' => 'Y',
  'SORT' => '1730',
  'CODE' => 'QUOTE_TEXT_3',
  'DEFAULT_VALUE' => 
  array (
    'TYPE' => 'HTML',
    'TEXT' => '',
  ),
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'Y',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'HTML',
  'USER_TYPE_SETTINGS' => 
  array (
    'height' => 200,
  ),
  'HINT' => '',
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
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Элементы для блока (Подробные преимущества)',
  'ACTIVE' => 'Y',
  'SORT' => '1900',
  'CODE' => 'BENEFITS_ICONS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:benefits',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'EAutocomplete',
  'USER_TYPE_SETTINGS' => 
  array (
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
  'HINT' => '',
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
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Варианты сопровождения',
  'ACTIVE' => 'Y',
  'SORT' => '2100',
  'CODE' => 'SUPPORT_OPTIONS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:banking_support_options',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'EAutocomplete',
  'USER_TYPE_SETTINGS' => 
  array (
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
  'HINT' => '',
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
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Вкладки',
  'ACTIVE' => 'Y',
  'SORT' => '2300',
  'CODE' => 'TABS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
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
  array (
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
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Блок с якорными ссылками',
  'ACTIVE' => 'Y',
  'SORT' => '5000',
  'CODE' => 'ANCHOR_LINKS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:anchor_links',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'EAutocomplete',
  'USER_TYPE_SETTINGS' => 
  array (
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
  'HINT' => '',
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
