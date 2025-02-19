<?php
namespace Dalee\Libs\Tabs\Handlers;

use Bitrix\Iblock\ElementTable;
use CFile;
use Dalee\Helpers\IblockHelper;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class DocumentsHandler implements PropertyHandlerInterface
{
    private int $iblockId;
    private ?array $element;
    private array $property;
    private ?int $firstSectionKey;

    public function __construct(array $property, ?int $elementId = null, ?array $element = null)
    {
        $this->iblockId = iblock("documents");
        $this->property = $property;
        $this->firstSectionKey = is_array($this->property['LINK_SECTION_VALUE'] ?? null)
            ? array_key_first($this->property['LINK_SECTION_VALUE'])
            : null;
        $this->element = $element;
    }

    public function render(): string
    {
        return '
            <div class="col-12 col-xxl-8">
                <div class="accordion" id="accordion-' . $this->property['ID'] . '">'
                    . $this->getSectionsHtml() .
                '</div>
            </div>
            <div class="col-12 col-xxl-4">'
                . $this->getProtectionFromScammersHtml() .
            '</div>';
    }

    private function getSectionsHtml(): string
    {
        $sectionsHtml = '';
        foreach ($this->property['LINK_SECTION_VALUE'] as $key => $section) {
            if (!empty($section['ELEMENTS'])) {
                $buttonShowClass = ($key == $this->firstSectionKey) ? 'show' : 'collapsed';
                $ariaExpanded = ($key == $this->firstSectionKey) ? 'aria-expanded="true"' : '';
                $accordionShowClass = ($key == $this->firstSectionKey) ? 'show' : '';

                $timestampNow = MakeTimeStamp(date('d.m.Y'), 'DD.MM.YYYY');

                $sectionsHtml .=
                    '<div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button ' . $buttonShowClass . '" type="button" data-bs-toggle="collapse" data-bs-target="#' . $section['ID'] . '" aria-controls="' . $section['ID'] . '" ' . $ariaExpanded . '>'
                                 . $section['NAME'] .
                            '</button>
                        </div>
                        <div class="accordion-collapse collapse ' . $accordionShowClass . '" id="' . $section['ID'] . '" data-bs-parent="#accordion-' . $this->property['ID'] . '">
                            <div class="accordion-body">
                                <p class="text-m mb-0 dark-70">'
                                    . $section['DESCRIPTION'] .
                                '</p>
                                <div class="mt-4">'
                                    . $this->getElementsHtml($section['ELEMENTS']) .
                                '</div>';
                $elements = [];
                $withArchive = !empty($this->element['PROPERTIES']['DOCUMENTS_ARCHIVE']['VALUE_XML_ID']);
                if ($withArchive) {
                    foreach ($section['ELEMENTS'] as $element) {
                        $timestampTo = MakeTimeStamp($element['PROPERTIES']['ACTIVE_TO']['VALUE'], 'DD.MM.YYYY');
                        if ($timestampNow > $timestampTo) {
                            $sectionsHtml .= '<p class="text-m mb-0 mt-6 dark-70">Архив</p>';
                            break;
                        }
                    }
                    foreach ($section['ELEMENTS'] as $element) {
                        $timestampTo = MakeTimeStamp($element['PROPERTIES']['ACTIVE_TO']['VALUE'], 'DD.MM.YYYY');
                        if ($timestampNow > $timestampTo) {
                            $elements[] = $element;
                        }
                    }
                    $sectionsHtml .= '
                        <div class="mt-4">'
                            . $this->getElementsHtml($elements, 1) .
                        '</div>';
                }

                $sectionsHtml .= '
                            </div>
                        </div>
                    </div>';
            }
        }

        if (!empty($this->element['PROPERTIES']['DOCUMENTS_ELEMENTS']['VALUE'])) {
            $elements = IblockHelper::getElementsWithProperties(
                [
                    'SORT' => 'ASC',
                ],
                [
                    'IBLOCK_ID' => $this->iblockId,
                    'ACTIVE' => 'Y',
                    'ID' => $this->element['PROPERTIES']['DOCUMENTS_ELEMENTS']['VALUE'],
                ]
            )['items'];

            if (!empty($elements)) {
                $sectionsHtml .= '
                        <div class="mt-4">'
                    . $this->getElementsHtml($elements) .
                    '</div>';
            }
        }

        return $sectionsHtml;
    }

    private function getElementsHtml(array $elements, bool $archive = false): string
    {
        $elementsHtml = '';
        $elementIds = array_column($elements, 'ID');
        $elementsSort = ElementTable::getList([
            'filter' => [
                'ID' => $elementIds,
                'ACTIVE' => 'Y',
            ],
            'select' => [
                'ID',
                'SORT',
            ],
        ])->fetchAll();
        foreach ($elementsSort as $elementSort) {
            foreach ($elements as $key => $element) {
                if ($elementSort['ID'] == $element['ID']) {
                    $elements[$key]['SORT'] = $elementSort['SORT'];
                }
            }
        }
        usort($elements, function ($a, $b) {
            return $a['SORT'] <=> $b['SORT'];
        });

        $timestampNow = MakeTimeStamp(date('d.m.Y'), 'DD.MM.YYYY');

        foreach ($elements as $element) {
            $timestampTo = MakeTimeStamp($element['PROPERTIES']['ACTIVE_TO']['VALUE'], 'DD.MM.YYYY');
            if ($timestampTo < $timestampNow && !$archive) {
                continue;
            }
            $timestampFrom = MakeTimeStamp($element['PROPERTIES']['ACTIVE_FROM']['VALUE'], 'DD.MM.YYYY');
            $file = CFile::GetPath($element['PROPERTIES']['FILE']['VALUE']);
            $fileType = pathinfo($file, PATHINFO_EXTENSION);
            $code = $this->getElementCode($element['ID']);
            $date = $element['PROPERTIES']['ACTIVE_FROM']['VALUE'];

            $elementsHtml .=
                '<a class="d-flex flex-column gap-2 py-3 document-download text-m" href="/documents/' . $code . '.' . $fileType . '">'
                    . $element ['NAME'] .
                    '
                    <p class="text-s dark-70 mb-0"> ' .
                        $element['PREVIEW_TEXT']
                    . '</p>
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="document-download__file caption-m dark-70">
                                <span class="document-download__date-time">' . $date . '</span>
                                <span class="document-download__file-type">' . $fileType . '</span>
                            </div>
                            <span class="icon size-s text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                </svg>
                            </span>
                        </div> ';

            if (!empty($element['PROPERTIES']['ACTIVE_FROM']['VALUE'])) {
                if ($timestampFrom > $timestampNow) {
                    $elementsHtml .=
                        '<span class="caption-m dark-70 ms-sm-auto flex-shrink-0">Вступит в силу с ' . $element['PROPERTIES']['ACTIVE_FROM']['VALUE'] . '</span>';
                }
            }

            $elementsHtml .= '</div></a>';
        }

        return $elementsHtml;
    }

    private function getProtectionFromScammersHtml(): string
    {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/protection_from_scammers.php';
        $displayValue = ob_get_contents();
        ob_end_clean();
        return $displayValue;
    }

    private function getElementCode(int $id)
    {
        $element = ElementTable::getList([
            'filter' => [
                'ID' => $id,
                'IBLOCK_ID' => $this->iblockId
            ],
            'select' => [
                'CODE'
            ]
        ])->fetch();

        return $element['CODE'];
    }
}
