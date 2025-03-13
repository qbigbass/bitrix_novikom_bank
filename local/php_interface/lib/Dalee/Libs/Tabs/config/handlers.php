<?php
/*
 * Конфиг содержит сопоставление кодов свойств инфоблока tabs с соответствующим обработчиком
 *
 * При добавлении нового свойства, необходимо создать обработчик,
 * и добавить его в конфиг для корректного отображения
 */

return [
    'DOCUMENTS' => Dalee\Libs\Tabs\Handlers\DocumentsHandler::class,
    'ACCORDION' => Dalee\Libs\Tabs\Handlers\AccordionHandler::class,
    'CALCULATOR' => Dalee\Libs\Tabs\Handlers\CalculatorHandler::class,
    'ICONS_WITH_DESCRIPTION' => Dalee\Libs\Tabs\Handlers\IconsWithDescriptionHandler::class,
    'STEPS' => Dalee\Libs\Tabs\Handlers\StepsHandler::class,
    'SHORT_INFO' => Dalee\Libs\Tabs\Handlers\ShortInfoHandler::class,
    'QUOTES' => Dalee\Libs\Tabs\Handlers\QuotesHandler::class,
    'QUESTIONS' => Dalee\Libs\Tabs\Handlers\QuestionsHandler::class,
    'BENEFITS' => Dalee\Libs\Tabs\Handlers\BenefitsHandler::class,
    'STRATEGIES' => Dalee\Libs\Tabs\Handlers\StrategiesHandler::class,
];
