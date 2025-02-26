<?php

namespace Sprint\Migration;


class Version20250226172240 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Форма редактирования ИБ КК";

    protected $moduleVersion = "4.18.1";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('corporate_clients', 'for_corporate_clients_ru');
        $helper->UserOptions()->saveElementForm($iblockId, array(
            'Параметры|edit1' =>
                array(
                    'ID' => 'ID',
                    'DATE_CREATE' => 'Создан',
                    'TIMESTAMP_X' => 'Изменен',
                    'ACTIVE' => 'Активность',
                    'NAME' => 'Название',
                    'CODE' => 'Символьный код',
                    'PROPERTY_REF_IBLOCK_MSB' => 'Вывод контента в одноименном разделе МСБ',
                    'SORT' => 'Сортировка',
                    'PREVIEW_TEXT' => 'Описание',
                ),
            'Список|cedit1' =>
                array(
                    'PREVIEW_PICTURE' => 'Иконка',
                    'PROPERTY_LIST_POSITION' => 'Положение в списке',
                ),
            'Детальная страница|cedit2' =>
                array(
                    'cedit2_csection2' => 'Шапка',
                    'PROPERTY_HEADER_TEMPLATE' => 'Шапка на детальной',
                    'PROPERTY_HEADER_BG_PICTURE' => 'Часть пути до картинки для шапки',
                    'PROPERTY_HEADER_COLOR_CLASS' => 'Классы для шапки',
                    'PROPERTY_BENEFITS_TOP_HEADER' => 'Бенефиты в шапке (сверху)',
                    'PROPERTY_TYPE_BENEFITS_TOP_HEADER' => 'Тип бенефитов сверху в шапке',
                    'PROPERTY_BENEFITS_TOP' => 'Бенефиты в шапке (снизу)',
                    'PROPERTY_CNT_COL_BENEFITS_TOP' => 'Кол-во колонок для бенефитов снизу в шапке',
                    'PROPERTY_BUTTON_DETAIL' => 'Выводить кнопку',
                    'PROPERTY_BUTTON_TEXT_DETAIL' => 'Текст кнопки',
                    'PROPERTY_CLASS_BUTTON_TEXT_DETAIL' => 'Класс для цвета кнопки в шапке',
                    'PROPERTY_BUTTON_HREF_DETAIL' => 'Ссылка',
                    'PROPERTY_BUTTON_CODE_FORM' => 'Код формы для кнопки',
                    'DETAIL_PICTURE' => 'Детальная картинка',
                    'PROPERTY_BANNER_BACKGROUND' => 'Бэграунд баннера',
                    'cedit2_csection3' => 'Баннер',
                    'PROPERTY_BANNER_IMG' => 'Картинка',
                    'PROPERTY_BANNER_HEADER' => 'Заголовок',
                    'PROPERTY_BANNER_TEXT' => 'Текст',
                    'cedit2_csection1' => 'Преимущества продукта и услуги',
                    'PROPERTY_BENEFITS_SLIDER_BGR' => 'Фон',
                    'PROPERTY_BENEFITS_SLIDER_HEADER' => 'Заголовок',
                    'PROPERTY_BENEFITS_SLIDER' => 'Преимущества',
                    'cedit2_csection14' => 'Инфоврезка 1',
                    'PROPERTY_QUOTE_HEADER_1' => 'Заголовок',
                    'PROPERTY_QUOTE_TEXT_1' => 'Текст инфоврезки',
                    'cedit2_csection9' => 'Текстовый блок',
                    'PROPERTY_TEXT_BLOCK_HEADER' => 'Заголовок',
                    'PROPERTY_TEXT_BLOCK' => 'Текст',
                    'cedit2_csection15' => 'Инфоврезка 2',
                    'PROPERTY_QUOTE_HEADER_2' => 'Заголовок',
                    'PROPERTY_QUOTE_TEXT_2' => 'Текст инфоврезки',
                    'cedit2_csection5' => 'Подробные преимущества',
                    'PROPERTY_BENEFITS_ICONS_HEADER' => 'Заголовок',
                    'PROPERTY_BENEFITS_ICONS' => 'Преимущества',
                    'cedit2_csection10' => 'Преимущества Новикома',
                    'PROPERTY_BENEFITS_TILE_HEADER' => 'Заголовок',
                    'PROPERTY_BENEFITS_TILE' => 'Преимущества',
                    'cedit2_csection8' => 'Варианты банковского сопровождения',
                    'PROPERTY_SUPPORT_OPTIONS_HEADER' => 'Заголовок',
                    'PROPERTY_SUPPORT_OPTIONS' => 'Варианты',
                    'cedit2_csection4' => 'Вкладки',
                    'PROPERTY_TABS_HEADER' => 'Заголовок',
                    'PROPERTY_TABS' => 'Вкладки',
                    'cedit2_csection16' => 'Инфоврезка 3',
                    'PROPERTY_QUOTE_HEADER_3' => 'Заголовок',
                    'PROPERTY_QUOTE_TEXT_3' => 'Текст инфоврезки',
                    'cedit2_csection12' => 'Меры финансирования',
                    'PROPERTY_SHOW_FINANCING_MEASURES' => 'Показывать блок "Меры финансирования"',
                    'cedit2_csection6' => 'Контакты',
                    'PROPERTY_CONTACTS_HEADER' => 'Заголовок блока "Контакты"',
                    'PROPERTY_CONTACTS' => 'Контакты',
                    'PROPERTY_CLASS_BLOCK_CONTACTS' => 'Класс для цвета фона блока "Контакты"',
                    'cedit2_csection13' => 'Блок "Объявления для клиентов"',
                    'PROPERTY_SHOW_ANNOUNCEMENTS' => 'Показывать объявления для клиентов',
                    'cedit2_csection11' => 'Блок "Другие услуги"',
                    'PROPERTY_SHOW_CROSS_SALE' => 'Показывать блок "Другие услуги"',
                ),
            'Разделы|edit2' =>
                array(
                    'SECTIONS' => 'Разделы',
                ),
        ));
        $helper->UserOptions()->saveElementGrid($iblockId, array(
            'views' =>
                array(
                    'default' =>
                        array(
                            'columns' =>
                                array(
                                    0 => 'NAME',
                                    1 => 'ACTIVE',
                                    2 => 'SORT',
                                    3 => 'TIMESTAMP_X',
                                    4 => 'ID',
                                    5 => 'PROPERTY_LIST_POSITION',
                                ),
                            'columns_sizes' =>
                                array(
                                    'expand' => 1,
                                    'columns' =>
                                        array(),
                                ),
                            'sticked_columns' =>
                                array(),
                            'last_sort_by' => 'sort',
                            'last_sort_order' => 'asc',
                            'custom_names' =>
                                array(),
                        ),
                ),
            'filters' =>
                array(),
            'current_view' => 'default',
        ));
        $helper->UserOptions()->saveSectionGrid($iblockId, array(
            'views' =>
                array(
                    'default' =>
                        array(
                            'columns' =>
                                array(
                                    0 => '',
                                ),
                            'columns_sizes' =>
                                array(
                                    'expand' => 1,
                                    'columns' =>
                                        array(),
                                ),
                            'sticked_columns' =>
                                array(),
                            'custom_names' =>
                                array(),
                        ),
                ),
            'filters' =>
                array(),
            'current_view' => 'default',
        ));
    }
}
