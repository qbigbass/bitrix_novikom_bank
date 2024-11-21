<?php

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

class DaleeForm extends \CBitrixComponent
{
    protected CMain $app;
    protected CDatabase $db;
    protected int $formId;

    public function onPrepareComponentParams($arParams)
    {
        try {
            if (!Loader::includeModule('form')) {
                throw new LoaderException('Module "form" not installed');
            }
        } catch (LoaderException $e) {
            ShowError($e->getMessage());
        }

        $this->formId = $arParams['FORM_ID'];
        $this->app = $GLOBALS['APPLICATION'];
        $this->db = $GLOBALS['DB'];

        return $arParams;
    }

    public function executeComponent()
    {
        try {
            if ($this->request->isPost()) {
                $input = $this->request->getPostList()->toArray();
                $data = $this->remapRequestFields($input);

                // validate form
                $errors = \CForm::Check($this->formId, $data, false, 'Y', 'N');
                if ($errors) {
                    throw new \Exception($errors);
                }

                // save form result
                $resultId = \CFormResult::Add($this->formId, $data);
                if (!$resultId) {
                    throw new \Exception('Не удалось сохранить результат');
                }

                $result = [
                    'status' => 'success',
                ];


                $this->app->RestartBuffer();
                header('Content-Type: application/json');
                die(json_encode($result, JSON_UNESCAPED_UNICODE));

            } else {
                $this->includeComponentTemplate();
            }

        } catch (Exception $e) {
            $result = [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];

            $this->app->RestartBuffer();
            header('Content-Type: application/json');
            die(json_encode($result, JSON_UNESCAPED_UNICODE));
        }
    }

    /**
     * Преобразует названия полей вида FIO в form_text_174
     *
     * @param array $data
     * @return array
     */
    protected function remapRequestFields($data): array
    {
        $newData = [];

        $sql = "SELECT
                    f.sid,
                    a.id as answer_id,
                    a.field_type as field_type,
                    a.value as value
                FROM b_form_field AS f
                LEFT JOIN b_form_answer AS a ON f.id = a.field_id
                WHERE f.form_id = " . intval($this->formId) . " AND f.active = 'Y'";

        if (isset($data['captcha_sid']) && isset($data['captcha_word'])) {
            $newData['captcha_sid'] = $data['captcha_sid'];
            $newData['captcha_word'] = $data['captcha_word'];
        }

        $res = $this->db->Query($sql);
        while ($row = $res->Fetch()) {
            if (!array_key_exists($row['sid'], $data)) {
                continue;
            }
            switch ($row['field_type']) {
                case 'radio':
                case 'dropdown':
                    if ($row['value'] !== '' && $row['value'] !== $data[$row['sid']]) {
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
                    $t_f = true;
                    // Na sluchai, esli vibrano mnogo variantov checkbox i v
                    // pole s odnim kodom prishel massiv otvetov
                    if ($row['value'] !== '' && is_array($data[$row['sid']])) {
                        $t_f = in_array($row['value'], $data[$row['sid']]);
                    }
                    if ($row['value'] !== '' && $row['value'] !== $data[$row['sid']] && !is_array($data[$row['sid']])) {
                        continue;
                    }
                    if ($row['value'] === '' && $data[$row['sid']] !== 'on') {
                        continue;
                    }
                    if ($t_f) {
                        $fieldName = 'form_' . $row['field_type'] . '_' . $row['sid'];
                        if (!array_key_exists($fieldName, $newData)) {
                            $newData[$fieldName] = [];
                        }
                        $newData[$fieldName][] = $row['answer_id'];
                    }
                    break;

                default:
                    $fieldName = 'form_' . $row['field_type'] . '_' . $row['answer_id'];
                    $newData[$fieldName] = $data[$row['sid']];
                    break;
            }
        }

        return $newData;
    }
}
