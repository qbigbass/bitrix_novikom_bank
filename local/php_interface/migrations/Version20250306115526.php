<?php

namespace Sprint\Migration;


class Version20250306115526 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК Ипотека";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('mortgage', 'for_private_clients_ru');
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
  'Список|edit5' => 
  array (
    'PREVIEW_PICTURE' => 'Картинка',
  ),
  'Детальная страница|edit6' => 
  array (
    'PROPERTY_HEADER_TEMPLATE' => 'Шапка',
    'DETAIL_PICTURE' => 'Картинка',
    'PROPERTY_BANNER_BACKGROUND' => 'Бэграунд баннера',
    'edit6_csection1' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Элементы',
    'edit6_csection2' => 'Инфоврезка',
    'PROPERTY_QUOTE_HEADER' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT' => 'Текст',
    'edit6_csection3' => 'Баннер',
    'PROPERTY_TEXT_BLOCK_IMAGE' => 'Картинка',
    'PROPERTY_TEXT_BLOCK_TAG' => 'Тэг',
    'PROPERTY_TEXT_BLOCK_HEADER' => 'Заголовок',
    'PROPERTY_TEXT_BLOCK' => 'Текстовый блок',
    'PROPERTY_TEXT_BLOCK_BUTTON' => 'Текст кнопки',
    'PROPERTY_TEXT_BLOCK_BUTTON_LINK' => 'Ссылка',
    'edit6_csection5' => 'Этапы',
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS_TEMPLATE' => 'Шаблон',
    'PROPERTY_STEPS' => 'Этапы',
    'edit6_csection4' => 'Вкладки',
    'PROPERTY_TABS_HEADER' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
  ),
  'Разделы|edit2' => 
  array (
    'SECTIONS' => 'Разделы',
  ),
));
        $helper->UserOptions()->saveSectionForm($iblockId, array (
  'Раздел|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Раздел активен',
    'IBLOCK_SECTION_ID' => 'Родительский раздел',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'PICTURE' => 'Изображение',
    'DESCRIPTION' => 'Описание',
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
