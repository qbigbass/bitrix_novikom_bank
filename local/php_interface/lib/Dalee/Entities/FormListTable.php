<?php
namespace Dalee\Entities;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\BooleanField;
use Bitrix\Main\ORM\Fields\StringField;

class FormListTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'b_hlbd_formlist';
    }

    public static function getMap(): array
    {
        return [
            new StringField('ID', ['primary' => true]),
            new StringField('UF_XML_ID'),
            new StringField('UF_NAME'),
            new StringField('UF_DESCRIPTION'),
            new StringField('UF_FULL_DESCRIPTION'),
            new BooleanField('UF_DEF'),
        ];
    }
}
