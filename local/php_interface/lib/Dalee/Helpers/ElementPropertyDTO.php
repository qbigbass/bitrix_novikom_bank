<?php

namespace Dalee\Helpers;

class ElementPropertyDTO
{
    public ?int $id;
    public ?string $code;
    public ?string $type;
    public ?string $value;
    public ?string $description;
    public ?int $sort;
    public ?string $filePath;

    public function __construct(?int $id, ?string $code, ?string $type, ?string $value, ?string $description, ?int $sort, ?string $filePath)
    {
        $this->setIfNotEmpty('id', $id);
        $this->setIfNotEmpty('code', $code);
        $this->setIfNotEmpty('type', $type);
        $this->setIfNotEmpty('value', $value);
        $this->setIfNotEmpty('description', $description);
        $this->setIfNotEmpty('sort', $sort);
        $this->setIfNotEmpty('filePath', $filePath);
    }

    private function setIfNotEmpty(string $property, $value): void
    {
        if (!empty($value)) {
            $this->$property = $value;
        }
    }
}

