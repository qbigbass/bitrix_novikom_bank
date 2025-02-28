<?php

namespace Sprint\Migration;


class Version20250228173601 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК Кредиты";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('loans', 'for_private_clients_ru');
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
    'edit1_csection1' => 'Кнопка',
    'PROPERTY_BUTTON_DETAIL' => 'Выводить кнопку',
    'PROPERTY_BUTTON_TEXT_DETAIL' => 'Текст кнопки',
    'PROPERTY_BUTTON_HREF_DETAIL' => 'Ссылка кнопки',
    'PREVIEW_TEXT' => 'Описание',
  ),
  'Список|cedit1' => 
  array (
    'PREVIEW_PICTURE' => 'Картинка',
  ),
  'Детальная страница|cedit2' => 
  array (
    'PROPERTY_HEADER_TEMPLATE' => 'Шапка',
    'DETAIL_PICTURE' => 'Картинка',
    'PROPERTY_BANNER_BACKGROUND' => 'Бэграунд для баннера',
    'cedit2_csection3' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Элементы',
    'cedit2_csection4' => 'Сноска',
    'PROPERTY_QUOTE_HEADER' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT' => 'Текст',
    'cedit2_csection5' => 'Баннер',
    'PROPERTY_TEXT_BLOCK_IMAGE' => 'Картинка',
    'PROPERTY_TEXT_BLOCK_TAG' => 'Тэг',
    'PROPERTY_TEXT_BLOCK_HEADER' => 'Заголовок',
    'PROPERTY_TEXT_BLOCK' => 'Текстовый блок',
    'PROPERTY_TEXT_BLOCK_BUTTON' => 'Текст кнопки',
    'PROPERTY_TEXT_BLOCK_BUTTON_LINK' => 'Ссылка',
    'cedit2_csection1' => 'Вкладки',
    'PROPERTY_TABS_HEADER' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
    'cedit2_csection2' => 'Этапы',
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS_TEMPLATE' => 'Шаблон',
    'PROPERTY_STEPS' => 'Этапы',
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
      'last_sort_by' => 'sort',
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
