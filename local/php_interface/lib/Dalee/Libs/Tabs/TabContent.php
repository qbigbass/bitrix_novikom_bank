<?php
namespace Dalee\Libs\Tabs;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class TabContent
{
    private static string $openedRteTag = '<div class="rte">';
    private static string $closedRteTag = '</div>';

    public static function render(string $detailText, array $displayProperties): string
    {
        $tab = new TabContent();
        $conf = require 'config/handlers.php';
        $tabContent = self::$openedRteTag . $detailText . self::$closedRteTag;

        foreach ($displayProperties as $property) {
            $propertyCode = $property['CODE'];
            $class = $conf[$propertyCode];
            $placeHolder = '#' . $propertyCode . '#';

            if(!empty($class) && str_contains($detailText, $placeHolder)) {
                $handler = new $class($property);
                $tabContent = $tab->renderDetailTextWithBlockHtml($handler, $tabContent, $placeHolder);
            }
        }

        return $tab->prepareTabContent($tabContent);
    }

    private function renderDetailTextWithBlockHtml(PropertyHandlerInterface $handler, string $tabContent, string $placeHolder): string
    {
        $blockHtml = self::$closedRteTag . $handler->render() . self::$openedRteTag;

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
        return str_replace(
            [
                "\r",
                "\n",
                self::$openedRteTag . "<br>" . self::$closedRteTag,
                self::$openedRteTag . self::$closedRteTag,
            ],
            '',
            $tabContent
        );
    }
}
