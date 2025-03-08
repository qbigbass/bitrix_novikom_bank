<?php
namespace Dalee\Helpers;

class Forms
{
    private array $formCodes = [];
    public function includeForm(string $code): void
    {
        if (!$this->isCodeExists($code)) {
            $this->formCodes[] = $code;
        }
    }

    private function isCodeExists(string $code): bool
    {
        return in_array($code, $this->formCodes);
    }

    public function showAll(): void
    {
        global $APPLICATION;

        ob_start();
        foreach ($this->formCodes as $code) {
            $APPLICATION->IncludeComponent(
                "dalee:form",
                $code,
                [
                    "FORM_CODE" => $code,
                ]
            );
        }
        echo ob_get_clean();
    }
}
