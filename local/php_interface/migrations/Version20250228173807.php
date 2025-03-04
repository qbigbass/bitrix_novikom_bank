<?php

namespace Sprint\Migration;


class Version20250228173807 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК Спецпредложения";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('special_offers_ru', 'for_private_clients_ru');
        $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'PROPERTY_PIN' => 'Закрепить',
    'PROPERTY_PUBLICATION_DATE' => 'Дата публикации',
    'PROPERTY_END_DATE' => 'Дата окончания',
    'PROPERTY_TAG' => 'Тэг',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'SORT' => 'Сортировка',
    'PREVIEW_PICTURE' => 'Картинка для анонса',
    'PREVIEW_TEXT' => 'Описание для анонса',
  ),
  'Значения свойств|cedit1' => 
  array (
    'cedit1_csection1' => 'Кнопка',
    'PROPERTY_BUTTON_DETAIL' => 'Выводить кнопку',
    'PROPERTY_BUTTON_HREF_DETAIL' => 'Ссылка',
    'PROPERTY_BUTTON_TEXT_DETAIL' => 'Текст',
    'cedit1_csection2' => 'Этапы',
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS_TEMPLATE' => 'Шаблон',
    'PROPERTY_STEPS' => 'Этапы',
    'cedit1_csection3' => 'Избранные категории кешбэка',
    'PROPERTY_SELECTED_CAT_HEADER' => 'Заголовок',
    'PROPERTY_SELECTED_CAT' => 'Категории кешбэка',
    'cedit1_csection4' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Элементы',
    'cedit1_csection5' => 'Текстовый блок',
    'PROPERTY_TEXT_BLOCK_HEADER' => 'Заголовок',
    'PROPERTY_TEXT_BLOCK' => 'Текстовый блок',
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
    'IBLOCK_SECTION_ID' => 'Родительский раздел',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'UF_TAG' => 'Тег раздела',
    'UF_SHOW_SPECIAL_SECTION' => 'Показывать "Спецпредложения" в разделе',
    'UF_SHOW_SPECIAL_DETAIL' => 'Показывать "Спецпредложения" на детальной странице',
  ),
  'SEO|edit5' => 
  array (
    'IPROPERTY_TEMPLATES_SECTION' => 'Настройки для разделов',
    'IPROPERTY_TEMPLATES_SECTION_META_TITLE' => 'Шаблон META TITLE',
    'IPROPERTY_TEMPLATES_SECTION_META_KEYWORDS' => 'Шаблон META KEYWORDS',
    'IPROPERTY_TEMPLATES_SECTION_META_DESCRIPTION' => 'Шаблон META DESCRIPTION',
    'IPROPERTY_TEMPLATES_SECTION_PAGE_TITLE' => 'Заголовок раздела',
    'IPROPERTY_TEMPLATES_ELEMENT' => 'Настройки для элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_META_TITLE' => 'Шаблон META TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS' => 'Шаблон META KEYWORDS',
    'IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION' => 'Шаблон META DESCRIPTION',
    'IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE' => 'Заголовок товара',
    'IPROPERTY_TEMPLATES_SECTIONS_PICTURE' => 'Настройки для изображений разделов',
    'IPROPERTY_TEMPLATES_SECTION_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_SECTION_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_SECTION_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'IPROPERTY_TEMPLATES_SECTIONS_DETAIL_PICTURE' => 'Настройки для детальных картинок разделов',
    'IPROPERTY_TEMPLATES_SECTION_DETAIL_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_SECTION_DETAIL_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_SECTION_DETAIL_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE' => 'Настройки для картинок анонса элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE' => 'Настройки для детальных картинок элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'IPROPERTY_TEMPLATES_MANAGEMENT' => 'Управление',
    'IPROPERTY_CLEAR_VALUES' => 'Очистить кеш вычисленных значений',
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
