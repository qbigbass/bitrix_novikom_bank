<?php
namespace Lib\UserType;

use \Bitrix\Main,
    \Bitrix\Main\UserField;

class CUserTypeStringDescr
{
    public static function OnIBlockPropertyBuildList(): array
    {
        return array(
            'PROPERTY_TYPE' => 'S',
            "USER_TYPE" => 'multiple_field',
            "DESCRIPTION" => 'Множественное поле',
            'ConvertToDB' => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB' => [__CLASS__, 'ConvertFromDB'],
            'GetSettingsHTML' => [__CLASS__, 'GetSettingsHTML'],
            'PrepareSettings' => [__CLASS__, 'PrepareSettings'],
            'GetPropertyFieldHtml' => array(__CLASS__, 'GetPropertyFieldHtml'),
        );
    }

    /**
     * @param array $arProperty
     * @param array $value
     * @return array
     */
    public static function ConvertToDB(array $arProperty, array $value): array
    {
        $hasValues = false;

        for ($i = 1; $i <= $arProperty['USER_TYPE_SETTINGS']['COUNT']; $i++) {
            if (!empty($value['VALUE'][$i])) {
                $hasValues = true;
                break;
            }
        }

        if ($hasValues) {
            $value['VALUE'] = json_encode($value['VALUE']);
        } else {
            $value['VALUE'] = '';
        }

        return $value;
    }

    /**
     * @param array $arProperty
     * @param array $value
     * @param string $format
     * @return array
     */
    public static function ConvertFromDB(array $arProperty, array $value, string $format = ''): array
    {
        if ($value['VALUE'] != '') {
            $value['VALUE'] = json_decode($value['VALUE'], true);
        }

        return $value;
    }

    /**
     * @param array $arProperty
     * @param array $strHTMLControlName
     * @param array $arPropertyFields
     * @return string
     */
    public static function GetSettingsHTML(array $arProperty, array $strHTMLControlName, array &$arPropertyFields): string
    {
        $arPropertyFields = array(
            "HIDE" => [
                "SEARCHABLE",
                "FILTRABLE",
                "DEFAULT_VALUE"
            ],
            "USER_TYPE_SETTINGS_TITLE" => "Настройки отображения свойства"
        );

        $html = '<tr>
                    <td>Количество полей ввода:</td>
                    <td><input type="text" size="3" id="input_count" name="' . $strHTMLControlName["NAME"] . '[COUNT]" value="' . ($arProperty["USER_TYPE_SETTINGS"]["COUNT"] ?? 3) . '" oninput="updateFields()"></td>
                </tr>
                <tr>
                    <td>Подписи для полей:</td>
                    <td id="field_descriptions">';

        if (empty($arProperty["USER_TYPE_SETTINGS"]["DESCR"])) {
            $html .= '<input type="text" size="20" name="' . $strHTMLControlName["NAME"] . '[DESCR][1]" value="Подпись">';
            $html .= '<input type="text" size="20" name="' . $strHTMLControlName["NAME"] . '[DESCR][2]" value="Мелко">';
            $html .= '<input type="text" size="20" name="' . $strHTMLControlName["NAME"] . '[DESCR][3]" value="Крупно">';
        } else {
            $count = 1;
            foreach ($arProperty["USER_TYPE_SETTINGS"]["DESCR"] as $value) {
                $html .= '<input type="text" size="20" name="' . $strHTMLControlName["NAME"] . '[DESCR][' . $count . ']" value="' . $value . '"><br>';
                $count++;
            }
        }

        $html .= '</td></tr>';
        $html .= '<script>
                    var originalValues = {};

                    function saveOriginalValues() {
                        var existingFields = document.querySelectorAll("#field_descriptions input[type=\'text\']");
                        existingFields.forEach(function(field) {
                            var index = field.name.match(/\[(\d+)\]/)[1];
                            originalValues[index] = field.value;
                        });
                    }

                    function updateFields() {
                        var count = parseInt(document.getElementById("input_count").value) || 1;
                        var fieldDescriptions = document.getElementById("field_descriptions");
                        fieldDescriptions.innerHTML = "";

                        var numerals = ["Первое", "Второе", "Третье", "Четвертое", "Пятое", "Шестое", "Седьмое", "Восьмое", "Девятое", "Десятое"];

                        for (var i = 1; i <= count; i++) {
                            var descrText = originalValues[i] !== undefined ? originalValues[i] : numerals[i - 1] || (i + "-е поле");
                            var inputHtml = "<input type=\'text\' size=\'20\' name=\'' . $strHTMLControlName["NAME"] . '[DESCR][" + i + "]\' value=\'" + descrText + "\'><br>";
                            fieldDescriptions.innerHTML += inputHtml;
                        }

                        saveOriginalValues();
                    }

                    window.onload = function() {
                        saveOriginalValues();
                    };

                    document.getElementById("input_count").addEventListener("input", updateFields);
                </script>';

        return $html;
    }

    /**
     * @param array $arFields
     * @return array
     */
    public static function PrepareSettings(array $arFields): array
    {
        $fields = [];
        if (isset($arFields['USER_TYPE_SETTINGS']) && is_array($arFields['USER_TYPE_SETTINGS']))
        {
            $fields = $arFields['USER_TYPE_SETTINGS'];
        }
        $count = (int)($fields['COUNT'] ?? 1);
        if ($count <= 0) {
            $count = 1;
        }
        $description = $fields['DESCR'];
        $numerals = ["Первое", "Второе", "Третье", "Четвертое", "Пятое", "Шестое", "Седьмое", "Восьмое", "Девятое", "Десятое"];

        foreach ($description as $key => $value) {
            if (!$value) {
                $descrText = $numerals[$key] ?? ($key + 1) . "-е";
                $description[$key] = $descrText;
            }
        }

        return [
            'COUNT' => $count,
            'DESCR' => $description
        ];
    }

    /**
     * @param array $arProperty
     * @param array $value
     * @param array $arHtmlControl
     * @return string
     */
    public static function GetPropertyFieldHtml(array $arProperty, array $value, array $arHtmlControl): string
    {
        $fieldName =  htmlspecialcharsbx($arHtmlControl['VALUE']);
        $arValue = $value['VALUE'];

        $html = '';

        for ($i = 1; $i <= $arProperty['USER_TYPE_SETTINGS']['COUNT']; $i++) {
            $name = $fieldName . '[' . $i . ']';
            $currentValue = htmlspecialcharsex($arValue[$i] ?? '');
            $description = $arProperty['USER_TYPE_SETTINGS']['DESCR'][$i];

            $html .= '<input name="' . $name . '" id="' . $name . '" value="' . $currentValue . '" size="15" type="text" placeholder="' . $description . '">';
        }

        return $html;
    }
}
