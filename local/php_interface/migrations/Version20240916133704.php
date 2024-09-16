<?php

namespace Sprint\Migration;


class Version20240916133704 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Поля разделов рестрктуризации";

    protected $moduleVersion = "4.12.6";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:restructuring_SECTION',
  'FIELD_NAME' => 'UF_SHORT_CONDITIONS',
  'USER_TYPE_ID' => 'sprint_editor',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' =>
  array (
    'DEFAULT_VALUE' => '{"version":2,"blocks":[{"small_text":"","main_text":"","condition_name":"","name":"my_loan_condition","settings":{},"layout":"0,0","meta":{}},{"small_text":"","main_text":"","condition_name":"","name":"my_loan_condition","settings":{},"layout":"0,0","meta":{}},{"small_text":"","main_text":"","condition_name":"","name":"my_loan_condition","settings":{},"layout":"0,0","meta":{}}],"layouts":[{"settings":{},"columns":[{"css":""}]}]}',
    'DISABLE_CHANGE' => 'Y',
    'WIDE_MODE' => 'Y',
    'SETTINGS_NAME' => '',
  ),
  'EDIT_FORM_LABEL' =>
  array (
    'en' => 'Краткие условия',
    'ru' => 'Краткие условия',
  ),
  'LIST_COLUMN_LABEL' =>
  array (
    'en' => 'Краткие условия',
    'ru' => 'Краткие условия',
  ),
  'LIST_FILTER_LABEL' =>
  array (
    'en' => 'Краткие условия',
    'ru' => 'Краткие условия',
  ),
  'ERROR_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:restructuring_SECTION',
  'FIELD_NAME' => 'UF_ICON',
  'USER_TYPE_ID' => 'file',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' =>
  array (
    'SIZE' => 20,
    'LIST_WIDTH' => 0,
    'LIST_HEIGHT' => 0,
    'MAX_SHOW_SIZE' => 0,
    'MAX_ALLOWED_SIZE' => 0,
    'EXTENSIONS' =>
    array (
      'svg' => true,
    ),
    'TARGET_BLANK' => 'Y',
  ),
  'EDIT_FORM_LABEL' =>
  array (
    'en' => 'Иконка',
    'ru' => 'Иконка',
  ),
  'LIST_COLUMN_LABEL' =>
  array (
    'en' => 'Иконка',
    'ru' => 'Иконка',
  ),
  'LIST_FILTER_LABEL' =>
  array (
    'en' => 'Иконка',
    'ru' => 'Иконка',
  ),
  'ERROR_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:restructuring_SECTION',
  'FIELD_NAME' => 'UF_BANNER',
  'USER_TYPE_ID' => 'sprint_editor',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' =>
  array (
    'DEFAULT_VALUE' => '{"version":2,"blocks":[{"name":"my_complex_banner","tag":"","button_name":"","button_link":"","htag":{"type":"h1","value":"","anchor":"","name":"htag"},"text":{"value":"","name":"text"},"image":{"file":{},"desc":"","name":"image"},"settings":{},"layout":"0,0","meta":{}}],"layouts":[{"settings":{},"columns":[{"css":""}]}]}',
    'DISABLE_CHANGE' => 'Y',
    'WIDE_MODE' => 'Y',
    'SETTINGS_NAME' => '',
  ),
  'EDIT_FORM_LABEL' =>
  array (
    'en' => 'Баннер',
    'ru' => 'Баннер',
  ),
  'LIST_COLUMN_LABEL' =>
  array (
    'en' => 'Баннер',
    'ru' => 'Баннер',
  ),
  'LIST_FILTER_LABEL' =>
  array (
    'en' => 'Баннер',
    'ru' => 'Баннер',
  ),
  'ERROR_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:restructuring_SECTION',
  'FIELD_NAME' => 'UF_CONDITIONS',
  'USER_TYPE_ID' => 'sprint_editor',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' =>
  array (
    'DEFAULT_VALUE' => '{"version":2,"blocks":[{"block_heading":"","items":[],"name":"my_block_with_tabs","settings":{},"layout":"0,0","meta":{}}],"layouts":[{"settings":{},"columns":[{"css":""}]}]}',
    'DISABLE_CHANGE' => 'Y',
    'WIDE_MODE' => 'Y',
    'SETTINGS_NAME' => 'block_with_tabs',
  ),
  'EDIT_FORM_LABEL' =>
  array (
    'en' => 'Условия реструктуризации',
    'ru' => 'Условия реструктуризации',
  ),
  'LIST_COLUMN_LABEL' =>
  array (
    'en' => 'Условия реструктуризации',
    'ru' => 'Условия реструктуризации',
  ),
  'LIST_FILTER_LABEL' =>
  array (
    'en' => 'Условия реструктуризации',
    'ru' => 'Условия реструктуризации',
  ),
  'ERROR_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'IBLOCK_for_private_clients_ru:restructuring_SECTION',
  'FIELD_NAME' => 'UF_STEP_BY_STEP',
  'USER_TYPE_ID' => 'sprint_editor',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' =>
  array (
    'DEFAULT_VALUE' => '{"version":2,"blocks":[{"items":[{"collapsed":false,"rate":""}],"name":"my_step_by_step_visualization","settings":{},"layout":"0,0","meta":{}}],"layouts":[{"settings":{},"columns":[{"css":""}]}]}',
    'DISABLE_CHANGE' => 'Y',
    'WIDE_MODE' => 'Y',
    'SETTINGS_NAME' => '',
  ),
  'EDIT_FORM_LABEL' =>
  array (
    'en' => 'Пошаговая визуализация',
    'ru' => 'Пошаговая визуализация',
  ),
  'LIST_COLUMN_LABEL' =>
  array (
    'en' => 'Пошаговая визуализация',
    'ru' => 'Пошаговая визуализация',
  ),
  'LIST_FILTER_LABEL' =>
  array (
    'en' => 'Пошаговая визуализация',
    'ru' => 'Пошаговая визуализация',
  ),
  'ERROR_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' =>
  array (
    'en' => '',
    'ru' => '',
  ),
));
    }

}
