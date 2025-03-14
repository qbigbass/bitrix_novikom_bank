<?php

namespace Sprint\Migration;


class Version20250307120028 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Свойство и форма редактирования Дополнительно-Главные разделы баннеров";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('main_banners', 'additional');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Видео для слайдера',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'FILE_VIDEO',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'F',
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
  'HINT' => 'Имеет приоритет над полями "бэкграунд" и "иконка"',
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
            $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'ACTIVE_FROM' => 'Начало активности',
    'ACTIVE_TO' => 'Окончание активности',
    'SORT' => 'Сортировка',
    'NAME' => 'Заголовок в меню слайдера',
    'DETAIL_TEXT' => 'Заголовок слайда',
    'PREVIEW_TEXT' => 'Текст на слайде',
    'PROPERTY_FILE_VIDEO' => 'Видео для слайдера',
    'PREVIEW_PICTURE' => 'Бэграунд (имеет приоритет над иконкой)',
    'DETAIL_PICTURE' => 'Иконка',
    'PROPERTY_BUTTON_TEXT' => 'Текст на кнопке',
    'PROPERTY_BUTTON_LINK' => 'Ссылка на кнопке',
    'PROPERTY_BUTTON_CODE_FORM' => 'Веб-формы',
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
