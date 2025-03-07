<?php

namespace Dalee\Helpers;

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use CForm, CFormField, CFormAnswer;

class FormHelper
{
    /**
     * Находит форму по символьному коду
     *
     * @param $code
     * @return bool|mixed
     * @throws LoaderException
     */
    public static function getByCode($code)
    {
        Loader::includeModule("form");

        $cdbres = CForm::GetBySID($code);
        if ($result = $cdbres->Fetch()) {
            return $result;
        }
        return [];
    }

    /**
     * Получение вариантов ответов на вопрос по коду
     *
     * @param $code
     * @param $idForm
     * @return array
     * @throws LoaderException
     */
    public static function getOptionsByQuestionCode($code, $idForm)
    {
        Loader::includeModule("form");

        $options = [];

        $question = CFormField::GetBySID($code)->Fetch();
        if (empty($question['ID'])) {
            return $options;
        }

        $answerBy = 's_sort';
        $answerOrder = 'asc';
        $isFiltered = false;
        $resourceAnswers = CFormAnswer::GetList($question['ID'], $answerBy, $answerOrder, [], $isFiltered);
        while ($answer = $resourceAnswers->Fetch()) {
            $options[] = [
                'id' => $answer['ID'],
                'name' => $answer['MESSAGE'],
            ];
        }

        // Удаляем первый элемент, так как он нужен только для верного отображения в админке
        if (!empty($options[0])) {
            unset($options[0]);
            $options = array_values($options);
        }

        return $options;
    }

    /**
     * Трансформирует имена полей формы в служебные имена "form_text_3" --> "email"
     *
     * @param $formId
     * @param $data
     * @return array
     */
    public static function remapRequestFields($formId, $data)
    {
        $db = $GLOBALS['DB'];

        $newData = [];
        $sql = "SELECT
                    f.sid,
                    a.id as answer_id,
                    a.field_type as field_type,
                    a.value as value
                FROM b_form_field AS f
                LEFT JOIN b_form_answer AS a ON f.id = a.field_id
                WHERE f.form_id = " . intval($formId) . " AND f.active = 'Y'";

        $res = $db->Query($sql);
        while ($row = $res->Fetch()) {
            if (!array_key_exists($row['sid'], $data)) {
                continue;
            }
            switch ($row['field_type']) {
                case 'radio':
                case 'dropdown':
                    if ($row['value'] !== '' && (string)$row['value'] !== (string)$data[$row['sid']]) {
                        continue;
                    }
                    if ($row['value'] === '' && $data[$row['sid']] !== 'on') {
                        continue;
                    }
                    $fieldName = 'form_' . $row['field_type'] . '_' . $row['sid'];
                    $newData[$fieldName] = $row['answer_id'];
                    break;

                case 'multiselect':
                case 'checkbox':
                    if (!empty($data[$row['sid']])) {
                        $data[$row['sid']] = (string)$data[$row['sid']];
                    }
                    $fieldName = 'form_' . $row['field_type'] . '_' . $row['sid'];

                    if ($row['sid'] === 'privacy' && isset($data[$row['sid']]) && $data[$row['sid']]) {
                        $newData[$fieldName][] = $row['answer_id'];
                        break;
                    }
                    if (is_array($data[$row['sid']]) && !in_array($row['value'], $data[$row['sid']])) {
                        continue;
                    }
                    if ($row['value'] !== '' && $row['value'] !== $data[$row['sid']] && !is_array($data[$row['sid']])) {
                        continue;
                    }
                    if ($row['value'] === '' && $data[$row['sid']] !== 'on') {
                        continue;
                    }
                    if (!array_key_exists($fieldName, $newData)) {
                        $newData[$fieldName] = [];
                    }
                    $newData[$fieldName][] = $row['answer_id'];
                    break;

                default:
                    $fieldName = 'form_' . $row['field_type'] . '_' . $row['answer_id'];
                    $newData[$fieldName] = $data[$row['sid']];
                    break;
            }
        }

        return $newData;
    }

    public static function onBeforeResultAdd($formId, &$arFields, &$arrVALUES)
    {
        self::loadMultiple($formId, $arFields, $arrVALUES);
    }

    public static function getFilesInputNames($formId, $fieldCode = 'ATTACH_FILE')
    {
        $res = [];
        if ($question = \CFormField::GetBySID($fieldCode, $formId)->Fetch()) {
            $by = 's_id';
            $order = 'asc';
            $filter = false;
            if (intval($question['ID'])) {
                $rsAnswers = \CFormAnswer::GetList($question['ID'], $by, $order, ["FIELD_TYPE" => 'file'], $filter);
                while ($arAnswer = $rsAnswers->Fetch()) {
                    $res[] = 'form_file_' . $arAnswer['ID'];
                }
            }
        }
        return $res;
    }

    public static function loadMultiple($formId, &$arFields, &$arrVALUES)
    {
        global $_FILES;

        if (!empty($_FILES['ATTACH_FILE'])) {
            $files = [];
            if (is_array($_FILES['ATTACH_FILE']['name'])) {
                foreach ($_FILES['ATTACH_FILE'] as $key => $val) {
                    foreach ($val as $k => $v) {
                        $files[$k][$key] = $v;
                    }
                }
            } else {
                $files = [$_FILES['ATTACH_FILE']];
            }
            unset($_FILES['ATTACH_FILE']);

            $err = [];
            if ($inputsName = self::getFilesInputNames($formId)) {
                foreach ($files as $f) {
                    if ($inputName = array_shift($inputsName)) {
                        $_FILES[$inputName] = $f;
                    } else {
                        $err[] = $f;
                    }
                }

                if ($err) {
                    $fields = [
                        'TITLE' => 'Не хватило полей в форме для подгрузки файлов ' . __FUNCTION__,
                        'MESSAGE' => print_r($err, true),
                    ];
                    \CEvent::Send('DEBUG_SEND', SITE_ID, $fields);
                }
            }
        }

        return true;
    }

    /**
     * Перехватываем событие отправки почты. Блочим лишние отправки для обратной связи
     *
     * @param $event
     * @param $lid
     * @param $arFields
     * @param $message_id
     * @return false|void
     */
    public static function sendFeedBack(&$event, &$lid, &$arFields, $message_id)
    {
        if ($event === 'FORM_FILLING_feedback_form') {
            $curTopicCode = self::getTopicCodeByResultId($arFields['RS_FORM_ID'], $arFields['RS_RESULT_ID']);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/2.txt', print_r([$message_id, FEEDBACK_FORM_MESSAGES[$curTopicCode], FEEDBACK_FORM_MESSAGES, $message_id !== FEEDBACK_FORM_MESSAGES[$curTopicCode]], true), FILE_APPEND);
            if ((int)$message_id !== FEEDBACK_FORM_MESSAGES[$curTopicCode]) {
                return false;
            }
        }
    }

    /**
     * Получаем код ответа, который выбрал пользователь из вопроса "Причина обращения"
     *
     * @param int $formId
     * @param int $resultId
     * @return string
     */
    public static function getTopicCodeByResultId(int $formId, int $resultId): string
    {
        CForm::GetResultAnswerArray($formId, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => $resultId));
        $answers = $arrAnswers[$resultId];
        foreach ($answers as $AnswerSet) {
            $answer = current($AnswerSet);
            if ($answer['VARNAME'] === 'TOPIC') {
                return $answer['ANSWER_VALUE'];
            }
        }
        return '';
    }
}
