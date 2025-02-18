<?php
/*
 * Конфиг содержит сопоставление кодов свойств инфоблока tabs с соответствующим обработчиком
 *
 * При добавлении нового свойства, необходимо создать обработчик,
 * и добавить его в конфиг для корректного отображения
 */

return [
    'CALCULATOR' => Dalee\Libs\Tabs\Handlers\CalculatorHandler::class,
    'BENEFITS' => Dalee\Libs\Tabs\Handlers\BenefitsHandler::class,
    'CONDITIONS' => Dalee\Libs\Tabs\Handlers\ConditionsHandler::class,
    'STEPS' => Dalee\Libs\Tabs\Handlers\StepsHandler::class,
    'SHORT_INFO' => Dalee\Libs\Tabs\Handlers\ShortInfoHandler::class,
    'RATES_DESCRIPTION' => Dalee\Libs\Tabs\Handlers\RatesDescriptionHandler::class,
    'ICONS_WITH_DESCRIPTION' => Dalee\Libs\Tabs\Handlers\IconsWithDescriptionHandler::class,
    'DOCUMENTS' => Dalee\Libs\Tabs\Handlers\DocumentsHandler::class,
    'QUESTIONS' => Dalee\Libs\Tabs\Handlers\QuestionsHandler::class,
    'QUOTES' => Dalee\Libs\Tabs\Handlers\QuotesHandler::class,
    'HTML' => Dalee\Libs\Tabs\Handlers\HtmlFieldHandler::class,
    'CONDITIONS_TABS' => Dalee\Libs\Tabs\Handlers\ConditionTabsHandler::class,
    'TARIFFS' => Dalee\Libs\Tabs\Handlers\TariffsHandler::class,
    'STRATEGIES' => Dalee\Libs\Tabs\Handlers\StrategiesHandler::class,
    'BENEFITS_SLIDER' => Dalee\Libs\Tabs\Handlers\BenefitsSliderHandler::class,
    'ACCORDION' => Dalee\Libs\Tabs\Handlers\AccordionHandler::class,
];
