<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class CalculatorHandler implements PropertyHandlerInterface
{
    private array $property;
    private int $elementId;

    public function __construct(array $property, ?int $elementId = null)
    {
        $this->property = $property;
        $this->elementId = $elementId;
    }

    public function render(): string
    {
        ob_start();
        $GLOBALS['APPLICATION']->IncludeComponent(
            "dalee:calculator",
            $this->property['VALUE_XML_ID'],
            [
                "CALCULATOR_ELEMENT_ID" => $this->elementId
            ]
        );
        $displayValue = ob_get_contents();
        ob_end_clean();

        return $displayValue;
    }
}
