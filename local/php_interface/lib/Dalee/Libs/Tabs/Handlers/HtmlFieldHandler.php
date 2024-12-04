<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class HtmlFieldHandler implements PropertyHandlerInterface
{
    protected string $html;

    public function __construct(array $property)
    {
        $this->html = $property['~VALUE'];
    }

    public function render(): string
    {
        return $this->html;
    }
}
