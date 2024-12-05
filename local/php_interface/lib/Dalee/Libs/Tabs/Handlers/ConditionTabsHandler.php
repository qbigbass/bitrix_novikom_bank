<?php
namespace Dalee\Libs\Tabs\Handlers;

use Dalee\Libs\Tabs\Interfaces\PropertyHandlerInterface;

class ConditionTabsHandler implements PropertyHandlerInterface
{
    private array $value;

    public function __construct(array $property)
    {
        $this->value = $property['~VALUE'];
    }

    public function render(): string
    {
        return
            '<div class="tab-content mt-4 mt-md-6 mt-lg-7">
                <div class="tab-pane fade active show" id="limits" aria-labelledby="limits" tabindex="0" role="tabpanel">'
                    . $this->getTabsHtml() .
                '</div>
            </div>';
    }

    private function getTabsHtml(): string
    {
        $tabsHtml = '';
        foreach ($this->value as $key => $value) {
            $valueDecoded = json_decode($value, 1);
            $margins = ($key > 0) ? 'mt-6 mt-md-9 mt-lg-11' : '';

            $tabsHtml .=
                '<div class="row ' . $margins . '">
                    <div class="col-12">
                        <h4 class="mb-4 mb-md-5 mb-lg-6">' . $valueDecoded['TAB'] . '</h4>
                        <div class="table-tab cell-2">
                            <div class="table-tab__body">'
                                . $this->getTabBodyHtml($valueDecoded) .
                            '</div>
                        </div>
                    </div>
                </div>';
        }

        return $tabsHtml;
    }

    private function getTabBodyHtml(array $valueDecoded): string
    {
        $bodyHtml = '';
        foreach ($valueDecoded['DESCRIPTIONS'] as $innerKey => $header) {
            if($header == '') continue;

            $text = $valueDecoded['VALUES'][$innerKey] ?? '';
            $bodyHtml .=
                '<div class="table-tab__row">
                    <div class="table-tab__cell text-l fw-semibold dark-70">' . $header . '</div>
                    <div class="table-tab__cell">
                        <p class="text-l">' . $text . '</p>
                    </div>
                </div>';
        }

        return $bodyHtml;
    }
}
