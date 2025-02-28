<?php

namespace Dalee\Libs\Tabs\Handlers;

use CIBlockSection;
use Dalee\Helpers\IblockHelper;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class QuestionsHandler implements PropertyHandlerInterface
{
    private array $property;
    /** @var array Элемент ИБ Вкладок*/
    private array $element;
    /** @var string Ссылка на все вопросы */
    private string $qaLinlk;

    public function __construct(array $property, ?int $elementId = null, ?array $element = null)
    {
        $this->property = $property;
        if (empty($this->property['LINK_ELEMENT_VALUE'])) {
            $this->property['LINK_ELEMENT_VALUE'] = $this->getElements($this->property['VALUE']);
        }
        $this->qaLinlk = '';
        if($element){
            $this->element = $element;
            $this->qaLinlk = $this->getQALink();
        }

    }

    /**
     * Получаем ссылку на все вопросы и ответы
     *
     * @return string
     */
    private function getQALink(): string
    {
        if ($qaSectionID = $this->element['PROPERTIES']['QA_ELEMENT']['VALUE']) {
            if ($section = CIBlockSection::GetByID($qaSectionID)->GetNext()) {
                return $section['SECTION_PAGE_URL'];
            }
        }
        return '';
    }

    public function render(array $params = []): string
    {
        global $APPLICATION;
        $path = array_values(array_filter(explode('/', $APPLICATION->GetCurPage())));
        $current = array_pop($path);
        $parent = reset($path);

        ob_start(); ?>

        <div class="col-12 col-xxl-8">
            <div class="accordion" id="accordion-<?= $this->property['ID'] ?>">
                <?= $this->getQuestionsHtml() ?>
                <?
                if(!empty($this->qaLinlk)) {
                    ?>
                    <a class="btn btn-link btn-lg-lg d-inline-flex gap-2 align-items-center mt-4 mt-md-6 section-custom-accordion__button-more"
                        href="<?=$this->qaLinlk?>#links">
                        <span class="text-m">Все вопросы и ответы</span>
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                        </svg>
                    </a>
                    <?
                }
                ?>
            </div>
        </div>
        <? if (empty($params['isAccordion'])) { ?>
            <div class="col-12 col-xxl-4">
                <?= $this->getRequestCallFormHtml() ?>
            </div>
        <? }

        return ob_get_clean();
    }

    private function getQuestionsHtml(): string
    {
        $questionsHtml = '';
        foreach ($this->property['LINK_ELEMENT_VALUE'] as $question) {
            $questionsHtml .=
                '<div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#' . $question['ID'] . '" aria-controls="' . $question['ID'] . '">'
                . $question['NAME'] .
                '</button>
                    </div>
                    <div class="accordion-collapse collapse" id="' . $question['ID'] . '" data-bs-parent="#accordion-' . $this->property['ID'] . '">
                        <div class="accordion-body">
                            <p class="text-m mb-0 dark-70">'
                . $question['PREVIEW_TEXT'] .
                '</p>
                        </div>
                    </div>
                </div>';
        }

        return $questionsHtml;
    }

    private function getRequestCallFormHtml(): string
    {
        ob_start();
        $arParams['BACKGROUND_COLOR'] = 'blue-10';
        include $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/request_call_form.php';
        $displayValue = ob_get_contents();
        ob_end_clean();
        return $displayValue;
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
}
