<?php
namespace Dalee\Libs\Tabs\Handlers;

use CFile;
use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class IconsWithDescriptionHandler implements PropertyHandlerInterface
{
    private array $images;
    private array $description;
    private string $showTwoIconsInRow;

    public function __construct(array $property)
    {
        $this->images = $property['~VALUE'];
        $this->description = $property['~DESCRIPTION'];
        $this->showTwoIconsInRow = $property['SHOW_TWO_ICONS_IN_ROW'] ?? '';
    }

    public function render(): string
    {
        $result = '';
        $colClass = ($this->showTwoIconsInRow == 'Y') ? '' : 'col-lg-4';
        foreach ($this->images as $key => $imageId) {
            $result .=
                '<div class="col-12 col-md-6 ' . $colClass . '">
                    <div class="benefit d-flex gap-3 flex-column flex-md-row align-items-md-center gap-md-4 gap-lg-6">
                        <img class="icon size-lxl" src="' . CFile::GetPath($imageId) . '" alt="icon">
                        <div class="benefit__content d-flex flex-column gap-3">
                            <h5 class="benefit__title fw-semibold">' . $this->description[$key] . '</h5>
                        </div>
                    </div>
                </div>';
        }

        return '<div class="row row-gap-6">' . $result . '</div>';
    }
}
