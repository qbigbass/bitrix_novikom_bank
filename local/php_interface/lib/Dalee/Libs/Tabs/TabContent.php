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

        if (preg_match('/#ACCORDION\|([^#]+)#/', $detailText, $matches) || $isAccordion) {
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
                $tabContent = $tab->renderDetailTextWithBlockHtml($handler, $tabContent, $placeHolder, $useRteTag);
            }
        }

        if (!empty($matches)) {
            $class = $conf['ACCORDION'];
            $placeHolder = $matches[0];
            $elementCodes = explode('|', $matches[1]);
            $handler = new $class($elementCodes);
            $tabContent = $tab->renderDetailTextWithBlockHtml($handler, $tabContent, $placeHolder, $useRteTag);
        }

        return $tab->prepareTabContent($tabContent);
    }

    private function renderDetailTextWithBlockHtml(PropertyHandlerInterface $handler, string $tabContent, string $placeHolder, bool $useRteTag = true): string
    {
        if (!$useRteTag) {
            $params['TEMPLATE'] = 'benefits_other_services';
            $blockHtml = $handler->render($params);
        } else {
            $blockHtml = self::$closedRteTag . $handler->render() . self::$openedRteTag;
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
        $tabContent = preg_replace(
            sprintf('/%s[\s\r\n]*%s/s', preg_quote(self::$openedRteTag, '/'), preg_quote(self::$closedRteTag, '/')),
            '',
            $tabContent
        );

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
