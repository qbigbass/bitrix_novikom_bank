<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class TariffsHandler implements PropertyHandlerInterface
{
    private array $tariffs;

    public function __construct(array $property)
    {
        $this->tariffs = $this->preparePropertyValue($property['~VALUE']);
    }

    private function preparePropertyValue(array $values): array
    {
        foreach ($values as &$value) {
            $value = json_decode($value, true);
        }

        return $values;
    }

    public function render(): string
    {
        $quantity = (count($this->tariffs) > 2) ? '3' : '2';
        return
            '<div class="swiper js-slider-cards w-100" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:' . $quantity . ',laptop-x:' . $quantity . '" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:40,laptop-x:40">
                <div class="swiper-wrapper js-swiper-wrapper">'
                    . $this->getTariffCardsHtml() .
                '</div>
            </div>';
    }

    private function getTariffCardsHtml(): string
    {
        $cardsHtml = '';
        foreach ($this->tariffs as $tariff) {
            $cardsHtml .=
                '<div class="swiper-slide js-swiper-slide">
                    <div class="card-tariff d-flex flex-column gap-4 bg-dark-10 text-break">
                        <div class="card-tariff__header border-bottom-dashed pb-4">
                            <h4 class="card-tariff__title">' . $tariff['TAB'] . '</h4>
                        </div>
                        <div class="card-tariff__content d-flex flex-column gap-4">'
                            . $this->getTariffParamsHtml($tariff) .
                        '</div>
                    </div>
                </div>';
        }

        return $cardsHtml;
    }

    private function getTariffParamsHtml(array $tariff): string
    {
        $paramsHtml = '';
        foreach ($tariff['VALUES'] as $index => $value) {
            $paramsHtml .=
                '<div class="d-flex flex-column gap-2">
                    <span class="text-s dark-70">' . $value . '</span>
                    <span class="text-m fw-semibold dark-100">' . $tariff['DESCRIPTIONS'][$index] . '</span>
                </div>';
        }

        return $paramsHtml;
    }
}
