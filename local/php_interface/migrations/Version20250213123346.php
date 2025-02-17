<?php

namespace Sprint\Migration;

use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
use Sprint\Migration\Exceptions\HelperException;

class Version20250213123346 extends Version
{
    protected $author = "sergheysmetanin@gmail.com";
    protected $description = "";
    protected $moduleVersion = "4.15.1";

    protected $helper;
    protected int $iblockId;
    protected array $elementCodes;

    /**
     * @return void
     * @throws HelperException
     */
    public function up(): void
    {
        $this->helper = $this->getHelperManager();
        $this->iblockId = $this->helper->Iblock()->getIblockIdIfExists(
            'cards_detail_pages_ru',
            'for_private_clients_ru'
        );
        $this->addProperties();
        $this->addElements();

        $this->deleteOldData();
        $this->setBonusPropgramPropToElemets();
    }

    /**
     * Добавляем сво-ва инфоблока
     *
     * @return void
     */
    private function addProperties(): void
    {
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Иконка',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'ICON',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'F',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg, webp, svg',
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
            'DISPLAY_TYPE' => null,
            'DISPLAY_EXPANDED' => null,
            'FILTER_HINT' => null,
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Стиль баннера',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'BANNER_STYLE',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'IS_REQUIRED' => 'Y',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => 'Темно-фиолетовый',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'bg-heavy-purple',
                        ),
                    1 =>
                        array(
                            'VALUE' => 'Фиолетовый',
                            'DEF' => 'Y',
                            'SORT' => '500',
                            'XML_ID' => 'bg-linear-blue',
                        ),
                ),
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Категории кэшбека',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'CASHBACK_CATEGORIES',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'G',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'additional:cashback_categories_ru',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'SectionAuto',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Инфо-врезка в бенефитах',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'BENEFITS_INFO_BOX',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок инструкции 1',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_1_HEADING',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Инструкция 1',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_1',
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
                    'VIEW' => 'T',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок инструкции 2',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_2_HEADING',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Инструкция 2',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_2',
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
                    'VIEW' => 'T',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Заголовок инструкции 3',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_3_HEADING',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Инструкция 3',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_3',
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
                    'VIEW' => 'T',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Инфо-врезка',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INFO_BOX',
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Количество колонок в бенефитах',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'BENEFITS_COL',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => '2',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => '0b94fa9400e50c2d91db4004d4a4b266',
                        ),
                    1 =>
                        array(
                            'VALUE' => '3',
                            'DEF' => 'Y',
                            'SORT' => '500',
                            'XML_ID' => '187635205f0427b2fab298b21e5b534c',
                        ),
                ),
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Количество колонок блока инструкций 1',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_1_COLS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => '2',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => '26bf848290be0563289a3e91169e4ad4',
                        ),
                    1 =>
                        array(
                            'VALUE' => '3',
                            'DEF' => 'Y',
                            'SORT' => '500',
                            'XML_ID' => '197ea9c6ec60766f035a3ffc32eab77b',
                        ),
                ),
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Количество колонок блока инструкций 2',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_2_COLS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => '2',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'e761b3bfb24d685ff568469a7966a0dd',
                        ),
                    1 =>
                        array(
                            'VALUE' => '3',
                            'DEF' => 'Y',
                            'SORT' => '500',
                            'XML_ID' => '0550eab8f73a40223903e64d156b4793',
                        ),
                ),
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Количество колонок блока инструкций 3',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'INSTRUCTION_3_COLS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => '2',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => '963dd4f73311dda08715e3fb855d86f4',
                        ),
                    1 =>
                        array(
                            'VALUE' => '3',
                            'DEF' => 'Y',
                            'SORT' => '500',
                            'XML_ID' => '9d81456862aa39e9ec4bc515de69484f',
                        ),
                ),
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Выводить калькулятор бонусов',
            'ACTIVE' => 'Y',
            'SORT' => '1000',
            'CODE' => 'SHOW_BONUSES_CALC',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'C',
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
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => 'Y',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => '21004fb4bb52f4299e47e0d6d95d8d26',
                        ),
                ),
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
        ));
        $this->helper->Iblock()->saveProperty($this->iblockId, array(
            'NAME' => 'Является бонусной программой',
            'ACTIVE' => 'Y',
            'SORT' => '1001',
            'CODE' => 'IS_BONUS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'VALUES' =>
                array(
                    0 =>
                        array(
                            'VALUE' => 'да',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'da4944254e9dd03ce8ed27ec68f57999',
                        ),
                ),
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
        ));
    }

    /**
     * Добавляем Элементы
     *
     * @return void
     */
    private function addElements(): void
    {
        $this->getExchangeManager()
            ->IblockElementsImport()
            ->setExchangeResource('iblock_elements.xml')
            ->setLimit(20)
            ->execute(function ($item) {
                $this->elementCodes[] = $item['fields']['CODE'];
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
        $iblockRes = IblockTable::getList([
            'filter' => ['CODE' => 'bonus_programs_ru'],
        ]);
        if ($iblock = $iblockRes->fetch()) {
            $iblockId = $iblock['ID'];
            \CIBlock::Delete($iblockId);
        }
    }

    /**
     * Устанавливаем признак, что это бонусная программа
     *
     * @return void
     */
    private function setBonusPropgramPropToElemets(): void
    {
        if (is_array($this->elementCodes) && !empty($this->elementCodes)) {
            $prop = PropertyTable::getList([
                'filter' => ['CODE' => 'IS_BONUS', 'IBLOCK_ID' => $this->iblockId],
            ])->fetch();
            if ($prop) {
                $propEnum = PropertyEnumerationTable::getList([
                    'filter' => ['PROPERTY_ID' => $prop['ID']],
                ])->fetch();
                if ($propEnum) {
                    $elementRes = ElementTable::getList([
                        'filter' => ['CODE' => $this->elementCodes],
                    ]);
                    while ($element = $elementRes->fetch()) {
                        ElementPropertyTable::add([
                            'IBLOCK_PROPERTY_ID' => $prop['ID'],
                            'IBLOCK_ELEMENT_ID' => $element['ID'],
                            'VALUE' => $propEnum['ID'],
                            'VALUE_ENUM' => $propEnum['ID'],
                        ]);
                    }
                }
            }
        }
    }
}
