<?php

namespace Dalee\UserType;

use Dalee\Helpers\IblockHelper;
use Bitrix\Iblock\ElementPropertyTable;
use \Bitrix\Main\Context;

class PlaceholderChecker
{
    /**
     * Обработчик события ИБ вкладок. Проверяем все ли плейсхолдеры заполнены
     *
     * @param $arFields
     * @return void
     */
    public static function checkTabPlaceholders($arFields)
    {
        global $APPLICATION;
        $tabsIblockId = iblock('tabs');
        $request = Context::getCurrent()->getRequest();
        /**
         * Если изменяем элемент из ИБ вкладок
         * Если находимся в админке(сделал проверку на всякий случай, т.к если эл-т правится из админки, значит переданы все новые свойства)
         */
        if ($tabsIblockId == $arFields['IBLOCK_ID'] && $request->isAdminSection()) {
            $propsIDs = [];
            $placeholderProps = IblockHelper::getPropsByCode($tabsIblockId, TABS_PLACEHOLDERS_MATCH);
            foreach ($placeholderProps as $code => $prop) {
                $propsIDs[] = $prop['ID'];
            }
            //Не будет работать для ИБ2.0
            if (is_array($propsIDs) && !empty($propsIDs)) {
                // Получаем значения свойств для плейсхолдеров
                $propValues = [];
                $propValuesRes = ElementPropertyTable::getList([
                    'filter' => [
                        'IBLOCK_ELEMENT_ID' => $arFields['ID'],
                        'IBLOCK_PROPERTY_ID' => $propsIDs,
                    ],
                ]);
                while ($prop = $propValuesRes->fetch()) {
                    $propValues[$prop['IBLOCK_PROPERTY_ID']] = $prop;
                }

                //Получаем Детальное описание(туда вносят плейсхолдеры)
                $detailText = $arFields['DETAIL_TEXT'];

                //проверяем все ли плейсхолдеры заполнены
                if ($detailText !== '') {
                    foreach (TABS_PLACEHOLDERS_MATCH as $placeholder => $propCode) {
                        if (str_contains($detailText, $placeholder)) {
                            //Если есть такое свойство в базе
                            if ($propInBase = $placeholderProps[$propCode]) {
                                /** ID свойства в базе */
                                $propInBaseId = $propInBase['ID'];
                                /** КОД свойства в базе */
                                $propInBaseCode = $propCode;
                                /** Выбрасывать исключение или нет */
                                $showException = true;
                                /** Что заполнено на данный момент в БД */
                                $currentProp = $arFields['PROPERTY_VALUES'][$propInBaseId];

                                switch ($propInBase['PROPERTY_TYPE']) {
                                    //Если текстовой свойство
                                    case 'S':
                                        //HTML
                                        switch ($propInBase['USER_TYPE']) {
                                            //HTML текс
                                            case 'HTML':
                                                if ($propInBase['MULTIPLE'] == 'Y') {
                                                    foreach ($currentProp as $value) {
                                                        if ($value['VALUE']['TEXT']) {
                                                            $showException = false;
                                                            continue;
                                                        }
                                                    }
                                                } else {
                                                    foreach ($currentProp as $value) {
                                                        if ($value['VALUE']['TEXT']) {
                                                            $showException = false;
                                                            continue;
                                                        }
                                                    }
                                                }
                                                break;
                                            // строка
                                            default:
                                                foreach ($currentProp as $value) {
                                                    if ($value['VALUE']) {
                                                        $showException = false;
                                                        continue;
                                                    }
                                                }
                                                break;
                                        }
                                        break;
                                    // Привязка к разделам
                                    // Привязка к элементам
                                    case 'G':
                                    case 'E':
                                        if ($propInBase['MULTIPLE'] == 'Y') {
                                            foreach ($currentProp as $value) {
                                                if ($value['VALUE']) {
                                                    $showException = false;
                                                    continue;
                                                }
                                            }
                                        } else {
                                            $showException = (bool)$currentProp['VALUE'];
                                        }
                                        break;
                                    //список
                                    case 'L':
                                        //похоже, что тут не нужна проверка на MULTIPLE
                                        foreach ($currentProp as $value) {
                                            if ($value['VALUE']) {
                                                $showException = false;
                                                continue;
                                            }
                                        }
                                        break;
                                    // Файлы
                                    case 'F':
                                        if (is_array($currentProp)) {
                                            $activeFiles = array_filter($currentProp, function ($file) {
                                                return empty($file['VALUE']['del']);
                                            });
                                            if (!empty($activeFiles)) {
                                                $showException = false;
                                            }
                                        }
                                        break;
                                    default:
                                        $showException = false;
                                }
                                if ($showException) {
                                    $APPLICATION->throwException(
                                        'Не заполнено свойство для плейсхолдера ' . $placeholder
                                    );
                                    return false;
                                }
                            } else {
                                $APPLICATION->throwException('В базе нет свойства для плейсхолдера ' . $placeholder);
                                return false;
                            }
                        }
                    }
                }
            }
        }
    }
}
