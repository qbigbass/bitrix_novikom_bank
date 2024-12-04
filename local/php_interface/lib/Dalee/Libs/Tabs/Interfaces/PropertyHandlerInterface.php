<?php
namespace Dalee\Libs\Tabs\Interfaces;

interface PropertyHandlerInterface {
    public function __construct(array $property);
    public function render(): string;
}
