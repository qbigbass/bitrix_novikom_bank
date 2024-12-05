<?php
/*
 * Конфиг содержит сопоставление кодов свойств инфоблока tabs с соответствующим обработчиком
 *
 * При добавлении нового свойства, необходимо создать обработчик,
 * и добавить его в конфиг для корректного отображения
 */

return [
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
    'COMPLEX_PROP' => Dalee\Libs\Tabs\Handlers\ComplexPropertyHandler::class,
    'CONDITIONS_TABS' => Dalee\Libs\Tabs\Handlers\ConditionTabsHandler::class,
    'TARIFFS' => Dalee\Libs\Tabs\Handlers\TariffsHandler::class,
];
