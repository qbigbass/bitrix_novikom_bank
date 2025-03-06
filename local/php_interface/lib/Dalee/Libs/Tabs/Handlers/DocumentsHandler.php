<?php

namespace Dalee\Libs\Tabs\Handlers;

use CFile;
use CIBlockSection;
use CUserFieldEnum;
use Dalee\Helpers\IblockHelper;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class DocumentsHandler implements PropertyHandlerInterface
{
    private int $iblockId;
    private array $property;
    private ?array $params;
    private int $firstSectionKey;

    public function __construct(array $property, ?int $elementId = null, ?array $element = null, array $params = [])
    {
        $this->iblockId = iblock("documents");
        $this->property = $property;
        $this->params = $params;

        $this->property['LINK_SECTION_VALUE'] = !empty($this->property['VALUE']) ?
            $this->getSectionsWithElements($this->property['VALUE']) : [];

        $this->firstSectionKey = array_key_first($this->property['LINK_SECTION_VALUE']) ?? 0;
    }

    public function render(array $params = []): string
    {
        if (!empty($this->params) & $this->params["DOCUMENTS_PLACEHOLDER_TEMPLATE"] === "SIMPLE") {
            return '
                <div>
                    <h5>Подробнее о программе</h5>
                    <div class="link-list">'
                        . $this->getSimpleHtml() .
                    '</div>
                </div>';
        }

        $sectionHtml = '
            <div class="col-12 col-xxl-8">
                <div class="accordion" id="accordion-' . $this->property['ID'] . '">'
                    . $this->getSectionsHtml() .
                '</div>
            </div>
        ';

        $protectionFromScammers = '
            <div class="col-12 col-xxl-4">'
                . $this->getProtectionFromScammersHtml() .
            '</div>
        ';

        return $sectionHtml . (empty($params['isAccordion']) ? $protectionFromScammers : '');
    }

    private function getSimpleHtml(): string
    {
        $simpleHtml = '';

        foreach ($this->property['LINK_SECTION_VALUE'] as $key => $section) {
            $simpleHtml .= $this->getElementsHtml($section['ELEMENTS']);
        }

        return $simpleHtml;
    }

    private function getSectionsHtml(): string
    {
        $sectionsHtml = '';
        $withArchive = !empty(array_filter(array_column($this->property['LINK_SECTION_VALUE'], 'UF_DOCUMENTS_ARCHIVE')));
        $hasArchivedElements = false;

        foreach ($this->property['LINK_SECTION_VALUE'] as $key => $section) {
            if (!empty($section['ELEMENTS'])) {
                $buttonShowClass = ($key == $this->firstSectionKey) ? 'show' : 'collapsed';
                $ariaExpanded = ($key == $this->firstSectionKey) ? 'aria-expanded="true"' : '';
                $accordionShowClass = ($key == $this->firstSectionKey) ? 'show' : '';
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
                                '</div>
                            </div>
                        </div>
                    </div>';
            }

            if (!empty($section['ELEMENTS_ARCHIVE'])) {
                $hasArchivedElements = true;
            }
        }

        if ($withArchive && $hasArchivedElements) {
            $sectionsHtml .= $this->renderArchive();
        }

        return $sectionsHtml;
    }

    /**
     * @return string
     */
    private function renderArchive(): string
    {
        return
            '<div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#archive" aria-controls="archive">
                        Архив
                    </button>
                </div>
                <div class="accordion-collapse collapse" id="archive" data-bs-parent="#accordion-' . $this->property['ID'] . '">
                    <div class="accordion-body">
                        <div class="mt-4">'
                            . $this->getArchivedElementsHtml() .
                        '</div>
                    </div>
                </div>
            </div>';
    }

    /**
     * @param array $elements
     * @param bool $archived
     * @return string
     */
    private function getElementsHtml(array $elements, bool $archived = false): string
    {
        $elementsHtml = '';

        foreach ($elements as $element) {
            if (!$archived &&!empty($element['ACTIVE_TO']) && MakeTimeStamp($element['ACTIVE_TO'], 'DD.MM.YYYY') < time()) {
                continue;
            }

            $timestampFrom = MakeTimeStamp($element['ACTIVE_FROM'], 'DD.MM.YYYY');
            if ($timestampFrom < time()) {
                if (!empty($name) && $name == $element['NAME']) {
                    continue;
                }
                $name = $element['NAME'];
            }

            $elementsHtml .= $this->renderElement($element, $timestampFrom);
        }

        return $elementsHtml;
    }

    /**
     * @param array $element
     * @param string $timestampFrom
     * @return string
     */
    private function renderElement(array $element, string $timestampFrom): string
    {
        $date = date('d.m.Y', strtotime($element['ACTIVE_FROM']));
        $fileType = $this->getFileType($element['PROPERTIES']['FILE']['VALUE']);

        $result = '<a class="d-flex flex-column gap-2 py-3 document-download text-m" href="/documents/' . $element['CODE'] . '.' . $fileType . '">'
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

        if ($timestampFrom > time()) {
            $result .=
                '<span class="caption-m dark-70 ms-sm-auto flex-shrink-0">Вступит в силу с ' . ConvertDateTime($element['ACTIVE_FROM'], 'DD.MM.YYYY') . '</span>';
        }

        $result .= '</div></a>';

        return $result;
    }

    /**
     * @param int $id
     * @return string
     */
    private function getFileType(int $id): string
    {
        $file = CFile::GetPath($id);
        return pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * @return string
     */
    private function getArchivedElementsHtml(): string
    {
        $result = '';
        foreach ($this->property['LINK_SECTION_VALUE'] as $section) {
            if (empty($section['ELEMENTS_ARCHIVE'])) {
                continue;
            }
            if ($section['UF_DOCUMENTS_ARCHIVE_VIEW'] == 'Без разделов') {
                $result .= $this->getElementsHtml($section['ELEMENTS_ARCHIVE'], true);
            } else {
                $result .=
                    '<div class="accordion" id="accordion-' . $section['ID'] . '">
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#' . $section['ID'] . '-archive" aria-controls="' . $section['ID'] . '-archive">
                                    ' . $section['NAME'] . '
                                </button>
                            </div>
                            <div class="accordion-collapse collapse" id="' . $section['ID'] . '-archive" data-bs-parent="#accordion-' . $section['ID'] . '">
                                <div class="accordion-body">
                                    <div class="mt-4">'
                                        . $this->getElementsHtml($section['ELEMENTS_ARCHIVE'], true) .
                                    '</div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    private function getProtectionFromScammersHtml(): string
    {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/protection_from_scammers.php';
        $displayValue = ob_get_contents();
        ob_end_clean();
        return $displayValue;
    }

    /**
     * @param array $sectionIds
     * @return array
     */
    private function getSectionsWithElements(array $sectionIds): array
    {
        $result = [];

        $sections = CIBlockSection::GetList(
            ['SORT' => 'ASC'],
            [
                'IBLOCK_ID' => $this->iblockId,
                'ID' => $sectionIds
            ],
            false,
            ['ID', 'NAME', 'CODE', 'DESCRIPTION', 'UF_*']
        );

        while ($section = $sections->Fetch()) {
            $section['UF_DOCUMENTS_ARCHIVE_VIEW'] = CUserFieldEnum::GetList([], [
                'ID' => $section['UF_DOCUMENTS_ARCHIVE_VIEW']
            ])
                ->Fetch()['VALUE'];

            $result[$section['ID']] = $section;
        }

        $elements = $this->getElements($sectionIds);

        foreach ($elements as $element) {
            if (
                !empty($element['ACTIVE_TO'])
                && MakeTimeStamp($element['ACTIVE_TO']) < time()
                && $result[$element['IBLOCK_SECTION_ID']]['UF_DOCUMENTS_ARCHIVE']
            ) {
                $result[$element['IBLOCK_SECTION_ID']]['ELEMENTS_ARCHIVE'][$element['ID']] = $element;
            } else {
                $result[$element['IBLOCK_SECTION_ID']]['ELEMENTS'][$element['ID']] = $element;
            }
        }

        $this->sortArchive($result);

        return $result;
    }

    /**
     * @param array $result
     * @return void
     */
    private function sortArchive(array &$result): void
    {
        foreach ($result as &$section) {
            if (!empty($section['ELEMENTS_ARCHIVE'])) {
                usort($section['ELEMENTS_ARCHIVE'], function ($a, $b) {
                    // Сортируем по ACTIVE_FROM
                    $dateA = !empty($a['ACTIVE_FROM']) ? strtotime($a['ACTIVE_FROM']) : 0;
                    $dateB = !empty($b['ACTIVE_FROM']) ? strtotime($b['ACTIVE_FROM']) : 0;

                    if ($dateA !== $dateB) {
                        return $dateB <=> $dateA; // Убывающий порядок
                    }

                    // Если даты совпадают — сортируем по SORT
                    return $a['SORT'] <=> $b['SORT']; // Возрастающий порядок
                });
            }
        }

        unset($section);
    }

    /**
     * @param array $sectionIds
     * @return array
     */
    private function getElements(array $sectionIds): array
    {
        return IblockHelper::getElementsWithProperties(
            [
                'SORT' => 'ASC',
                'DATE_ACTIVE_FROM' => 'ASC',
            ],
            [
                'IBLOCK_SECTION_ID' => $sectionIds,
                'IBLOCK_ID' => $this->iblockId,
                'ACTIVE' => 'Y'
            ],
        )['items'] ?? [];
    }
}
