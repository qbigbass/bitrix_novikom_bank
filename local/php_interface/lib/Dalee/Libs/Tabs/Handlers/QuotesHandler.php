<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class QuotesHandler implements PropertyHandlerInterface
{
    protected string $text;

    public function __construct(array $property)
    {
        $this->text = $property['~VALUE']['TEXT'];
    }

    public function render(): string
    {
        return
            '<div class="dark-70 w-100 w-xl-75 rte mt-7 mt-md-7 mt-lg-8">
                <p>' . $this->text . '</p>
            </div>';
    }
}
