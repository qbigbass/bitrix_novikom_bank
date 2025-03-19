<?php

namespace Sprint\Migration;


class Version20250306112719 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования КК";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('corporate_clients', 'for_corporate_clients_ru');
        $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'PROPERTY_REF_IBLOCK_MSB' => 'Вывод контента в одноименном разделе МСБ',
    'SORT' => 'Сортировка',
    'PREVIEW_TEXT' => 'Описание',
  ),
  'Список|cedit1' => 
  array (
    'PROPERTY_PREVIEW_PICTURE' => 'Иконка',
    'PROPERTY_LIST_POSITION' => 'Положение в списке',
  ),
  'Детальная страница|cedit2' => 
  array (
    'cedit2_csection2' => 'Шапка',
    'PROPERTY_TITLE_HEADER' => 'Заголовок в шапке',
    'PROPERTY_HEADER_TEMPLATE' => 'Шапка',
    'DETAIL_PICTURE' => 'Детальная картинка',
    'PROPERTY_BANNER_BACKGROUND' => 'Бэкграунд',
    'PROPERTY_SHORT_CONDITIONS' => 'Краткие условия',
    'PROPERTY_BENEFITS_TOP' => 'Преимущества в шапке (снизу)',
    'PROPERTY_CNT_COL_BENEFITS_TOP' => 'Кол-во колонок для преимуществ снизу в шапке',
    'PROPERTY_BUTTON_DETAIL' => 'Выводить кнопку',
    'PROPERTY_BUTTON_TEXT_DETAIL' => 'Текст кнопки',
    'PROPERTY_BUTTON_HREF_DETAIL' => 'Ссылка',
    'PROPERTY_BUTTON_CODE_FORM' => 'Веб-форма',
    'cedit2_csection3' => 'Баннер',
    'PROPERTY_BANNER_IMG' => 'Картинка',
    'PROPERTY_BANNER_HEADER' => 'Заголовок',
    'PROPERTY_BANNER_TEXT' => 'Текст',
    'cedit2_csection1' => 'Преимущества продукта и услуги',
    'PROPERTY_BENEFITS_SLIDER_BGR' => 'Фон',
    'PROPERTY_BENEFITS_SLIDER_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS_SLIDER' => 'Преимущества',
    'cedit2_csection14' => 'Инфоврезка 1',
    'PROPERTY_QUOTE_HEADER_1' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT_1' => 'Текст инфоврезки',
    'cedit2_csection9' => 'Текстовый блок',
    'PROPERTY_TEXT_BLOCK_HEADER' => 'Заголовок',
    'PROPERTY_TEXT_BLOCK' => 'Текст',
    'cedit2_csection15' => 'Инфоврезка 2',
    'PROPERTY_QUOTE_HEADER_2' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT_2' => 'Текст инфоврезки',
    'cedit2_csection5' => 'Подробные преимущества',
    'PROPERTY_BENEFITS_ICONS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS_ICONS' => 'Преимущества',
    'cedit2_csection10' => 'Преимущества Новикома',
    'PROPERTY_BENEFITS_TILE_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS_TILE' => 'Преимущества',
    'cedit2_csection8' => 'Варианты банковского сопровождения',
    'PROPERTY_SUPPORT_OPTIONS_HEADER' => 'Заголовок',
    'PROPERTY_SUPPORT_OPTIONS' => 'Варианты',
    'cedit2_csection4' => 'Вкладки',
    'PROPERTY_TABS_HEADER' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
    'cedit2_csection16' => 'Инфоврезка 3',
    'PROPERTY_QUOTE_HEADER_3' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT_3' => 'Текст инфоврезки',
    'cedit2_csection12' => 'Меры финансирования',
    'PROPERTY_SHOW_FINANCING_MEASURES' => 'Показывать блок "Меры финансирования"',
  ),
  'Разделы|edit2' => 
  array (
    'SECTIONS' => 'Разделы',
  ),
));
    $helper->UserOptions()->saveElementGrid($iblockId, array (
  'views' => 
  array (
    'default' => 
    array (
      'columns' => 
      array (
        0 => 'NAME',
        1 => 'ACTIVE',
        2 => 'SORT',
        3 => 'TIMESTAMP_X',
        4 => 'ID',
        5 => 'PROPERTY_LIST_POSITION',
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
      'last_sort_by' => 'active',
      'last_sort_order' => 'asc',
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
    $helper->UserOptions()->saveSectionGrid($iblockId, array (
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
