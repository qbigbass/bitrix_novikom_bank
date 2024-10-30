<?php

namespace Dalee\Helpers;

class ElementDTO
{
    public ?int $id;
    public ?string $name;
    public ?string $code;
    public ?string $previewPicture;
    public ?string $previewText;
    public ?string $detailText;
    public ?array $properties;
    public ?string $iblockId;
    public ?array $elements;

    public function __construct(?int $id, ?string $name = null, ?string $code = null, ?string $previewPicture = null, ?string $previewText = null, ?string $detailText = null, ?array $properties = null)
    {
        $this->setIfNotEmpty('id', $id);
        $this->setIfNotEmpty('name', $name);
        $this->setIfNotEmpty('code', $code);
        $this->setIfNotEmpty('previewPicture', $previewPicture);
        $this->setIfNotEmpty('previewText', $previewText);
        $this->setIfNotEmpty('detailText', $detailText);
        $this->setIfNotEmpty('properties', $properties);
    }

    private function setIfNotEmpty(string $property, $value): void
    {
        if (!empty($value)) {
            $this->$property = $value;
        }
    }

    public function addProperty(ElementPropertyDTO $property): void
    {
        $this->properties[$property->code][] = $property;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}

