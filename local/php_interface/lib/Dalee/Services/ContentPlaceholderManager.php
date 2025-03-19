<?php

namespace Dalee\Services;

class ContentPlaceholderManager
{
    private array $placeholdersValues = [];
    private array $placeholdersMatches = [];
    private array $properties;
    private array $templates;
    private string $openTag = '<div class="rte rte--w-xxl-60 px-lg-6">';
    private string $closeTag = '</div>';

    public function __construct(array $templates, ?bool $fullWidth = false)
    {
        $this->properties = array_keys($templates);
        $this->templates = $templates;
        if ($fullWidth) {
            $this->openTag = '<div class="rte">';
        }
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

        // Блок с инфоврезками
        for ($index = 1; $index <= 3; $index++) {
            if (!empty($arResult['DISPLAY_PROPERTIES']['QUOTE_TEXT_' . $index]['~VALUE'])) {
                $this->placeholdersValues['QUOTE_TEXT']['#QUOTE_TEXT_' . $index . '#'] =
                    $arResult['DISPLAY_PROPERTIES']['QUOTE_TEXT_' . $index]['~VALUE'];
                if (!empty($arResult['DISPLAY_PROPERTIES']['QUOTE_HEADER_' . $index]['~VALUE'])) {
                    $this->placeholdersValues['QUOTE_TEXT']['#QUOTE_TEXT_' . $index . '#']['TEXT'] =
                    '<h4 class="mb-4">' . $arResult['DISPLAY_PROPERTIES']['QUOTE_HEADER_' . $index]['~VALUE'] . '</h4>' .
                    $this->placeholdersValues['QUOTE_TEXT']['#QUOTE_TEXT_' . $index . '#']['TEXT'];
                }
                $this->placeholdersMatches['#QUOTE_TEXT_' . $index . '#'] = 'QUOTE_TEXT';
            }
        }

        // Блок с цитатами
        for ($index = 1; $index <= 3; $index++) {
            if (!empty($arResult['DISPLAY_PROPERTIES']['EXCERPT_TEXT_' . $index]['~VALUE'])) {
                $this->placeholdersValues['EXCERPT_TEXT']['#EXCERPT_TEXT_' . $index . '#'] =
                    $arResult['DISPLAY_PROPERTIES']['EXCERPT_TEXT_' . $index]['~VALUE'];
                if (!empty($arResult['DISPLAY_PROPERTIES']['EXCERPT_HEADER_' . $index]['~VALUE'])) {
                    $this->placeholdersValues['EXCERPT_TEXT']['#EXCERPT_TEXT_' . $index . '#']['TEXT'] =
                        '<h4 class="mb-4">' . $arResult['DISPLAY_PROPERTIES']['EXCERPT_HEADER_' . $index]['~VALUE'] . '</h4>' .
                        $this->placeholdersValues['EXCERPT_TEXT']['#EXCERPT_TEXT_' . $index . '#']['TEXT'];
                }
                $this->placeholdersMatches['#EXCERPT_TEXT_' . $index . '#'] = 'EXCERPT_TEXT';
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
                return $fileValue;
            }

            return [$fileValue];
        }

        return $values;
    }

    /**
     * @param string $text
     * @return void
     */
    public function renderHtml(string $text): void
    {
        $text = $this->openTag . $text . $this->closeTag;
        preg_match_all('/#([a-zA-Z0-9_-]+)#/', $text, $matches);
        $placeholders = $matches[0];

        foreach ($placeholders as $placeholder) {
            $propertyCode = $this->placeholdersMatches[$placeholder] ?? null;

            if (!$propertyCode || !isset($this->templates[$propertyCode])) {
                $text = str_replace($placeholder, '', $text);
                continue;
            }

            $replaceHtml = $this->templates[$propertyCode]($this->placeholdersValues[$propertyCode][$placeholder] ?? '');

            $text = str_replace(
                $placeholder,
                !empty($replaceHtml) ? $this->closeTag . $replaceHtml . $this->openTag : '',
                $text
            );
        }

        echo $this->cleanUpText($text);
    }

    /**
     * @param string $text
     * @return string
     */
    private function cleanUpText(string $text): string
    {
        return str_replace(
            [
                "\r",
                "\n",
                $this->openTag . "<br>" . $this->closeTag,
                $this->openTag . $this->closeTag,
            ],
            '',
            $text
        );
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
