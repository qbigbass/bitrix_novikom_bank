<?php

namespace Dalee\Entities;

use Bitrix\Main\Entity\DatetimeField;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\StringField;

class CaptchaTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'b_captcha';
    }

    public static function getMap(): array
    {
        return [
            new StringField('ID', ['primary' => true]),
            new StringField('CODE'),
            new StringField('IP'),
            new DatetimeField('DATE_CREATE'),
        ];
    }
}
