<?php

namespace Dalee\Helpers\ComponentRenderer\Interface;

use CBitrixComponent;
use CMain;

interface ComponentInterface
{
    public static function render(CMain $application, CBitrixComponent|bool $component, string $filter, ?array $params = []): void;
}
