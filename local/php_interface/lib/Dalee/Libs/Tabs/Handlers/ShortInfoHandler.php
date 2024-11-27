<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class ShortInfoHandler implements PropertyHandlerInterface
{
    private string $text;
    private string $img;

    public function __construct(array $property)
    {
        $this->text = $property['~VALUE']['TEXT'];
        $this->img = (!empty($property['IMG'])) ? $property['IMG'] : '/frontend/dist/img/restructuring-additional-info.png';
    }

    public function render(): string
    {
        return
            '<div class="w-100 mt-7 mt-md-7 mt-lg-8">
                <div class="polygon-container js-polygon-container">
                    <div class="polygon-container__content">
                        <div class="helper bg-dark-10">
                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                <img class="helper__image w-auto float-end" src="' . $this->img . '" alt="" loading="lazy">
                                <div class="helper__content text-l">
                                    <p class="mb-0">'
                                        . $this->text .
                                    '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                        </svg>
                    </div>
                </div>
            </div>';
    }
}
