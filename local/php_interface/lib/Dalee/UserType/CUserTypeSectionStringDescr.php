<?php

namespace Dalee\UserType;

class CUserTypeSectionStringDescr
{
    public static function GetUserTypeDescription()
    {
        return array(
            "USER_TYPE_ID" => 'stringdescription',
            "CLASS_NAME" => __CLASS__,
            "DESCRIPTION" => 'Строка с описанием',
            "BASE_TYPE" => \CUserTypeManager::BASE_TYPE_STRING,
        );
    }

    public static function GetEditFormHTML($arUserField, $arHtmlControl)
    {
        return '';
    }

    public static function OnBeforeSave($arUserField, $value)
    {
        if (empty($value['value']) && empty($value['description'])) {
            return null;
        }

        return json_encode($value);
    }

    public static function OnAfterFetch($arUserField, $value)
    {
        return json_decode($value['VALUE'], true);
    }

    public static function GetEditFormHTMLMulty($arUserField, $arHtmlControl)
    {
        $fieldName = $arUserField['FIELD_NAME'];
        $html = '<table id="table_' . $fieldName . '"><tbody>';

        // Проверяем, есть ли значения, иначе создаем пустую строку
        if (empty($arUserField['VALUE']) || !is_array($arUserField['VALUE'])) {
            $arUserField['VALUE'] = [['value' => '', 'description' => '']];
        }

        // Генерируем строки с существующими значениями
        foreach ($arUserField['VALUE'] as $index => $pair) {
            $value = htmlspecialchars($pair['value'] ?? '');
            $description = htmlspecialchars($pair['description'] ?? '');
            $html .= "<tr class='input-row'>";
            $html .= "<td><input name='{$fieldName}[{$index}][value]' value='{$value}'></td>";
            $html .= "<td><input name='{$fieldName}[{$index}][description]' value='{$description}'></td>";
            $html .= "</tr>";
        }

        // Кнопка "Добавить"
        $html .= '<tr class="' . $fieldName . '_button">
            <td colspan="2" style="padding-top: 6px;">
                <input type="button" value="Добавить" onclick="
                    let table = document.querySelector(\'#table_' . $fieldName . ' tbody\');
                    let rowCount = table.querySelectorAll(\'.input-row\').length; // Количество строк
                    let tr = document.createElement(\'tr\');
                    tr.classList.add(\'input-row\');

                    let td1 = document.createElement(\'td\');
                    let input1 = document.createElement(\'input\');
                    input1.name = \'' . $fieldName . '[\' + rowCount + \'][value]\';

                    let td2 = document.createElement(\'td\');
                    let input2 = document.createElement(\'input\');
                    input2.name = \'' . $fieldName . '[\' + rowCount + \'][description]\';

                    td1.appendChild(input1);
                    td2.appendChild(input2);
                    tr.appendChild(td1);
                    tr.appendChild(td2);

                    let buttonRow = table.querySelector(\'tr.' . $fieldName . '_button\');
                    table.insertBefore(tr, buttonRow);
                ">
            </td>
        </tr>';

        $html .= "</tbody></table>";

        return $html;
    }

}
