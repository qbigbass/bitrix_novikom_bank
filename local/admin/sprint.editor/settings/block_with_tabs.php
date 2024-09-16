<?php
/*
 * этот файл перезаписывается при обновлениях
 * используйте его в качестве примера
 */

$settings = [
    'title' => 'Блок с табами',

    //Настройки блоков
    'block_settings'   => [
        'my_questions_and_answers' => [
            'enabled_iblock' => [
                'type'  => 'hidden',
                'value' => iblock('qa'),
            ]
        ],
        'my_documents' => [
            'enabled_iblock' => [
                'type'  => 'hidden',
                'value' => iblock('documents'),
            ]
        ],
    ],

    'block_enabled'    => [
        'my_block_with_tabs'
    ],
];
