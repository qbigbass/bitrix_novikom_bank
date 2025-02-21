<?php
namespace Dalee\Libs\Tabs;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class TabContent
{
    private static string $openedRteTag = '<div class="rte">';
    private static string $closedRteTag = '</div>';

    public static function render(
        string $detailText,
        array $displayProperties,
        ?int $elementId = null,
        bool $useRteTag = true,
        ?array $element = null,
        bool $isAccordion = false,
        array $params = []
    ): string
    {
        $tab = new TabContent();
        $conf = require 'config/handlers.php';

        if ($isAccordion) {
            self::$openedRteTag = '<div class="rte rte--accordion">';
        }

        if (!$useRteTag) {
            $tabContent = $detailText;
        } else {
            $tabContent = self::$openedRteTag . $detailText . self::$closedRteTag;
        }

        foreach ($displayProperties as $property) {
            $propertyCode = $property['CODE'];
            $class = $conf[$propertyCode];
            $placeHolder = '#' . $propertyCode . '#';

            if (!empty($class) && str_contains($detailText, $placeHolder)) {
                $handler = new $class($property, $elementId, $element, $params);
                $tabContent = $tab->renderDetailTextWithBlockHtml($handler, $tabContent, $placeHolder, $useRteTag, $isAccordion);
            }
        }

        return $tab->prepareTabContent($tabContent);
    }

    private function renderDetailTextWithBlockHtml(PropertyHandlerInterface $handler, string $tabContent, string $placeHolder, bool $useRteTag = true, bool $isAccordion = false): string
    {
        if (!$useRteTag) {
            $params['TEMPLATE'] = 'benefits_other_services';
            $blockHtml = $handler->render($params);
        } else {
            $blockHtml = self::$closedRteTag . $handler->render(['isAccordion' => $isAccordion]) . self::$openedRteTag;
        }

        return str_replace(
            [
                $placeHolder . '<br>',
                $placeHolder,
            ],
            $blockHtml,
            $tabContent
        );
    }

    private function prepareTabContent(string $tabContent): string
    {
        $regex = '/<div\s+class="rte(?:\s+rte--accordion)?">\s*<\/div>/';
        $tabContent = preg_replace($regex, '', $tabContent);

        return str_replace(
            [
                "\r",
                "\n",
            ],
            '',
            $tabContent
        );
    }
}
