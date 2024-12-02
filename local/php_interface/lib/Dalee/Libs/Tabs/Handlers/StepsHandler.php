<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class StepsHandler implements PropertyHandlerInterface
{
    private array $property;

    public function __construct(array $property)
    {
        $this->property = $property;
    }

    public function render(): string
    {
        return
            '<div class="row row-gap-6 mb-6 mb-md-9 mb-lg-11">
                <div class="stepper steps-2">'
                    . $this->getStepsHtml() .
                '</div>
            </div>';
    }

    private function getStepsHtml(): string
    {
        $result = '';
        foreach ($this->property['~VALUE'] as $index => $value) {
            $result .=
                '<div class="stepper-item stepper-item--color-green">
                    <div class="stepper-item__header">
                        <div class="stepper-item__number">
                            <div class="stepper-item__number-value">' . $index + 1 . '</div>
                            <div class="stepper-item__number-icon">'
                                . getStepperIcons($index) .
                            '</div>
                        </div>
                        <div class="stepper-item__arrow"></div>
                    </div>
                    <div class="stepper-item__content">
                        <p class="text-l mb-0">' . $value['TEXT'] . '</p>
                    </div>
                </div>';
        }

        return $result;
    }
}
