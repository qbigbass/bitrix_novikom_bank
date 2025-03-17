<?php

namespace Sprint\Migration;


class Version20250306115540 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ЧК ОС";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('online_services', 'for_private_clients_ru');
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
  ),
  'Детальная страница|cedit1' => 
  array (
    'cedit1_csection1' => 'Преимущества',
    'PROPERTY_BENEFITS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS' => 'Преимущества',
    'cedit1_csection2' => 'Плашка',
    'PROPERTY_ADDITIONAL_INFO_IMG' => 'Изображение',
    'PROPERTY_ADDITIONAL_INFO_HEADING' => 'Заголовок',
    'PROPERTY_ADDITIONAL_INFO' => 'Инфоврезка',
    'cedit1_csection3' => 'Вкладки',
    'PROPERTY_TABS_HEADER' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
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
