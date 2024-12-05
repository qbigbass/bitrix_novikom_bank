<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class RatesDescriptionHandler implements PropertyHandlerInterface
{
    private static string $firstColumnName = 'Процент годовых в месяц';
    private static string $secondColumnName = 'Условия';
    private array $description;
    private array $values;

    public function __construct(array $property)
    {
        $this->description = $property['DESCRIPTION'];
        $this->values = $property['~VALUE'];
    }

    public function render(): string
    {
        return
            '<div class="table-adaptive">
                <div class="table-adaptive__header">
                    <div class="table-adaptive__row">
                        <div class="table-adaptive__cell text-s">' . self::$firstColumnName . '</div>
                        <div class="table-adaptive__cell text-s">' . self::$secondColumnName . '</div>
                    </div>
                </div>
                <div class="table-adaptive__body">'
                    . $this->getTableBody() .
                '</div>
            </div>';
    }

    private function getTableBody(): string
    {
        $tableBody = '';
        foreach ($this->values as $index => $value) {
            $tableBody .=
                '<div class="table-adaptive__row">
                    <div class="table-adaptive__cell text-number-l fw-bold">
                        <span class="table-adaptive__label text-s">' . self::$firstColumnName . '</span>
                        <span>' . $this->description[$index] . '</span>
                    </div>
                    <div class="table-adaptive__cell text-l">
                        <span class="table-adaptive__label text-s">' . self::$secondColumnName . '</span>
                        <span>' . $value['TEXT'] . '</span>
                    </div>
                </div>';
        }

        return $tableBody;
    }
}
