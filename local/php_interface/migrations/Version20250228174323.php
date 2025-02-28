<?php

namespace Sprint\Migration;


class Version20250228174323 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК Услуги";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('for_private_clients_ru_sms_services', 'for_private_clients_ru');
        $helper->UserOptions()->saveElementForm($iblockId, array (
  'Параметры|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'ACTIVE_FROM' => 'Начало активности',
    'ACTIVE_TO' => 'Окончание активности',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'SORT' => 'Сортировка',
  ),
  'Детальная страница|cedit1' => 
  array (
    'DETAIL_TEXT' => 'Описание',
    'cedit1_csection1' => 'Текстовый блок 1',
    'PROPERTY_TEXT_BLOCK_HEADING_1' => 'Заголовок',
    'PROPERTY_TEXT_BLOCK_1' => 'Текст',
    'cedit1_csection2' => 'Преимущества услуги',
    'PROPERTY_BENEFITS_HEADING' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Преимущества',
    'cedit1_csection7' => 'Преимущества Новикома',
    'PROPERTY_OPPORTUNITY_HEADING' => 'Заголовок',
    'PROPERTY_OPPORTUNITY' => 'Преимущества',
    'cedit1_csection8' => 'Как подключить',
    'PROPERTY_INSTRUCTIONS_HEADING' => 'Заголовок',
    'PROPERTY_INSTRUCTIONS' => 'Инструкции',
    'cedit1_csection9' => 'Инфоврезка',
    'PROPERTY_ADDITIONAL_INFO_HEADER' => 'Заголовок',
    'PROPERTY_ADDITIONAL_INFO' => 'Инфоврезка',
    'cedit1_csection3' => 'Текстовый блок 2',
    'PROPERTY_TEXT_BLOCK_HEADING_2' => 'Заголовок',
    'PROPERTY_TEXT_BLOCK_2' => 'Текст',
    'cedit1_csection4' => 'Текстовый блок 3',
    'PROPERTY_HTML_HEADING' => 'Заголовок',
    'PROPERTY_HTML' => 'Текст',
    'cedit1_csection5' => 'Тарифы и документы',
    'PROPERTY_DOCUMENTS_HEADING' => 'Заголовок',
    'PROPERTY_DOCUMENTS' => 'Тарифы и документы',
    'cedit1_csection6' => 'Вкладки',
    'PROPERTY_TABS_HEADING' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
    'cedit1_csection10' => 'Этапы',
    'PROPERTY_STEPS_HEADER' => 'Заголовок',
    'PROPERTY_STEPS_TEMPLATE' => 'Шаблон',
    'PROPERTY_STEPS' => 'Этапы',
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
    ),
  ),
  'filters' => 
  array (
  ),
  'current_view' => 'default',
));

    }
}
