<?php
namespace Lib\UserType;

use \Bitrix\Main,
    \Bitrix\Main\UserField;

class CUserTypeStringDescr
{
    public static function OnIBlockPropertyBuildList()
    {
        return array(
            'PROPERTY_TYPE' => 'S',
            "USER_TYPE" => 'triple_string', // уникальный ID
            "DESCRIPTION" => 'Тройное строковое поле',
            'ConvertToDB' => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB' => [__CLASS__, 'ConvertFromDB'],
            'GetPropertyFieldHtml' => array(__CLASS__, 'GetPropertyFieldHtml'),
        );
    }

    public static function ConvertToDB($arProperty, $value)
    {
        if (
            !empty($value['VALUE']['FIRST'])
            || !empty($value['VALUE']['SECOND'])
            || !empty($value['VALUE']['THIRD'])
        ) {
            try {
                $value['VALUE'] = base64_encode(serialize($value['VALUE']));
            } catch (Bitrix\Main\ObjectException $exception) {
                echo $exception->getMessage();
            }
        } else {
            $value['VALUE'] = '';
        }

        return $value;
    }

    public static function ConvertFromDB($arProperty, $value, $format = '')
    {
        if ($value['VALUE'] != '') {
            try {
                $value['VALUE'] = base64_decode($value['VALUE']);
            } catch (Bitrix\Main\ObjectException $exception) {
                echo $exception->getMessage();
            }
        }

        return $value;
    }

    public static function GetPropertyFieldHtml($arProperty, $value, $arHtmlControl)
    {
        $fieldName =  htmlspecialcharsbx($arHtmlControl['VALUE']);
        $arValue = unserialize(htmlspecialcharsback($value['VALUE']), [stdClass::class]);

        $rate = $fieldName . "[FIRST]";
        $amount = $fieldName . "[SECOND]";
        $term = $fieldName . "[THIRD]";

        $html = '<input name="' . $rate . '" id="' . $rate . '" value="' . htmlspecialcharsex($arValue['FIRST'] ?? '') . '" size="15" type="text">';
        $html .= '<label for="' . $rate . '"> < Подпись </label>';
        $html .= '<input name="' . $amount . '" id="' . $amount . '" value="' . htmlspecialcharsex($arValue['SECOND'] ?? '') . '" size="15" type="text">';
        $html .= '<label for="' . $amount . '"> < Мелко </label>';
        $html .= '<input name="' . $term . '" id="' . $term . '" value="' . htmlspecialcharsex($arValue['THIRD'] ?? '') . '" size="15" type="text">';
        $html .= '<label for="' . $term . '"> < Крупно </label>';

        return $html;
    }
}
