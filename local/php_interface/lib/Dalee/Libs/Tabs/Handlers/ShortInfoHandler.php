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

    public function render(array $params = []): string
    {
        global $MAIN_SECTION;
        $bg = "bg-dark-10";
        $colorLine = "green-100";

        if ($MAIN_SECTION === "msb") {
            $bg = "bg-blue-10";
            $colorLine = "yellow-100";
        } elseif ($MAIN_SECTION === "fi") {
            $colorLine = "violet-100";
        }

        if (!empty($params['SHORT_INFO_CLASS_BLOCK'])) {
            $bg = $params['SHORT_INFO_CLASS_BLOCK'];
        }

        if (!empty($params['SHORT_INFO_CLASS_LINE'])) {
            $colorLine = $params['SHORT_INFO_CLASS_LINE'];
        }

        return
            '<div class="polygon-container js-polygon-container">
                <div class="polygon-container__content">
                    <div class="helper '. $bg . '">
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
                <div class="polygon-container__polygon js-polygon-container-polygon ' . $colorLine . '">
                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>';
    }
}
