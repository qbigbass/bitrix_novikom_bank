<?php

namespace Sprint\Migration;


class Version20250317140131 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Новое свойство в ИБ ПиП";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('payments_and_transfers', 'for_private_clients_ru');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Детальное описание',
  'ACTIVE' => 'Y',
  'SORT' => '50',
  'CODE' => 'DETAIL_HTML',
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
));
            $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'SORT' => 'Сортировка',
    'PROPERTY_MOBILE_APP' => 'Блок приложение',
    'PROPERTY_ONLINE_BANK' => 'Блок онлайн банк',
    'PROPERTY_DETAIL_HTML' => 'Детальное описание',
  ),
  'Список|edit5' => 
  array (
    'PREVIEW_PICTURE' => 'Картинка для анонса',
    'PREVIEW_TEXT' => 'Описание для анонса',
  ),
  'Детальная страница|cedit1' => 
  array (
    'cedit1_csection3' => 'Шапка',
    'PROPERTY_BANNER_TEMPLATE' => 'Шапка',
    'PROPERTY_BANNER_IMAGE' => 'Детальная картинка',
    'PROPERTY_BANNER_BACKGROUND' => 'Бэкграунд',
    'DETAIL_TEXT' => 'Детальное описание',
    'cedit1_csection4' => 'Инфоврезка',
    'PROPERTY_ADDITIONAL_INFO_HEADER' => 'Заголовок',
    'PROPERTY_ADDITIONAL_INFO' => 'Инфоврезка',
    'cedit1_csection2' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Преимущества',
    'cedit1_csection5' => 'Надежно и удобно',
    'PROPERTY_CONVENIENCES_HEADER' => 'Заголовок',
    'PROPERTY_CONVENIENCES' => 'Удобства',
    'cedit1_csection6' => 'Инструкции',
    'PROPERTY_CARD_RECEIPT_OPTIONS_HEADER' => 'Заголовок',
    'PROPERTY_CARD_RECEIPT_OPTIONS' => 'Инструкции',
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
