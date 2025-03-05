<?php

namespace Sprint\Migration;


class Version20250228114531 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "новая форма редактирования ИБ ФИ";

    protected $moduleVersion = "4.18.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('financial_institutions', 'financial_institutes');
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
    'PREVIEW_TEXT' => 'Описание',
    'DETAIL_PICTURE' => 'Изображение для большой плитки на разводящей странице и в баннере на главной',
    'PROPERTY_BANNER_BACKGROUND' => 'Бэграунд баннера',
  ),
  'Список|cedit1' => 
  array (
    'PREVIEW_PICTURE' => 'Изображение для маленькой плитки на разводящей странице',
    'PROPERTY_ICON_TILE' => 'Иконка для плитки на разводящей странице',
    'PROPERTY_LIST_POSITION' => 'Положение в списке',
  ),
  'Детальная страница|cedit2' => 
  array (
    'cedit2_csection1' => 'Шапка',
    'PROPERTY_TITLE_HEADER' => 'Заголовок в шапке',
    'PROPERTY_HEADER_TEMPLATE' => 'Шапка на детальной',
    'PROPERTY_HEADER_BG_PICTURE' => 'Часть пути до картинки для шапки',
    'PROPERTY_HEADER_COLOR_CLASS' => 'Классы для шапки',
    'PROPERTY_BENEFITS_TOP_HEADER' => 'Краткие условия',
    'PROPERTY_TYPE_BENEFITS_TOP_HEADER' => 'Стиль кратких условий',
    'PROPERTY_BENEFITS_TOP' => 'Преимущества',
    'PROPERTY_CNT_COL_BENEFITS_TOP' => 'Кол-во колонок для блока "Преимущества"',
    'PROPERTY_BUTTON_DETAIL' => 'Выводить кнопку на детальной',
    'PROPERTY_BUTTON_TEXT_DETAIL' => 'Текст кнопки на детальной',
    'PROPERTY_BUTTON_HREF_DETAIL' => 'Ссылка кнопки на детальной',
    'PROPERTY_BUTTON_CODE_FORM' => 'Код формы для кнопки',
    'cedit2_csection5' => 'Подробные преимущества',
    'PROPERTY_BENEFITS_ICONS_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS_ICONS' => 'Преимущества',
    'cedit2_csection2' => 'Баннер',
    'PROPERTY_BANNER_IMG' => 'Картинка баннера',
    'PROPERTY_BANNER_HEADER' => 'Заголовок баннера',
    'PROPERTY_BANNER_TEXT' => 'Текст баннера',
    'cedit2_csection4' => 'Преимущества продукта и услуги',
    'PROPERTY_BENEFITS_SLIDER_BGR' => 'Фон для блока',
    'PROPERTY_BENEFITS_SLIDER_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS_SLIDER' => 'Преимущества',
    'cedit2_csection6' => 'Преимущества Новикома',
    'PROPERTY_BENEFITS_TILE_HEADER' => 'Заголовок',
    'PROPERTY_BENEFITS_TILE' => 'Преимущества',
    'cedit2_csection16' => 'Инфоврезка 1',
    'PROPERTY_QUOTE_HEADER_1' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT_1' => 'Текст инфоврезки',
    'cedit2_csection3' => 'Текстовый блок',
    'PROPERTY_TEXT_BLOCK_HEADER' => 'Заголовок для блока',
    'PROPERTY_TEXT_BLOCK' => 'Текстовый блок',
    'cedit2_csection17' => 'Инфоврезка 2',
    'PROPERTY_QUOTE_HEADER_2' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT_2' => 'Текст инфоврезки',
    'cedit2_csection8' => 'Варианты банковского сопровождения',
    'PROPERTY_SUPPORT_OPTIONS_HEADER' => 'Заголовок',
    'PROPERTY_SUPPORT_OPTIONS' => 'Варианты',
    'cedit2_csection9' => 'Вкладки',
    'PROPERTY_TABS_HEADER' => 'Заголовок',
    'PROPERTY_TABS' => 'Вкладки',
    'cedit2_csection18' => 'Инфоврезка 3',
    'PROPERTY_QUOTE_HEADER_3' => 'Заголовок',
    'PROPERTY_QUOTE_TEXT_3' => 'Текст инфоврезки',
    'cedit2_csection10' => 'Контакты',
    'PROPERTY_CONTACTS' => 'Контакты',
    'PROPERTY_CLASS_BLOCK_CONTACTS' => 'Класс для цвета фона блока "Контакты"',
    'cedit2_csection11' => 'Блок "Объявления для клиентов"',
    'PROPERTY_SHOW_ANNOUNCEMENTS' => 'Показывать объявления для клиентов',
    'cedit2_csection12' => 'Блок "Другие услуги для бизнеса"',
    'PROPERTY_SHOW_CROSS_SALE' => 'Показывать блок "Другие услуги для бизнеса"',
    'cedit2_csection14' => 'Блок с информацией в виде аккордеона',
    'PROPERTY_INFORMATION_TITLE' => 'Заголовок к блоку информация',
    'PROPERTY_INFORMATION_LIST' => 'Информация',
    'cedit2_csection15' => 'Якорные ссылки',
    'PROPERTY_ANCHOR_LINKS' => 'Элементы для блока',
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
