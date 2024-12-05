<?php

namespace Dalee\Services;

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

    /**
     * Тело ответа.
     *
     * @var array
     */
    private array $response = [];

    public function __construct(string $table, ?int $elementId = null, ?string $name = null)
    {
        $this->table = $table;
        $this->elementId = $elementId;
        $this->name = $name;

        $iblockId = $this->getIblockId();
        $this->ratesFetcher = new RatesFetcher($iblockId);
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        if ($this->hasError()) {
            return;
        }

        $this->fetchRates();

        if (empty($this->elements)) {
            $this->addError('Нет данных');
            return;
        }

        if ($this->name) {
            $this->elements = $this->filterByName($this->elements, $this->name);
        }

        $this->response = ['data' => $this->transformKeys($this->elements)];
    }

    /**
     * @return void
     */
    private function fetchRates(): void
    {
        $this->ratesFetcher->fetchRates($this->elementId);
        $this->elements = $this->ratesFetcher->getElements() ?: $this->retryFetch();
    }

    /**
     * @return array
     */
    private function retryFetch(): array
    {
        $this->ratesFetcher->fetchRates(null);
        return $this->ratesFetcher->getElements();
    }

    /**
     * @return int|null
     */
    private function getIblockId(): ?int
    {
        $iblock = iblock($this->table . '_rates');
        if (!$iblock) {
            $this->addError('Не удалось получить ID инфоблока');
            $this->getJson();
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
        return array_map(function ($item) {
            $newItem = [];
            foreach ($item as $key => $value) {
                if ($key === 'LINK_' || $key === 'NAME') {
                    continue;
                }

                $key = strtolower(rtrim($key, '_'));
                $key = preg_replace_callback('/_([a-z])/', fn($matches) => strtoupper($matches[1]), $key);

                if (is_string($value)) {
                    $value = trim(preg_replace('/\s*\[.*?]/', '', $value));
                }

                $newItem[$key] = $value;
            }
            return $newItem;
        }, $data);
    }

    /**
     * @param string $message
     * @return void
     */
    private function addError(string $message): void
    {
        $this->response['error'] = $message;
    }

    /**
     * @return bool
     */
    private function hasError(): bool
    {
        return !empty($this->response['error']);
    }

    /**
     * @return void
     */
    public function getJson(): void
    {
        echo json_encode($this->response, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
