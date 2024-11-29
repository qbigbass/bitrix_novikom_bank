<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class ConditionsHandler implements PropertyHandlerInterface
{
    private array $property;

    public function __construct(array $property)
    {
        $this->property = $property;
    }

    public function render(): string
    {
        return
            '<div class="table-tab cell-2">
                <div class="table-tab__body">'
                    . $this->getConditionsHtml() .
                '</div>
            </div>';
    }

    private function getConditionsHtml(): string
    {
        $conditions = '';
        foreach ($this->property['~VALUE'] as $key => $value) {
            $conditions .=
                '<div class="table-tab__row">
                    <div class="table-tab__cell text-l fw-semibold dark-70">' . $this->property['~DESCRIPTION'][$key] . '</div>
                    <div class="table-tab__cell text-l">' . $value['TEXT'] . '</div>
                </div>';
        }

        return $conditions;
    }
}
