<?php

namespace Dalee\Services;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;

/**
 * Класс для обработки и преобразования данных ставок продуктов.
 *
 * @package Dalee\Services
 */

class ProductRatesHandler
{
    private array $iblockLinks;
    private array $regions = [];
    private array $linkedIblockElements;

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

        if ($table == 'mortgage') {
            $this->regions = $this->getRegions();
        }

        $this->iblockLinks = [
            'deposits' => iblock('deposits'),
            'loans' => iblock('loans'),
            'mortgage' => iblock('mortgage'),
            'program_bonuses' => iblock('bonus_programs_ru')
        ];

        $this->linkedIblockElements = $this->getElementNames();

        $iblockId = $this->getIblockId();
        $this->ratesFetcher = new RatesFetcher($iblockId);
    }

    private function getRegions(): array
    {
        Loader::includeModule("highloadblock");

        $hlblock = HighloadBlockTable::getList([
            "filter" => [
                '=TABLE_NAME' => 'b_hlbd_regions'
            ]
        ])->fetch();

        $entity = HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        $res = $entity_data_class::getList([
            'select' => ['UF_NAME', 'UF_XML_ID'],
        ])->fetchAll();

        return array_column($res, 'UF_NAME', 'UF_XML_ID');
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
            $newItem['name'] = $this->linkedIblockElements[$item['LINK_']];
            foreach ($item as $key => $value) {
                if ($key === 'LINK_' || $key === 'NAME') {
                    continue;
                }

                if ($key == 'REGION_' && !empty($this->regions)) {
                    $value = $this->regions[$value] ?? null;
                }

                $key = strtolower(rtrim($key, '_'));
                $key = preg_replace_callback('/_([a-z])/', fn($matches) => strtoupper($matches[1]), $key);

                if (is_string($value)) {
                    $value = trim(preg_replace('/\s*\[.*?]/', '', $value));
                }

                if (is_numeric(str_replace(',', '.', $value))) {
                    $value = (float) str_replace(',', '.', $value);
                }

                $newItem[$key] = $value;
            }
            return $newItem;
        }, $data);
    }

    private function getElementNames()
    {
        $elements = ElementTable::getList([
            'select' => ['ID', 'NAME'],
            'filter' => [
                'IBLOCK_ID' => $this->iblockLinks[$this->table],
            ]
        ])->fetchAll();

        return array_column($elements, 'NAME', 'ID');
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
