<?php

namespace Dalee\Helpers\ComponentRenderer;

use CBitrixComponent;
use CMain;
use Dalee\Helpers\ComponentRenderer\Interface\ComponentInterface;
use InvalidArgumentException;

class Renderer
{
    private CMain $application;
    private CBitrixComponent|bool $component;
    private array $filter = [
        'ACTIVE' => 'Y',
    ];

    public function __construct(CMain $application, CBitrixComponent|bool $component = false)
    {
        $this->application = $application;
        $this->component = $component;
    }

    public function render(string $componentName, ?array $ids = null, ?string $sectionCode = null, ?array $params = []): void
    {
        $componentClass = "Dalee\\Helpers\\ComponentRenderer\\Components\\$componentName";
        if (!class_exists($componentClass)) {
            throw new InvalidArgumentException("Класс $componentClass не существует");
        } elseif (!is_subclass_of($componentClass, ComponentInterface::class)) {
            throw new InvalidArgumentException("Класс $componentClass должен реализовывать ComponentInterface");
        }

        $filter = empty($sectionCode) ? $this->setFilterIds($componentName, $ids) : $this->setFilterSection($componentName, $sectionCode);

        $componentClass::render($this->application, $this->component, $filter, $params);
    }

    private function setFilterIds(string $prefix, ?array $ids): string
    {
        $filterName = $prefix . 'Filter';
        $GLOBALS[$filterName] = $this->filter;

        if (!is_null($ids)) {
            $GLOBALS[$filterName]['ID'] = $ids;
        }

        return $filterName;
    }

    private function setFilterSection(string $prefix, ?string $sectionCode): string
    {
        $filterName = $prefix . 'Filter';
        $GLOBALS[$filterName] = $this->filter;

        if (!is_null($sectionCode)) {
            $GLOBALS[$filterName]['SECTION_CODE'] = $sectionCode;
        }

        return $filterName;
    }
}
