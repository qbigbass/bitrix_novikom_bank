<?php
namespace Dalee\UserType;

class CUserTypeStringWithTabs
{
    public static function OnIBlockPropertyBuildList(): array
    {
        return [
            'PROPERTY_TYPE' => 'S',
            "USER_TYPE" => 'string_with_tabs',
            "DESCRIPTION" => 'Строка с табами',
            'ConvertToDB' => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB' => [__CLASS__, 'ConvertFromDB'],
            'GetSettingsHTML' => [__CLASS__, 'GetSettingsHTML'],
            'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
        ];
    }

    /**
     * @param array $arProperty
     * @param array $value
     * @return array
     */
    public static function ConvertToDB(array $arProperty, array $value): array
    {
        $values = $value['VALUE']['VALUES'] ?? null;

        if (is_array($values)) {
            $value['VALUE']['VALUES'] = array_filter($values, fn($item) => !empty($item));
            $value['VALUE'] = !empty($value['VALUE']['VALUES']) ? json_encode($value['VALUE']) : '';
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
        if ($arProperty['VALUE'] != '' && is_string($arProperty['VALUE'])) {
            $value['VALUE'] = json_decode($arProperty['VALUE'], true);
        }

        return $value;
    }

    /**
     * @param array $arProperty
     * @param array $strHTMLControlName
     * @param array $arPropertyFields
     * @return void
     */
    public static function GetSettingsHTML(array $arProperty, array $strHTMLControlName, array &$arPropertyFields): void
    {
        $arPropertyFields = [
            "HIDE" => [
                "SEARCHABLE",
                "FILTRABLE",
                "DEFAULT_VALUE"
            ],
            "USER_TYPE_SETTINGS_TITLE" => "Настройки отображения свойства"
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
        $valueName =  htmlspecialcharsbx($arHtmlControl['VALUE']);
        $uniqueId = uniqid($valueName . '-container-');

        $html = '
            <div class="property-fields-container" id="' . $uniqueId . '">
                <hr><br>
        ';

        if (empty($value['VALUE'])) {
            $html .= '
                <div>
                    <span title="Описание значения свойства"> Название таба:
                        <input name="' . $valueName . '[TAB]" size="15" type="text">
                    </span>
                </div><br>
                <div class="fields-group">
                    <div class="field-entry">
                        <div>
                            <textarea name="' . $valueName . '[VALUES][0]" cols="90" rows="5"></textarea>
                        </div>
                        <div>
                            <span title="Описание значения свойства"> Описание:
                                <input name="' . $valueName . '[DESCRIPTIONS][0]" size="79" type="text">
                            </span>
                        </div><br>
                    </div>
                </div>
            ';
        } else {
            $html .= '
                <div>
                    <span title="Описание значения свойства"> Название таба:
                        <input name="' . $valueName . '[TAB]" size="15" type="text" value="' . $value['VALUE']['TAB'] . '">
                    </span>
                </div><br>
                <div class="fields-group">
            ';

            foreach ($value['VALUE']['VALUES'] as $key => $name) {
                $html .= '
                    <div class="field-entry">
                        <div>
                            <textarea name="' . $valueName . '[VALUES][' . $key . ']" cols="90" rows="5">' . $name . '</textarea>
                        </div>
                        <div>
                            <span title="Описание значения свойства"> Описание:
                                <input name="' . $valueName . '[DESCRIPTIONS][' . $key . ']" size="79" type="text" value="' . $value['VALUE']['DESCRIPTIONS'][$key] . '">
                            </span>
                        </div><br>
                    </div>
                ';
            }

            $html .= '</div>';
        }

        $html .= '
            <button type="button" onclick="addPropertyField(\'' . $uniqueId . '\', \'' . $valueName . '\')">+</button>
            <button type="button" onclick="removePropertyField(\'' . $uniqueId . '\')">-</button><br><br>
        </div>
        ';

        $html .= '
            <script>
                function addPropertyField(containerId, valueName) {
                    const container = document.getElementById(containerId);
                    const fieldsGroup = container.querySelector(".fields-group");

                    const count = fieldsGroup.querySelectorAll("textarea").length;

                    const fieldHtml = `
                        <div class="field-entry">
                            <div>
                                <textarea name="${valueName}[VALUES][${count}]" cols="90" rows="5"></textarea>
                            </div>
                            <div>
                                <span title="Описание значения свойства"> Описание:
                                    <input name="${valueName}[DESCRIPTIONS][${count}]" size="79" type="text">
                                </span>
                            </div><br>
                        </div>`;

                    fieldsGroup.insertAdjacentHTML("beforeend", fieldHtml);
                }

                function removePropertyField(containerId) {
                    const container = document.getElementById(containerId);
                    const fieldsGroup = container.querySelector(".fields-group");

                    const entries = fieldsGroup.querySelectorAll(".field-entry");

                    if (entries.length > 1) {
                        entries[entries.length - 1].remove();
                    }
                }
            </script>
        ';

        return $html;
    }
}
