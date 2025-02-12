<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class TariffsHandler implements PropertyHandlerInterface
{
    private string $tariffs;

    public function __construct(array $property)
    {
        $this->tariffs = $property['~VALUE']['TEXT'];
    }

    public function render(): string
    {
        return $this->tariffs;
    }
}
