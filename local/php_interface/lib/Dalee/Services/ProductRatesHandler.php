<?php

namespace Dalee\Services;

use JetBrains\PhpStorm\NoReturn;

/**
 * Класс для обработки и преобразования данных ставок продуктов.
 *
 * @package Dalee\Services
 */

class ProductRatesHandler
{
    /**
     * Таблица данных для обработки.
     *
     * Возможные значения:
     * - 'deposits' — депозиты
     * - 'loans' — кредиты
     * - 'mortgage' — ипотека
     * - 'program_bonuses' — бонусные программы
     *
     * @var string
     */
    private string $table;

    /**
     * ID продукта для фильтрации данных (если указан).
     *
     * @var ?int
     */
    private ?int $elementId;

    /**
     * Название продукта для фильтрации данных (если указано).
     *
     * @var ?string
     */
    private ?string $name;

    /**
     * Объект для получения данных ставок.
     *
     * @var RatesFetcher
     */
    private RatesFetcher $ratesFetcher;

    /**
     * Элементы, полученные после обработки данных.
     *
     * @var array
     */
    private array $elements = [];

    public function __construct(string $table, ?int $elementId = null, ?string $name = null)
    {
        $this->table = $table;
        $this->elementId = $elementId;
        $this->name = $name;

        $iblockId = $this->getIblockId();
        $this->ratesFetcher = new RatesFetcher($iblockId);
    }

    /**
     * @return array[]|string[]
     */
    public function handle(): array
    {
        $this->fetchRates();

        if (empty($this->elements)) {
            return ['error' => 'Нет данных'];
        }

        if (!empty($this->name)) {
            $this->elements = $this->filterByName($this->elements, $this->name);
        }

        return ['data' => $this->transformKeys($this->elements)];
    }

    /**
     * @return void
     */
    #[NoReturn] public function json(): void
    {
        $response = $this->handle();
        header('Content-Type: application/json');
        die(json_encode($response));
    }

    /**
     * @return void
     */
    private function fetchRates(): void
    {
        $this->ratesFetcher->fetchRates($this->elementId);
        $this->elements = $this->ratesFetcher->getElements();

        if (empty($this->elements)) {
            $this->ratesFetcher->fetchRates(null);
            $this->elements = $this->ratesFetcher->getElements();
        }
    }

    /**
     * @return string
     */
    private function getIblockId(): string
    {
        $iblock = iblock($this->table . '_rates');

        if (!$iblock) {
            echo json_encode(['error' => 'Не удалось получить ID инфоблока']);
            exit;
        }

        return $iblock;
    }

    /**
     * @param array $data
     * @param string $filter
     * @return array
     */
    private function filterByName(array $data, string $filter): array
    {
        return array_values(array_filter($data, fn($item) => isset($item['NAME']) && mb_stripos($item['NAME'], $filter) !== false));
    }

    /**
     * @param array $data
     * @return array
     */
    private function transformKeys(array $data): array
    {
        $result = [];
        foreach ($data as $item) {
            $newItem = [];
            foreach ($item as $key => $value) {
                if ($key == "LINK_" || $key == "NAME") continue;

                $key = rtrim($key, '_');
                $parts = explode('_', strtolower($key));
                $camelCaseKey = array_shift($parts);

                foreach ($parts as $part) {
                    $camelCaseKey .= ucfirst($part);
                }

                if (is_string($value)) {
                    $value = preg_replace('/\s*\[.*?]/', '', $value);
                    $value = trim($value);
                }

                $newItem[$camelCaseKey] = $value;
            }
            $result[] = $newItem;
        }
        return $result;
    }
}
