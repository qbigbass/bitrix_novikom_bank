<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class QuestionsHandler implements PropertyHandlerInterface
{
    private array $property;

    public function __construct(array $property)
    {
        $this->property = $property;
    }

    public function render(): string
    {
        return
            '<div class="col-12 col-xxl-8">
                <div class="accordion" id="accordion-' . $this->property['ID'] . '">'
                    . $this->getQuestionsHtml() .
                    '<a class="btn btn-link btn-lg-lg d-inline-flex gap-2 align-items-center mt-4 mt-md-6 section-custom-accordion__button-more" href="#">
                        <span class="text-m">Все вопросы и ответы</span>
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-xxl-4">'
                . $this->getRequestCallFormHtml() .
            '</div>';
    }

    private function getQuestionsHtml(): string
    {
        $questionsHtml = '';
        foreach ($this->property['LINK_ELEMENT_VALUE'] as $question) {
            $questionsHtml .=
                '<div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#' . $question['ID'] . '" aria-controls="' . $question['ID'] . '">'
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
}
