<?php

namespace Sprint\Migration;

use Bitrix\Iblock\IblockTable;

class Version20250212120113 extends Version
{
    /** @var string ID типа инфоблока для удаления */
    private const IB_TYPE_ID = 'services_ru';
    protected $author = "sergheysmetanin@gmail.com";
    protected $description = "DNVKBSITE-172";
    protected $moduleVersion = "4.15.1";
    protected $helper;
    protected int $iblockId;

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up(): void
    {
        $this->helper = $this->getHelperManager();
        $this->addIb();
        /**
         * Добавляем свойства из ИБ "SMS информирование" и ИБ "Биометрическая идентификация"
         * Не копируем свойства из ИБ "Прочие сервисы"(там только табы(TAB). Оно уже есть в ИБ "SMS информирование")
         * Мобильное приложение и интернет банк переносить не надо, она переедет в раздел Онлайн-сервисы
         */
        $this->addSmsProps();
        $this->addBiometricProps();

        $this->addElements();

        $this->deleteOldData();
    }

    /**
     * Добавляем ИБ, его поля и права
     *
     * @return void
     */
    private function addIb(): void
    {
        $this->iblockId = $this->helper->Iblock()->saveIblock(array(
            'IBLOCK_TYPE_ID' => 'for_private_clients_ru',
            'LID' =>
                array(
                    0 => 's1',
                ),
            'CODE' => 'for_private_clients_ru_sms_services',
            'API_CODE' => 'ForPrivateServicesApi',
            'REST_ON' => 'N',
            'NAME' => 'Услуги',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/services/#ELEMENT_CODE#/',
            'SECTION_PAGE_URL' => '',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => null,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => null,
            'RSS_FILE_DAYS' => null,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => null,
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'N',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => 'C',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'Y',
            'PROPERTY_INDEX' => 'N',
            'VERSION' => '1',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => null,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Разделы',
            'SECTION_NAME' => 'Раздел',
            'ELEMENTS_NAME' => 'Элементы',
            'ELEMENT_NAME' => 'Элемент',
            'EXTERNAL_ID' => null,
            'LANG_DIR' => '/',
            'IPROPERTY_TEMPLATES' =>
                array(),
            'ELEMENT_ADD' => 'Добавить элемент',
            'ELEMENT_EDIT' => 'Изменить элемент',
            'ELEMENT_DELETE' => 'Удалить элемент',
            'SECTION_ADD' => 'Добавить раздел',
            'SECTION_EDIT' => 'Изменить раздел',
            'SECTION_DELETE' => 'Удалить раздел',
        ));
        $this->helper->Iblock()->saveIblockFields($this->iblockId, array(
            'IBLOCK_SECTION' =>
                array(
                    'NAME' => 'Привязка к разделам',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'KEEP_IBLOCK_SECTION_ID' => 'N',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'ACTIVE' =>
                array(
                    'NAME' => 'Активность',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'Y',
                    'VISIBLE' => 'Y',
                ),
            'ACTIVE_FROM' =>
                array(
                    'NAME' => 'Начало активности',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'ACTIVE_TO' =>
                array(
                    'NAME' => 'Окончание активности',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SORT' =>
                array(
                    'NAME' => 'Сортировка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '500',
                    'VISIBLE' => 'Y',
                ),
            'NAME' =>
                array(
                    'NAME' => 'Название',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'PREVIEW_PICTURE' =>
                array(
                    'NAME' => 'Картинка для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'FROM_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N',
                            'DELETE_WITH_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'PREVIEW_TEXT_TYPE' =>
                array(
                    'NAME' => 'Тип описания для анонса',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                    'VISIBLE' => 'Y',
                ),
            'PREVIEW_TEXT' =>
                array(
                    'NAME' => 'Описание для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'DETAIL_PICTURE' =>
                array(
                    'NAME' => 'Детальная картинка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'DETAIL_TEXT_TYPE' =>
                array(
                    'NAME' => 'Тип детального описания',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                    'VISIBLE' => 'Y',
                ),
            'DETAIL_TEXT' =>
                array(
                    'NAME' => 'Детальное описание',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'XML_ID' =>
                array(
                    'NAME' => 'Внешний код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'CODE' =>
                array(
                    'NAME' => 'Символьный код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' =>
                        array(
                            'UNIQUE' => 'Y',
                            'TRANSLITERATION' => 'Y',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '-',
                            'TRANS_OTHER' => '-',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'N',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'TAGS' =>
                array(
                    'NAME' => 'Теги',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_NAME' =>
                array(
                    'NAME' => 'Название',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_PICTURE' =>
                array(
                    'NAME' => 'Картинка для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'FROM_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N',
                            'DELETE_WITH_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'SECTION_DESCRIPTION_TYPE' =>
                array(
                    'NAME' => 'Тип описания',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_DESCRIPTION' =>
                array(
                    'NAME' => 'Описание',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_DETAIL_PICTURE' =>
                array(
                    'NAME' => 'Детальная картинка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'SECTION_XML_ID' =>
                array(
                    'NAME' => 'Внешний код',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_CODE' =>
                array(
                    'NAME' => 'Символьный код',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'UNIQUE' => 'N',
                            'TRANSLITERATION' => 'N',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '-',
                            'TRANS_OTHER' => '-',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'N',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'LOG_SECTION_ADD' =>
                array(
                    'NAME' => 'LOG_SECTION_ADD',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => null,
                    'VISIBLE' => 'Y',
                ),
            'LOG_SECTION_EDIT' =>
                array(
                    'NAME' => 'LOG_SECTION_EDIT',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => null,
                    'VISIBLE' => 'Y',
                ),
            'LOG_SECTION_DELETE' =>
                array(
                    'NAME' => 'LOG_SECTION_DELETE',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => null,
                    'VISIBLE' => 'Y',
                ),
            'LOG_ELEMENT_ADD' =>
                array(
                    'NAME' => 'LOG_ELEMENT_ADD',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => null,
                    'VISIBLE' => 'Y',
                ),
            'LOG_ELEMENT_EDIT' =>
                array(
                    'NAME' => 'LOG_ELEMENT_EDIT',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => null,
                    'VISIBLE' => 'Y',
                ),
            'LOG_ELEMENT_DELETE' =>
                array(
                    'NAME' => 'LOG_ELEMENT_DELETE',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => null,
                    'VISIBLE' => 'Y',
                ),
        ));
        /*
         * Добавляем сво-ва ИБ из ИБ "SMS информирование" и "Биометрическая идентификация"
         * Не учитываем "Прочие сервисы", т.к там только Табы(TABS). Оно есть в ИБ "SMS информирование"
         * Страницу Мобильное приложение и интернет банк переносить не надо, она переедет в раздел Онлайн-сервисы
         */
        $this->helper->Iblock()->saveGroupPermissions($this->iblockId, array(
            'administrators' => 'X',
            'everyone' => 'R',
        ));
    }

    /**
     * Добавляем свойства из ИБ "SMS информирование"
     *
     * @return void
     */
    private function addSmsProps(): void
    {
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Возможности',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'OPPORTUNITY',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg, webp, svg',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'additional:benefits',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EAutocomplete',
            'USER_TYPE_SETTINGS' =>
                array(
                    'VIEW' => 'E',
                    'SHOW_ADD' => 'N',
                    'MAX_WIDTH' => 0,
                    'MIN_HEIGHT' => 24,
                    'MAX_HEIGHT' => 1000,
                    'BAN_SYM' => ',;',
                    'REP_SYM' => ' ',
                    'OTHER_REP_SYM' => '',
                    'IBLOCK_MESS' => 'N',
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Как подключить',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'INSTRUCTIONS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'additional:instructions_ru',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EAutocomplete',
            'USER_TYPE_SETTINGS' =>
                array(
                    'VIEW' => 'E',
                    'SHOW_ADD' => 'N',
                    'MAX_WIDTH' => 0,
                    'MIN_HEIGHT' => 24,
                    'MAX_HEIGHT' => 1000,
                    'BAN_SYM' => ',;',
                    'REP_SYM' => ' ',
                    'OTHER_REP_SYM' => '',
                    'IBLOCK_MESS' => 'N',
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Инфо-врезка',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'ADDITIONAL_INFO',
            'DEFAULT_VALUE' =>
                array(
                    'TEXT' => '',
                    'TYPE' => 'HTML',
                ),
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
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
                array(
                    'height' => 200,
                ),
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Табы',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'TABS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'additional:tabs',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EAutocomplete',
            'USER_TYPE_SETTINGS' =>
                array(
                    'VIEW' => 'E',
                    'SHOW_ADD' => 'N',
                    'MAX_WIDTH' => 0,
                    'MIN_HEIGHT' => 24,
                    'MAX_HEIGHT' => 1000,
                    'BAN_SYM' => ',;',
                    'REP_SYM' => ' ',
                    'OTHER_REP_SYM' => '',
                    'IBLOCK_MESS' => 'N',
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Преимущества',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'BENEFITS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'additional:benefits',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EAutocomplete',
            'USER_TYPE_SETTINGS' =>
                array(
                    'VIEW' => 'E',
                    'SHOW_ADD' => 'N',
                    'MAX_WIDTH' => 0,
                    'MIN_HEIGHT' => 24,
                    'MAX_HEIGHT' => 1000,
                    'BAN_SYM' => ',;',
                    'REP_SYM' => ' ',
                    'OTHER_REP_SYM' => '',
                    'IBLOCK_MESS' => 'N',
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
    }

    /**
     * Добавляем свойства из ИБ "Биометрическая идентификация"
     * Кроме св-ва BENEFITS. Оно такое-же как в ИБ "SMS информирование"
     * Поменял тип свойств 'Блок HTML' со строки на HTML(по ТЗ)
     *
     * @return void
     */
    private function addBiometricProps(): void
    {
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Пошаговая инструкция',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'STEPS',
            'DEFAULT_VALUE' =>
                array(
                    'TYPE' => 'TEXT',
                    'TEXT' => '',
                ),
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
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
                array(
                    'height' => 200,
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Тарифы и документы',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'DOCUMENTS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'internal_regulations_and_documents_ru:documents',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EAutocomplete',
            'USER_TYPE_SETTINGS' =>
                array(
                    'VIEW' => 'E',
                    'SHOW_ADD' => 'N',
                    'MAX_WIDTH' => 0,
                    'MIN_HEIGHT' => 24,
                    'MAX_HEIGHT' => 1000,
                    'BAN_SYM' => ',;',
                    'REP_SYM' => ' ',
                    'OTHER_REP_SYM' => '',
                    'IBLOCK_MESS' => 'N',
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок блока с шагами',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'STEPS_HEADING',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок бенефитов',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'BENEFITS_HEADING',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок документов',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'DOCUMENTS_HEADING',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Текстовый блок 1',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'TEXT_BLOCK_1',
            'DEFAULT_VALUE' =>
                array(
                    'TEXT' => '',
                    'TYPE' => 'HTML',
                ),
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
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
                array(
                    'height' => 200,
                ),
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок текстового блока 1',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'TEXT_BLOCK_HEADING_1',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Текстовый блок 2',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'TEXT_BLOCK_2',
            'DEFAULT_VALUE' =>
                array(
                    'TEXT' => '',
                    'TYPE' => 'HTML',
                ),
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
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
                array(
                    'height' => 200,
                ),
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок текстового блока 1',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'TEXT_BLOCK_HEADING_2',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Блок HTML',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'HTML',
            'DEFAULT_VALUE' =>
                array(
                    'TEXT' => '',
                    'TYPE' => 'HTML',
                ),
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '30',
            'COL_COUNT' => '80',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
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
                array(
                    'height' => 200,
                ),
            'HINT' => '',
            'FEATURES' =>
                array(
                    0 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                    1 =>
                        array(
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ),
                ),
            'SMART_FILTER' => null,
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => '',
        ));
    }

    /**
     * Добавляем элементы ИБ
     *
     * @return void
     */
    private function addElements(): void
    {
        $this->getExchangeManager()
            ->IblockElementsImport()
            ->setExchangeResource('iblock_elements1.xml')
            ->setLimit(20)
            ->execute(function ($item) {
                $this->helper
                    ->Iblock()
                    ->addElement(
                        $item['iblock_id'],
                        $item['fields'],
                        $item['properties']
                    );
            });
        $this->getExchangeManager()
            ->IblockElementsImport()
            ->setExchangeResource('iblock_elements2.xml')
            ->setLimit(20)
            ->execute(function ($item) {
                $this->helper
                    ->Iblock()
                    ->addElement(
                        $item['iblock_id'],
                        $item['fields'],
                        $item['properties']
                    );
            });
        $this->getExchangeManager()
            ->IblockElementsImport()
            ->setExchangeResource('iblock_elements3.xml')
            ->setLimit(20)
            ->execute(function ($item) {
                $this->helper
                    ->Iblock()
                    ->addElement(
                        $item['iblock_id'],
                        $item['fields'],
                        $item['properties']
                    );
            });
    }

    /**
     * Удаляем старый тип ИБ и сами ИБ
     *
     * @return void
     */
    private function deleteOldData(): void
    {
        $iblockIds = [];
        $iblockRes = IblockTable::getList([
            'filter' => ['IBLOCK_TYPE_ID' => self::IB_TYPE_ID],
        ]);
        while ($iblock = $iblockRes->fetch()) {
            $iblockIds[] = $iblock['ID'];
        }
        if (!empty($iblockIds)) {
            //Не актуально из-за CIBlock::Delete
            /*$elementsRes = ElementTable::getList([
                'filter' => ['IBLOCK_ID' => $iblockIds],
            ]);
            while ($element = $elementsRes->fetch()) {
                // нельзя удалять через D7
                \CIBlockElement::delete($element['ID']);
            }*/

            foreach ($iblockIds as $iblockId) {
                //IblockTable::delete($iblockId);
                //D7 не подойдет, т.к есть какие то зависимости. Не хочется использовать FOREIGN_KEY_CHECKS
                // Cannot delete or update a parent row: a foreign key constraint fails.
                \CIBlock::Delete($iblockId);
            }
        }
        //D7 не подойдет, т.к есть какие-то зависимости.
        \CIBlockType::delete(self::IB_TYPE_ID);
    }
}
