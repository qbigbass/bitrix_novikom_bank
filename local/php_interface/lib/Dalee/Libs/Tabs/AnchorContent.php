<?php
namespace Dalee\Libs\Tabs;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class AnchorContent
{
    public static function render(
        string $detailText,
        array $displayProperties,
        ?int $elementId = null,
        array $params = []
    ): string
    {
        $anchor = new AnchorContent();
        $conf = require 'config/handlers.php';
        $anchorContent = $detailText;

        foreach ($displayProperties as $property) {
            $propertyCode = $property['CODE'];
            $class = $conf[$propertyCode];
            $placeHolder = '#' . $propertyCode . '#';

            if (!empty($class) && str_contains($detailText, $placeHolder)) {
                $handler = new $class($property, $elementId);
                $anchorContent = $anchor->renderDetailTextWithBlockHtml($handler, $anchorContent, $placeHolder, $params);
            }
        }

        return $anchor->prepareAnchorContent($anchorContent);
    }

    private function renderDetailTextWithBlockHtml(
        PropertyHandlerInterface $handler,
        string $anchorContent,
        string $placeHolder,
        array $params = []
    ): string
    {
        if ($placeHolder === '#BENEFITS#') {
            $blockHtml = '<div class="row row-gap-6 gx-xl-6 px-lg-6">' . $handler->render($params) . '</div>';
        } else {
            $blockHtml = $handler->render($params);
        }

        return str_replace(
            [
                $placeHolder . '<br>',
                $placeHolder,
            ],
            $blockHtml,
            $anchorContent
        );
    }

    private function prepareAnchorContent(string $anchorContent): string
    {
        return str_replace(
            [
                "\r",
                "\n",
            ],
            '',
            $anchorContent
        );
    }
}

