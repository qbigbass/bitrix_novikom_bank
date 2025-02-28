<?php

namespace Sprint\Migration;


class Version20250228173536 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК Вклады";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('deposits', 'for_private_clients_ru');
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
  'Список|edit14' => 
  array (
    'PREVIEW_PICTURE' => 'Картинка',
  ),
  'Детальная страница|edit2' => 
  array (
    'PROPERTY_HEADER_TEMPLATE' => 'Шапка',
    'DETAIL_PICTURE' => 'Детальная картинка',
    'PROPERTY_BANNER_BACKGROUND' => 'Бэграунд баннера',
    'edit2_csection1' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Элементы',
    'edit2_csection2' => 'Плашка',
    'PROPERTY_QUOTE_IMG' => 'Картинка',
    'PROPERTY_QUOTE_HEADER' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT' => 'Текст',
    'edit2_csection4' => 'Вкладки',
    'PROPERTY_TABS_HEADER' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
    'edit2_csection5' => 'Этапы',
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS_TEMPLATE' => 'Шаблон',
    'PROPERTY_STEPS' => 'Этапы',
  ),
  'Разделы|cedit1' => 
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
