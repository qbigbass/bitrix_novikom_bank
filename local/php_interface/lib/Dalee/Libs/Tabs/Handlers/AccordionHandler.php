<?php
namespace Dalee\Libs\Tabs\Handlers;

use Bitrix\Iblock\SectionTable;
use Dalee\Helpers\IblockHelper;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;
use Dalee\Libs\Tabs\TabContent;

class AccordionHandler implements PropertyHandlerInterface
{
    private array $elements;
    private int $iblockId;

    public function __construct(array $property)
    {
        $this->iblockId = iblock('tabs');
        $this->elements = $this->getElements($property['VALUE']);
    }

    public function render(): string
    {
        return
            '<div class="accordion accordion--bg-transparent" id="accordion-tab">'
                . $this->getAccordionItemsHtml() .
            '</div>';
    }

    private function getAccordionItemsHtml(): string
    {
        $html = '';

        foreach ($this->elements as $element) {
            $id = htmlspecialchars($element['ID']);
            $name = htmlspecialchars($element['NAME']);
            $itemName = htmlspecialchars($element['~NAME']);
            $subValues = $this->getSubValuesHtml($element);

            $html .= <<<HTML
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#$id"
                            aria-controls="$id"
                            data-item-name="$itemName"
                        >
                            <span class="h4">$name</span>
                        </button>
                    </div>
                    <div class="accordion-collapse collapse" id="$id" data-bs-parent="#accordion-tab">
                        <div class="accordion-body">
                            $subValues
                        </div>
                    </div>
                </div>
                HTML;
        }

        return $html;
    }

    private function getElements(array $elementIds): array
    {
        return IblockHelper::getElementsWithProperties(
            ['SORT' => 'ASC'],
            [
                'ID' => $elementIds,
                'IBLOCK_ID' => $this->iblockId
            ],
            false,
            false,
            [],
            [
                'PROPERTY_FIELDS' => [

                ]
            ]
        )['items'] ?? [];
    }

    private function getSubValuesHtml(array $element): string
    {
        return TabContent::render($element['DETAIL_TEXT'], $element['PROPERTIES'], $element['ID'], true, $element, true);
    }
}
