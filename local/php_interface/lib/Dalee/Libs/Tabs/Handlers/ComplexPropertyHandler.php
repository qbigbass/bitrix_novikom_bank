<?php
namespace Dalee\Libs\Tabs\Handlers;

use CFile;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class ComplexPropertyHandler implements PropertyHandlerInterface
{
    private array $property;

    public function __construct(array $property)
    {
        $this->property = $property;
    }

    public function render(): string
    {
        return
            '<div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-insurance-more">'
                . $this->getAccordionItemsHtml() .
            '</div>';
    }

    private function getAccordionItemsHtml(): string
    {
        $accordionItems = '';
        foreach ($this->property['~VALUE'] as $key => $value) {
            $accordionItems .=
                '<div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#' . $key . '" aria-controls="' . $key . '">
                            <span class="h4">' . $value['SUB_VALUES']['COMPLEX_HEADER']['~VALUE'] . '</span>
                        </button>
                    </div>
                    <div class="accordion-collapse collapse" id="' . $key . '" data-bs-parent="#accordion-insurance-more">
                        <div class="accordion-body">
                            <div class="rte rte--accordion">'
                                . $this->getSubValuesHtml($value) .
                            '</div>
                        </div>
                    </div>
                </div>';
        }

        return $accordionItems;
    }

    private function getSubValuesHtml(array $value): string
    {
        $subValues = '';
        foreach ($value['SUB_VALUES'] as $subKey => $subValue) {
            switch ($subKey) {
                case 'COMPLEX_TEXT_FIELD':
                    $subValues .= $this->getTextFieldHtml($subValue);
                    break;
                case 'COMPLEX_LIST':
                    $complexListHeader = $value['SUB_VALUES']['COMPLEX_LIST_HEADER']['~VALUE'] ?? '';
                    $subValues .= $this->getListHtml($subValue, $complexListHeader);
                    break;
                case 'COMPLEX_FILE':
                    $complexFileHeader = $value['SUB_VALUES']['COMPLEX_HEADER_FILE']['~VALUE'] ?? '';
                    $subValues .= $this->getFileHtml($subValue, $complexFileHeader);
                    break;
            }
        }

        return $subValues;
    }

    private function getTextFieldHtml(array $value): string
    {
        $textFieldHtml = '';
        if (!empty($value['~VALUE']['TEXT'])) {
            $textFieldHtml = $value['~VALUE']['TEXT'];
        }

        return $textFieldHtml;
    }

    private function getListHtml(array $value, string $complexListHeader): string
    {
        $listHtml = '';

        if (!empty($value['~VALUE']['TEXT'])) {
            $listHtml =
                '<div>
                    <div class="text-l fw-semibold mb-3">' . $complexListHeader . '</div>'
                    . $value['~VALUE']['TEXT'] .
                '</div>';
        }

        return $listHtml;
    }

    private function getFileHtml(array $value, string $complexFileHeader): string
    {
        $fileHtml = '';

        if (!empty($value['VALUE'])) {
            $file = CFile::GetFileArray($value['VALUE']);
            $fileData = explode('.', $file['ORIGINAL_NAME']);
            $fileName = $fileData[0];
            $fileType = $fileData[1];

            $fileHtml =
                '<div>
                    <h5>' . $complexFileHeader . '</h5>
                    <div class="link-list">
                        <a class="d-flex flex-column gap-1 py-3 document-download text-m" href="' . $file['SRC'] . '" download="'. $fileName .'">'
                            . $fileName .
                            '<div class="d-flex gap-1 align-items-center">
                                <div class="document-download__file caption-m dark-70">
                                    <span class="document-download__date-time">' . date('d.m.Y H:i', strtotime($file['TIMESTAMP_X'])) . '</span>
                                    <span class="document-download__file-type">' . mb_strtoupper($fileType) . '</span>
                                </div>
                                <span class="icon size-s text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>';
        }

        return $fileHtml;
    }
}
