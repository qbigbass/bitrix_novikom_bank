<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;
use Dalee\Helpers\ComponentRenderer\Renderer;

class StepsHandler implements PropertyHandlerInterface
{
    private array $property;
    private ?array $element;

    public function __construct(array $property, ?int $elementId = null, ?array $element = null, array $params = [])
    {
        $this->property = $property;
        $this->element = $element;
    }

    public function render(): string
    {
        global $APPLICATION;
        if (empty($APPLICATION->GetProperty("stepperItemColor"))) {
            $APPLICATION->SetPageProperty("stepperItemColor", 'stepper-item--color-green');
        }
        $renderer = new Renderer($APPLICATION);

        ob_start();

        $renderer->render('Steps', null, null, [
            'parentSection' => $this->property['VALUE'],
            'stepsHeader' => $this->element['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
            'stepsTemplate' => 'variants',
        ]);

        return ob_get_clean();
    }
}
