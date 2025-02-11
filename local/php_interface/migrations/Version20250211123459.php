<?php

namespace Sprint\Migration;

use CAdminFormSettings;
use CUserOptions;

class Version20250211123459 extends Version
{
    /** @var string Название таба для удаления */
    private const TAB_NAME = 'Блок HTML';
    /** @var string ID формы в таблице b_useR_option */
    private const FORM_ID = 'form_element_130';
    /** @var array Массив таба, на случай, если придется его вернуть */
    private const TAB_ARRAY = [
        'TAB' => self::TAB_NAME,
        'FIELDS' => [
            'PROPERTY_356' => self::TAB_NAME
        ]
    ];

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
