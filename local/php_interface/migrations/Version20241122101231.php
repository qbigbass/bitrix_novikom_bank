<?php

namespace Sprint\Migration;


class Version20241122101231 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Инфоблок Банковские карты (детальные страницы)";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->saveIblockType(array (
  'ID' => 'for_private_clients_ru',
  'SECTIONS' => 'Y',
  'EDIT_FILE_BEFORE' => '',
  'EDIT_FILE_AFTER' => '',
  'IN_RSS' => 'N',
  'SORT' => '500',
  'LANG' =>
  array (
    'ru' =>
    array (
      'NAME' => 'Частным клиентам',
      'SECTION_NAME' => '',
      'ELEMENT_NAME' => '',
    ),
    'en' =>
    array (
      'NAME' => 'For private clients',
      'SECTION_NAME' => '',
      'ELEMENT_NAME' => '',
    ),
  ),
));
        $iblockId = $helper->Iblock()->saveIblock(array (
  'IBLOCK_TYPE_ID' => 'for_private_clients_ru',
  'LID' =>
  array (
    0 => 's1',
  ),
  'CODE' => 'cards_detail_pages_ru',
  'API_CODE' => 'CardsDetailPagesRuApi',
  'REST_ON' => 'N',
  'NAME' => 'Банковские карты (детальные страницы)',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'LIST_PAGE_URL' => '#SITE_DIR#/for_private_clients_ru/index.php?ID=#IBLOCK_ID#',
  'DETAIL_PAGE_URL' => '#SITE_DIR#/for_private_clients_ru/detail.php?ID=#ELEMENT_ID#',
  'SECTION_PAGE_URL' => '#SITE_DIR#/for_private_clients_ru/list.php?SECTION_ID=#SECTION_ID#',
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
  'INDEX_SECTION' => 'Y',
  'WORKFLOW' => 'N',
  'BIZPROC' => 'N',
  'SECTION_CHOOSER' => 'L',
  'LIST_MODE' => 'C',
  'RIGHTS_MODE' => 'S',
  'SECTION_PROPERTY' => 'Y',
  'PROPERTY_INDEX' => 'N',
  'VERSION' => '1',
  'LAST_CONV_ELEMENT' => '0',
  'SOCNET_GROUP_ID' => NULL,
  'EDIT_FILE_BEFORE' => '',
  'EDIT_FILE_AFTER' => '',
  'SECTIONS_NAME' => 'Карты',
  'SECTION_NAME' => 'Карта',
  'ELEMENTS_NAME' => 'Детальные страницы',
  'ELEMENT_NAME' => 'Детальная страница',
  'EXTERNAL_ID' => NULL,
  'LANG_DIR' => '/',
  'IPROPERTY_TEMPLATES' =>
  array (
  ),
  'ELEMENT_ADD' => 'Добавить страницу',
  'ELEMENT_EDIT' => 'Изменить страницу',
  'ELEMENT_DELETE' => 'Удалить страницу',
  'SECTION_ADD' => 'Добавить карту',
  'SECTION_EDIT' => 'Изменить карту',
  'SECTION_DELETE' => 'Удалить карту',
));
        $helper->Iblock()->saveIblockFields($iblockId, array (
  'IBLOCK_SECTION' =>
  array (
    'NAME' => 'Привязка к разделам',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' =>
    array (
      'KEEP_IBLOCK_SECTION_ID' => 'N',
    ),
    'VISIBLE' => 'Y',
  ),
  'ACTIVE' =>
  array (
    'NAME' => 'Активность',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'Y',
    'VISIBLE' => 'Y',
  ),
  'ACTIVE_FROM' =>
  array (
    'NAME' => 'Начало активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'ACTIVE_TO' =>
  array (
    'NAME' => 'Окончание активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SORT' =>
  array (
    'NAME' => 'Сортировка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '500',
    'VISIBLE' => 'Y',
  ),
  'NAME' =>
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'PREVIEW_PICTURE' =>
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' =>
    array (
      'FROM_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'DELETE_WITH_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'PREVIEW_TEXT_TYPE' =>
  array (
    'NAME' => 'Тип описания для анонса',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
    'VISIBLE' => 'Y',
  ),
  'PREVIEW_TEXT' =>
  array (
    'NAME' => 'Описание для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'DETAIL_PICTURE' =>
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' =>
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'DETAIL_TEXT_TYPE' =>
  array (
    'NAME' => 'Тип детального описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
    'VISIBLE' => 'Y',
  ),
  'DETAIL_TEXT' =>
  array (
    'NAME' => 'Детальное описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'XML_ID' =>
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'CODE' =>
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' =>
    array (
      'UNIQUE' => 'Y',
      'TRANSLITERATION' => 'Y',
      'TRANS_LEN' => 100,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
    'VISIBLE' => 'Y',
  ),
  'TAGS' =>
  array (
    'NAME' => 'Теги',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_NAME' =>
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_PICTURE' =>
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' =>
    array (
      'FROM_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'DELETE_WITH_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'SECTION_DESCRIPTION_TYPE' =>
  array (
    'NAME' => 'Тип описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
    'VISIBLE' => 'Y',
  ),
  'SECTION_DESCRIPTION' =>
  array (
    'NAME' => 'Описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_DETAIL_PICTURE' =>
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' =>
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'SECTION_XML_ID' =>
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_CODE' =>
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' =>
    array (
      'UNIQUE' => 'N',
      'TRANSLITERATION' => 'N',
      'TRANS_LEN' => 100,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
    'VISIBLE' => 'Y',
  ),
  'LOG_SECTION_ADD' =>
  array (
    'NAME' => 'LOG_SECTION_ADD',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_SECTION_EDIT' =>
  array (
    'NAME' => 'LOG_SECTION_EDIT',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_SECTION_DELETE' =>
  array (
    'NAME' => 'LOG_SECTION_DELETE',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_ELEMENT_ADD' =>
  array (
    'NAME' => 'LOG_ELEMENT_ADD',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_ELEMENT_EDIT' =>
  array (
    'NAME' => 'LOG_ELEMENT_EDIT',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_ELEMENT_DELETE' =>
  array (
    'NAME' => 'LOG_ELEMENT_DELETE',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
));
    $helper->Iblock()->saveGroupPermissions($iblockId, array (
  'administrators' => 'X',
  'everyone' => 'R',
));
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Краткие условия',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SHORT_CONDITIONS',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'multiple_field',
  'USER_TYPE_SETTINGS' =>
  array (
    'COUNT' => 3,
    'DESCR' =>
    array (
      1 => 'Наименование',
      2 => 'Текст',
      3 => 'Крупный текст',
    ),
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Бенефиты',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BENEFITS',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Скидки',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'DISCOUNTS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:discounts_ru',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок блока бенефитов',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BENEFITS_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок блока скидок',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'DISCOUNTS_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Тег баннера',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BANNER_TAG',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок баннера',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BANNER_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Изображение',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BANNER_IMG',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'F',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => NULL,
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg, webp',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Ссылка на страницу с подробной информацией',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BANNER_LINK',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Текст',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BANNER_TEXT',
  'DEFAULT_VALUE' =>
  array (
    'TEXT' => '',
    'TYPE' => 'HTML',
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
  'WITH_DESCRIPTION' => 'N',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Спецпредложения',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SPECIAL_OFFERS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'for_private_clients_ru:special_offers_ru',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок блока спецпредложений',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SPECIAL_OFFERS_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Как оформить карту',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'CARD_RECEIPT_OPTIONS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:instructions_ru',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок блока удобств',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'CONVENIENCES_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Удобства',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'CONVENIENCES',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'additional:reliable_and_convenient_ru',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок блока с табами',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'TABS_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Табы',
  'ACTIVE' => 'Y',
  'SORT' => '500',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок блока бонусных программ',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BONUS_PROGRAMS_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Бонусные программы',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BONUS_PROGRAMS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'for_private_clients_ru:bonus_programs_ru',
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
    'MIN_HEIGHT' => 70,
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Название блока с шагами',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'STEPS_HEADING',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Пошаговая инструкция',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'STEPS',
  'DEFAULT_VALUE' =>
  array (
    'TEXT' => '',
    'TYPE' => 'HTML',
  ),
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Инфоврезка',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'ADDITIONAL_INFO',
  'DEFAULT_VALUE' =>
  array (
    'TEXT' => '',
    'TYPE' => 'HTML',
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
  'WITH_DESCRIPTION' => 'N',
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
  'SMART_FILTER' => NULL,
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Текст ссылки',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BANNER_LINK_TEXT',
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
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Выводить ссылку в виде кнопки',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'LINK_IS_BUTTON',
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
      'XML_ID' => '8d91a3236cc6038d4c83856f34bb6a6b',
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
            $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' =>
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'ACTIVE_FROM' => 'Начало активности',
    'ACTIVE_TO' => 'Окончание активности',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'SORT' => 'Сортировка',
    'SECTIONS' => 'Разделы',
  ),
  'Описание и краткие условия|cedit1' =>
  array (
    'DETAIL_TEXT' => 'Детальное описание',
    'PROPERTY_SHORT_CONDITIONS' => 'Краткие условия',
  ),
  'Бенефиты|cedit2' =>
  array (
    'PROPERTY_BENEFITS_HEADING' => 'Заголовок блока бенефитов',
    'PROPERTY_BENEFITS' => 'Бенефиты',
  ),
  'Бонусные программы|cedit9' =>
  array (
    'PROPERTY_BONUS_PROGRAMS_HEADING' => 'Заголовок блока бонусных программ',
    'PROPERTY_BONUS_PROGRAMS' => 'Бонусные программы',
  ),
  'Надежно и удобно|cedit7' =>
  array (
    'PROPERTY_CONVENIENCES_HEADING' => 'Заголовок блока удобств',
    'PROPERTY_CONVENIENCES' => 'Удобства',
  ),
  'Баннер|cedit4' =>
  array (
    'PROPERTY_BANNER_TAG' => 'Тег баннера',
    'PROPERTY_BANNER_HEADING' => 'Заголовок баннера',
    'PROPERTY_BANNER_IMG' => 'Изображение',
    'PROPERTY_BANNER_TEXT' => 'Текст',
    'PROPERTY_BANNER_LINK' => 'Ссылка на страницу с подробной информацией',
    'PROPERTY_BANNER_LINK_TEXT' => 'Текст ссылки',
    'PROPERTY_LINK_IS_BUTTON' => 'Выводить ссылку в виде кнопки',
  ),
  'Инфоврезка|cedit11' =>
  array (
    'PROPERTY_ADDITIONAL_INFO' => 'Инфоврезка',
  ),
  'Скидки|cedit3' =>
  array (
    'PROPERTY_DISCOUNTS_HEADING' => 'Заголовок блока скидок',
    'PROPERTY_DISCOUNTS' => 'Скидки',
  ),
  'Блок с табами|cedit8' =>
  array (
    'PROPERTY_TABS_HEADING' => 'Заголовок блока с табами',
    'PROPERTY_TABS' => 'Табы',
  ),
  'Пошаговая инструкция|cedit10' =>
  array (
    'PROPERTY_STEPS_HEADING' => 'Название блока с шагами',
    'PROPERTY_STEPS' => 'Пошаговая инструкция',
  ),
  'Как оформить карту|cedit6' =>
  array (
    'PROPERTY_OPTIONS_BLOCK_HEADING' => 'Заголовок блока с вариантами',
    'PROPERTY_CARD_RECEIPT_OPTIONS' => 'Как оформить карту',
  ),
  'Спецпредложения|cedit5' =>
  array (
    'PROPERTY_SPECIAL_OFFERS_HEADING' => 'Заголовок блока спецпредложений',
    'PROPERTY_SPECIAL_OFFERS' => 'Спецпредложения',
  ),
  'SEO|edit14' =>
  array (
    'IPROPERTY_TEMPLATES_ELEMENT_META_TITLE' => 'Шаблон META TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS' => 'Шаблон META KEYWORDS',
    'IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION' => 'Шаблон META DESCRIPTION',
    'IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE' => 'Заголовок элемента',
    'IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE' => 'Настройки для картинок анонса элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE' => 'Настройки для детальных картинок элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'SEO_ADDITIONAL' => 'Дополнительно',
    'TAGS' => 'Теги',
  ),
));
        $helper->UserOptions()->saveSectionForm($iblockId, array (
  'Карта|edit1' =>
  array (
    'USER_FIELDS_ADD' => 'Добавить пользовательское свойство',
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Раздел активен',
    'NAME' => 'Название рздела с детальными страницами',
    'UF_OUTPUT_NAME' => 'Наименование карты для вывода на детальной',
    'UF_CARD_ICON' => 'Детальная иконка карты',
    'UF_BANNER_STYLE' => 'Стиль баннера',
  ),
));
    $helper->UserOptions()->saveElementGrid($iblockId, array (
  'views' =>
  array (
    'default' =>
    array (
      'columns' =>
      array (
        0 => '',
      ),
      'columns_sizes' =>
      array (
        'expand' => 1,
        'columns' =>
        array (
        ),
      ),
      'sticked_columns' =>
      array (
      ),
      'custom_names' =>
      array (
      ),
    ),
  ),
  'filters' =>
  array (
  ),
  'current_view' => 'default',
));

    }
}
