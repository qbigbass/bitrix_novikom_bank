<?php

namespace Sprint\Migration;

use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;
use CAdminFormSettings;
use CUserOptions;

class Version20250211123459 extends Version
{
    /** @var int ID ИБ */
    private const IBLOCK_ID = 130;
    /** @var int ИД свойства, где хранится html код */
    private const HTML_BLOCK_PROP_ID = 356;
    /** @var string Название таба для удаления */
    private const TAB_NAME = 'Блок HTML';
    /** @var string ID формы в таблице b_useR_option */
    private const FORM_ID = 'form_element_' . self::IBLOCK_ID;
    /** @var array Массив таба, на случай, если придется его вернуть */
    private const TAB_ARRAY = [
        'TAB' => self::TAB_NAME,
        'FIELDS' => [
            'PROPERTY_' . self::HTML_BLOCK_PROP_ID => self::TAB_NAME
        ]
    ];
    private const REPORT_FILE_PATH = '/upload/report.csv';

    protected $author = "sergey.smetanin@dalee.ru";
    protected $description = "DNVKBSITE-169";
    protected $moduleVersion = "4.15.1";

    /**
     * Удаляем таб "Блок HTML"
     * Решил не удалять свойства внутри таба, т.к потом их нельзя будет вернуть вместе со значениями для элементов ИБ
     *
     * @return void
     */
    public function up(): void
    {
        Loader::includeModule('iblock');
        $propValues = $this->getElementsWithHTMLBlock();
        $updatedElements = $this->setElementsDetailText($propValues);
        $this->whiteReport($updatedElements);
        $this->deleteTab();
    }

    /**
     * Получаем элементы, у которых заполнены HTML блоки
     *
     * @return array
     */
    private function getElementsWithHTMLBlock(): array
    {
        $result = [];
        $htmlPropValues = ElementPropertyTable::getList([
            'filter' => ['IBLOCK_PROPERTY_ID' => self::HTML_BLOCK_PROP_ID, '!VALUE' => ''],
            'select' => ['IBLOCK_PROPERTY_ID', 'VALUE', 'IBLOCK_ELEMENT_ID']
        ]);
        while ($prop = $htmlPropValues->fetch()) {
            $result[$prop['IBLOCK_ELEMENT_ID']] = $prop;
        }
        return $result;
    }

    /**
     * Заменяем DETAIL_TEXT содержимым из св-ва HTML блок
     *
     * @param array $propValues
     * @return array
     */
    private function setElementsDetailText(array $propValues): array
    {
        $return = [];
        $elementsRes = ElementTable::getList([
            'filter' => ['ID' => array_keys($propValues), 'IBLOCK_ID' => self::IBLOCK_ID],
            'select' => ['ID', 'DETAIL_TEXT', 'NAME'],
        ]);
        while ($element = $elementsRes->fetch()) {
            if (str_contains($element['DETAIL_TEXT'], '#HTML#')) {
                $htmlBlock = $propValues[$element['ID']]['VALUE'];
                $detailText = str_replace('#HTML#', $htmlBlock, $element['DETAIL_TEXT']);
                //Нельзя обновить через D7
                $el = new \CIBlockElement();
                $el->Update($element['ID'], ['DETAIL_TEXT' => $detailText, 'DETAIL_TEXT_TYPE' => 'html']);
                $return[] = [
                    'ID' => $element['ID'],
                    'NAME' => $element['NAME'],
                    'OLD_DETAIL_TEXT' => $element['DETAIL_TEXT'],
                    'NEW_DETAIL_TEXT' => $detailText,
                    'HTML_BLOCK' => $htmlBlock,
                ];
            }
        }
        return $return;
    }

    /**
     * Пишем отчет с измененными записями
     *
     * @param array $updatedElements
     * @return void
     */
    private function whiteReport(array $updatedElements): void
    {
        $html = '<html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        <style>
                            td {mso-number-format:\@;vertical-align: top;}
                            .number0 {mso-number-format:0;}
                            .number2 {mso-number-format:Fixed;}

                        </style>
                    </head>
                    <body>
                        <table cellspacing="0" class="forum-table forum-users">
                            <tbody>
                                <tr>
                                    <td><b>ID</b></td>
                                    <td><b>Название</b></td>
                                    <td><b>Старое детальное описание</b></td>
                                    <td><b>Новое детальное описание</b></td>
                                    <td><b>Блок HTML</b></td>
                                </tr>
                            ';
        foreach ($updatedElements as $element) {
            $html .= '
                                <tr>
                                    <td>' . $element['ID'] . '</td>
                                    <td>' . $element['NAME'] . '</td>
                                    <td>' . $element['OLD_DETAIL_TEXT'] . '</td>
                                    <td>' . $element['NEW_DETAIL_TEXT'] . '</td>
                                    <td>' . $element['HTML_BLOCK'] . '</td>
                                </tr>
                ';
        }
        $html .= '        </tbody>
                        </table>
                    </body>
                   </html>';
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/report.xls', $html);
    }

    /**
     * Удаляем Таб
     *
     * @return void
     */
    private function deleteTab(): void
    {
        $formElement130Tabs = $this->getTabsArray(self::FORM_ID, 0);
        foreach ($formElement130Tabs as $tabId => $tab) {
            if ($tab['TAB'] === self::TAB_NAME) {
                unset($formElement130Tabs[$tabId]);
            }
        }
        //нет аналогов на D7 или ORM в ядре
        CAdminFormSettings::setTabsArray(self::FORM_ID, $formElement130Tabs, true, false);
    }

    /**
     * Получаем настройки отображения формы редактирования элементов для ИБ
     * Копия CAdminFormSettings::getTabsArray, только с учетом $userId
     *
     * @param string $formId
     * @param int $userId ИД юзер. 0 - форма по-умолчанию
     * @return array
     */
    private function getTabsArray(string $formId, int $userId = 0): array
    {
        $arCustomTabs = array();
        $customTabs = CUserOptions::GetOption("form", $formId, false, $userId);
        if ($customTabs && $customTabs["tabs"]) {
            $arTabs = explode("--;--", $customTabs["tabs"]);

            foreach ($arTabs as $customFields) {
                if ($customFields == "") {
                    continue;
                }
                $arCustomFields = explode("--,--", $customFields);
                $arCustomTabID = "";
                foreach ($arCustomFields as $customField) {
                    if ($arCustomTabID == "") {
                        list($arCustomTabID, $arCustomTabName) = explode("--#--", $customField);
                        $arCustomTabs[$arCustomTabID] = array(
                            "TAB" => $arCustomTabName,
                            "FIELDS" => array(),
                        );
                    } else {
                        list($arCustomFieldID, $arCustomFieldName) = explode("--#--", $customField);
                        $arCustomFieldName = ltrim($arCustomFieldName, "* -\xa0\xc2");
                        $arCustomTabs[$arCustomTabID]["FIELDS"][$arCustomFieldID] = $arCustomFieldName;
                    }
                }
            }
        }
        return $arCustomTabs;
    }

    public function down(): void
    {
        $this->addTab();
    }

    /**
     * Добавляем таб, если его нет
     *
     * @return void
     */
    private function addTab(): void
    {
        $formElement130Tabs = $this->getTabsArray(self::FORM_ID, 0);
        $tabId = 'cedit' . count($formElement130Tabs);
        $haveTab = false;
        foreach ($formElement130Tabs as $tabId => $tab) {
            if ($tab['TAB'] === self::TAB_NAME) {
                $haveTab = true;
            }
        }
        if ($haveTab === false) {
            $formElement130Tabs[$tabId] = self::TAB_ARRAY;
            //нет аналогов на D7 или ORM в ядре
            CAdminFormSettings::setTabsArray(self::FORM_ID, $formElement130Tabs, true, false);
        }
    }
}
