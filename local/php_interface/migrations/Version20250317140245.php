<?php

namespace Sprint\Migration;


class Version20250317140245 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Доработки ИБ Якорные ссылки";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('anchor_links', 'additional');
        $helper->Iblock()->saveProperty($iblockId, array (
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
  'HINT' => '#ACCORDION#',
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
    'ACTIVE' => 'Активность',
    'NAME' => 'Название',
    'PROPERTY_TITLE_MENU' => 'Заголовок для меню',
    'CODE' => 'Символьный код',
    'SORT' => 'Сортировка',
    'PROPERTY_CLASS_BLOCK' => 'Класс для блока',
    'PROPERTY_PATH_IMG_BLOCK' => 'Путь до изображения для блока',
    'PREVIEW_TEXT' => 'Описание для анонса',
    'DETAIL_TEXT' => 'Детальное описание',
  ),
  'Калькулятор|cedit8' => 
  array (
    'PROPERTY_CALCULATOR' => 'Калькулятор',
  ),
  'Иконки с описанием|cedit7' => 
  array (
    'PROPERTY_SHOW_TWO_ICONS_IN_ROW' => 'Выводить по 2 иконки в строку',
    'PROPERTY_ICONS_WITH_DESCRIPTION' => 'Иконки с описанием',
  ),
  'Блок HTML|cedit15' => 
  array (
    'PROPERTY_HTML' => 'Блок HTML',
  ),
  'Этапы|cedit9' => 
  array (
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS' => 'Этапы',
  ),
  'Инфо врезка|cedit3' => 
  array (
    'PROPERTY_ICON_SHORT_INFO' => 'Альтернативная иконка',
    'PROPERTY_SHORT_INFO' => 'Инфо врезка',
    'PROPERTY_SHORT_INFO_CLASS_BLOCK' => 'Класс для цвета для блока "Инфо врезка"',
    'PROPERTY_SHORT_INFO_CLASS_LINE' => 'Класс для цвета пунктирной линии для блока "Инфо врезка"',
  ),
  'Сноски|cedit4' => 
  array (
    'PROPERTY_QUOTES' => 'Сноски',
  ),
  'Вопросы и ответы|cedit5' => 
  array (
    'PROPERTY_QUESTIONS' => 'Вопросы и ответы',
  ),
  'Документы|cedit6' => 
  array (
    'PROPERTY_DOCUMENTS' => 'Документы',
  ),
  'Преимущества|cedit12' => 
  array (
    'cedit12_csection2' => 'Преимущества тип "Иконка и заголовок"',
    'PROPERTY_BENEFITS' => 'Преимущества (Иконка и заголовок)',
    'cedit12_csection1' => 'Преимущества тип "Слайдер"',
    'PROPERTY_BENEFITS_SLIDER' => 'Преимущества в виде слайдера',
    'PROPERTY_BENEFITS_SLIDER_CLASS_CARDS' => 'Класс для цвета карточек преимуществ (Слайдер)',
  ),
  'Раскрывающийся список|cedit14' => 
  array (
    'PROPERTY_ACCORDION' => 'Раскрывающийся список',
  ),
  'Стратегии|cedit10' => 
  array (
    'PROPERTY_STRATEGIES' => 'Стратегии',
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
    $helper->UserOptions()->saveSectionGrid($iblockId, array (
  'views' => 
  array (
    'default' => 
    array (
      'columns' => 
      array (
        0 => 'NAME',
        1 => 'ACTIVE',
        2 => 'SORT',
        3 => 'CODE',
        4 => 'TIMESTAMP_X',
        5 => 'ID',
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
