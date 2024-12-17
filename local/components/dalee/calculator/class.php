<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class Calculator extends CBitrixComponent
{
    public function executeComponent()
    {
        return $this->includeComponentTemplate();
    }
}
