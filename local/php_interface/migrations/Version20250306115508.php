<?php

namespace Sprint\Migration;


class Version20250306115508 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК Карты";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('cards_detail_pages_ru', 'for_private_clients_ru');
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
    'PROPERTY_IS_BONUS' => 'Является бонусной программой',
    'edit1_csection1' => 'Кнопка',
    'PROPERTY_825' => 'Выводить кнопку',
    'PROPERTY_826' => 'Текст кнопки',
    'PROPERTY_827' => 'Ссылка кнопки',
    'edit1_csection3' => 'Краткие условия',
    'PROPERTY_SHORT_CONDITIONS' => 'Краткие условия',
    'DETAIL_TEXT' => 'Детальное описание',
  ),
  'Детальная страница карты|cedit1' => 
  array (
    'cedit1_csection11' => 'Шапка',
    'PROPERTY_CARD_HEADER_TEMPLATE' => 'Шапка',
    'PROPERTY_CARD_HEADER_IMAGE' => 'Детальная картинка',
    'PROPERTY_CARD_HEADER_BACKGROUND' => 'Бэграунд',
    'cedit1_csection9' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADING' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Преимущества',
    'cedit1_csection1' => 'Бонусные программы',
    'PROPERTY_BONUS_PROGRAMS_HEADING' => 'Заголовок блока бонусных программ',
    'PROPERTY_BONUS_PROGRAMS' => 'Бонусные программы',
    'cedit1_csection2' => 'Надежно и удобно',
    'PROPERTY_CONVENIENCES_HEADING' => 'Заголовок блока удобств',
    'PROPERTY_CONVENIENCES' => 'Удобства',
    'cedit1_csection4' => 'Баннер',
    'PROPERTY_BANNER_TAG' => 'Тег баннера',
    'PROPERTY_BANNER_HEADING' => 'Заголовок баннера',
    'PROPERTY_BANNER_IMG' => 'Изображение',
    'PROPERTY_BANNER_TEXT' => 'Текст',
    'PROPERTY_BANNER_LINK' => 'Ссылка на страницу с подробной информацией',
    'PROPERTY_BANNER_LINK_TEXT' => 'Текст ссылки',
    'PROPERTY_LINK_IS_BUTTON' => 'Выводить ссылку в виде кнопки',
    'cedit1_csection3' => 'Инфоврезка',
    'PROPERTY_ADDITIONAL_INFO_HEADER' => 'Заголовок',
    'PROPERTY_ADDITIONAL_INFO' => 'Инфоврезка',
    'cedit1_csection10' => 'Вкладки',
    'PROPERTY_TABS_HEADING' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
    'cedit1_csection5' => 'Скидки',
    'PROPERTY_DISCOUNTS_HEADING' => 'Заголовок блока скидок',
    'PROPERTY_DISCOUNTS' => 'Скидки',
    'cedit1_csection6' => 'Пошаговая инструкция',
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS' => 'Инструкция',
    'cedit1_csection7' => 'Как оформить карту',
    'PROPERTY_OPTIONS_BLOCK_HEADING' => 'Заголовок блока с вариантами',
    'PROPERTY_CARD_RECEIPT_OPTIONS' => 'Инструкции',
    'cedit1_csection8' => 'Спецпредложения',
    'PROPERTY_SPECIAL_OFFERS_HEADING' => 'Заголовок блока спецпредложений',
    'PROPERTY_SPECIAL_OFFERS' => 'Спецпредложения',
  ),
  'Детальная страница Бонусной программы|cedit2' => 
  array (
    'cedit2_csection10' => 'Анонс на продуктовой странице карты',
    'PROPERTY_ICON' => 'Иконка',
    'PREVIEW_TEXT' => 'Краткие условия бонусной программы',
    'cedit2_csection1' => 'Шапка',
    'PROPERTY_BONUS_HEADER_TEMPLATE' => 'Шапка',
    'PROPERTY_BONUS_HEADER_IMAGE' => 'Детальная картинка',
    'PROPERTY_BONUS_HEADER_BACKGROUND' => 'Бэграунд',
    'PROPERTY_BANNER_STYLE' => 'Стиль баннера',
    'cedit2_csection2' => 'Преимущества',
    'PROPERTY_BONUS_BENEFITS_HEADING' => 'Заголовок',
    'PROPERTY_BENEFITS_COL' => 'Количество колонок в преимуществах',
    'PROPERTY_BONUS_BENEFITS' => 'Преимущества',
    'PROPERTY_BENEFITS_INFO_BOX' => 'Инфоврезка в преимуществах',
    'cedit2_csection3' => 'Бонусный калькулятор',
    'PROPERTY_SHOW_BONUSES_CALC' => 'Выводить калькулятор бонусов',
    'cedit2_csection4' => 'Категории кешбэка',
    'PROPERTY_CASHBACK_CATEGORIES_HEADER' => 'Заголовок',
    'PROPERTY_CASHBACK_CATEGORIES' => 'Категории кешбэка',
    'cedit2_csection5' => 'Инструкция 1',
    'PROPERTY_INSTRUCTION_1_COLS' => 'Количество колонок',
    'PROPERTY_INSTRUCTION_1_HEADING' => 'Заголовок',
    'PROPERTY_INSTRUCTION_1' => 'Инструкция',
    'cedit2_csection6' => 'Вкладки',
    'PROPERTY_BONUS_TABS_HEADING' => 'Заголовок',
    'PROPERTY_BONUS_TABS' => 'Вкладки',
    'cedit2_csection7' => 'Инструкция 2',
    'PROPERTY_INSTRUCTION_2_COLS' => 'Количество колонок',
    'PROPERTY_INSTRUCTION_2_HEADING' => 'Заголовок',
    'PROPERTY_INSTRUCTION_2' => 'Инструкция',
    'cedit2_csection8' => 'Инфоврезка',
    'PROPERTY_INFO_BOX_HEADER' => 'Заголовок',
    'PROPERTY_INFO_BOX' => 'Инфоврезка',
    'cedit2_csection9' => 'Инструкция 3',
    'PROPERTY_INSTRUCTION_3_COLS' => 'Количество колонок',
    'PROPERTY_INSTRUCTION_3_HEADING' => 'Заголовок',
    'PROPERTY_INSTRUCTION_3' => 'Инструкция',
  ),
  'Разделы|edit2' => 
  array (
    'SECTIONS' => 'Разделы',
  ),
));
        $helper->UserOptions()->saveSectionForm($iblockId, array (
  'Раздел|edit1' => 
  array (
    'USER_FIELDS_ADD' => 'Добавить пользовательское свойство',
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Раздел активен',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'SORT' => 'Сортировка',
    'UF_BANNER_STYLE' => 'Стиль баннера',
    'PICTURE' => 'Изображение на витрине',
    'edit1_csection1' => 'Кнопка в списке и на детальной',
    'UF_SHOW_BUTTON' => 'Выводить кнопку',
    'UF_BUTTON_TEXT' => 'Текст кнопки',
    'UF_BUTTON_LINK' => 'Ссылка',
    'UF_BUTTON_CODE_FORM' => 'Веб-форма',
    'UF_SHORT_CONDITIONS' => 'Краткие условия',
    'UF_CARD_SHORT_CONDITIONS' => 'Краткие условия',
  ),
));
    $helper->UserOptions()->saveElementGrid($iblockId, array (
  'views' => 
  array (
    'default' => 
    array (
      'name' => NULL,
      'columns' => 
      array (
        0 => 'NAME',
        1 => 'ACTIVE',
        2 => 'SORT',
        3 => 'CODE',
        4 => 'TIMESTAMP_X',
        5 => 'ID',
      ),
      'sort_by' => NULL,
      'sort_order' => NULL,
      'page_size' => NULL,
      'saved_filter' => NULL,
      'custom_names' => 
      array (
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
    ),
  ),
  'filters' => 
  array (
  ),
  'current_view' => 'default',
));

    }
}
