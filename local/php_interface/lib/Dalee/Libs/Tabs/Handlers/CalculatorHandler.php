<?php
namespace Dalee\Libs\Tabs\Handlers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\SystemException;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class CalculatorHandler implements PropertyHandlerInterface
{
    private array $property;
    private ?int $elementId;

    public function __construct(array $property, ?int $elementId = null)
    {
        $this->property = $property;
        $this->elementId = $elementId;
    }

    public function render(): string
    {
        $this->checkElementExists();

        ob_start();
        $GLOBALS['APPLICATION']->IncludeComponent(
            "dalee:calculator",
            $this->property['VALUE_XML_ID'],
            [
                "CALCULATOR_ELEMENT_ID" => $this->elementId
            ]
        );
        $displayValue = ob_get_contents();
        ob_end_clean();

        return $displayValue;
    }

    /**
     * @return void
     * @throws SystemException
     */
    private function checkElementExists(): void
    {
        if (!empty($this->property['VALUE_XML_ID'])) {
            $iblockCode = $this->property['VALUE_XML_ID'];
            $iblockId = iblock($iblockCode);

            if ($iblockId && !empty($this->elementId)) {
                $elementExists = ElementTable::getList([
                    'filter' => [
                        'ID' => $this->elementId,
                        'IBLOCK_ID' => $iblockId
                    ],
                    'select' => [
                        'ID'
                    ]
                ])->fetch();

                if (!$elementExists) {
                    $this->elementId = null;
                }
            }
        }
    }
}
