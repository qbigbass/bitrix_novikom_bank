<?php

namespace Dalee\Services;

class ContentPlaceholderManager
{
    private array $placeholdersValues = [];
    private array $placeholdersMatches = [];
    private array $properties;
    private array $templates;

    public function __construct(array $templates)
    {
        $this->properties = array_keys($templates);
        $this->templates = $templates;
    }

    /**
     * @param array $arResult
     * @return void
     */
    public function processResult(array $arResult): void
    {
        foreach ($arResult['DISPLAY_PROPERTIES'] as $code => $arProperty) {
            if (!in_array($code, $this->properties)) {
                continue;
            }

            $property = $this->processProperty($arProperty);
            $this->placeholdersValues[$code] = $property;

            foreach (array_keys($property) as $placeholder) {
                $this->placeholdersMatches[$placeholder] = $code;
            }
        }
    }

    /**
     * @param array $property
     * @return string|array
     */
    private function processProperty(array $property): string|array
    {
        $descriptions = $property['DESCRIPTION'] ?? [];
        $values = $property['~VALUE'] ?? [];

        $values = $this->processFileValues($property, $values);

        if (empty(array_filter($descriptions))) {
            return ['#' . $property['CODE'] . '#' => $values];
        }

        return array_combine($descriptions, $values);
    }

    private function processFileValues(array $property, array $values): array
    {
        $fileValue = $property['FILE_VALUE'] ?? null;

        if (is_array($fileValue)) {
            if (count($values) > 1) {
                return array_map(fn($file) => $file['SRC'] ?? '', $fileValue);
            }

            return [$fileValue['SRC'] ?? ''];
        }

        return $values;
    }

    /**
     * @param string $text
     * @return void
     */
    public function renderHtml(string $text): void
    {
        preg_match_all('/#([a-zA-Z0-9_-]+)#/', $text, $matches);
        $placeholders = $matches[0];

        foreach ($placeholders as $placeholder) {
            $propertyCode = $this->placeholdersMatches[$placeholder] ?? null;

            if (!$propertyCode || !isset($this->templates[$propertyCode])) {
                $text = str_replace($placeholder, '', $text);
                continue;
            }

            $text = str_replace(
                $placeholder,
                // заменяем плейсхолдер на замыкание или на пустую строку, если код не найден
                $this->templates[$propertyCode]($this->placeholdersValues[$propertyCode][$placeholder] ?? '') ?? '',
                $text
            );
        }

        echo $text;
    }

    /**
     * @return array
     */
    public function getPlaceholderValues(): array
    {
        return $this->placeholdersValues;
    }

    /**
     * @return array
     */
    public function getPlaceholderMatches(): array
    {
        return $this->placeholdersMatches;
    }
}
