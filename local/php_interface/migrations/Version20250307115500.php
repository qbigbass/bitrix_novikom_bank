<?php

namespace Sprint\Migration;


class Version20250307115500 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Новое свойство и форма редактирования Дополнительно-Связанные услуги";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('cross_sale', 'additional');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Условия ',
  'ACTIVE' => 'Y',
  'SORT' => '201',
  'CODE' => 'CONDITION_HTML',
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
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' => 
  array (
    'ID' => 'ID',
    'ACTIVE' => 'Активность',
    'ACTIVE_FROM' => 'Начало активности',
    'ACTIVE_TO' => 'Окончание активности',
    'NAME' => 'Название',
    'SORT' => 'Сортировка',
    'IBLOCK_ELEMENT_PROP_VALUE' => 'Значения свойств',
    'PREVIEW_PICTURE' => 'Картинка для анонса',
    'PROPERTY_LINE_COLOR' => 'Цвет полоски',
    'PROPERTY_TAG' => 'Тег',
    'PROPERTY_CONDITION_HTML' => 'Условия',
    'PREVIEW_TEXT' => 'Описание',
    'PROPERTY_BTN_TEXT' => 'Текст кнопки',
    'PROPERTY_LINK' => 'Ссылка',
    'PROPERTY_BTN_TYPE' => 'Вид отображения ссылки',
    'PROPERTY_BUTTON_CODE_FORM' => 'Веб-форма',
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
      'last_sort_by' => 'timestamp_x',
      'last_sort_order' => 'desc',
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
