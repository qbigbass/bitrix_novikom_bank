<?php
use Dalee\Helpers\ComponentRenderer\Renderer;

function renderBenefitsHeaderHeader(CMain $APPLICATION, array $ids, bool $hasPicture = true, array $params = []): string
{
    $renderer = new Renderer($APPLICATION);
    $colCount = $hasPicture ? 3 : 4;

    ob_start();
    $renderer->render(
        'Benefits',
        $ids,
        null,
        [
            'colCount' => $colCount,
            'template' => 'benefits_header',
            'colorTitleBenefitsTop' => $params['COLOR_TITLE_BENEFITS_TOP'],
            'viewBenefits' => $params['VIEW_BENEFITS_TOP_HEADER'],
        ]
    );

    return ob_get_clean();
}

function renderBenefitsHeaderFooter(CMain $APPLICATION, array $ids, bool $hasPicture = true, array $params = []): string
{
    $renderer = new Renderer($APPLICATION);
    $colCountBenefitTop = $hasPicture ? 3 : 4;

    if (!empty($params['CNT_COL_BENEFITS_TOP'])) {
        $colCountBenefitTop = $params['CNT_COL_BENEFITS_TOP'];
    }

    ob_start();
    $renderer->render('Benefits', $ids, null, [
        'colCount' => $colCountBenefitTop,
        'headerTag' => 'h4',
        'calcCols' => 'Y'
    ]);

    return ob_get_clean();
}

function renderQuote(string $text, bool $invert = false): void
{
    ob_start();
    $pathIcon = "/frontend/dist/img/business-additional-info.png";
    $bg = "bg-blue-10";
    $polygonLine = 'yellow-100';
    $sectionClass = "";
    global $APPLICATION;

    if ($APPLICATION->GetCurPage() === "/msb/ved/") {
        $sectionClass = "pb-md-7 pt-md-5 pt-lg-6";
    }
    ?>
    <section class="section-layout <?= $sectionClass ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper <?= $bg ?>">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end" src="<?= $pathIcon ?>" alt="Обратите внимание">
                                    <div class="helper__content text-l">
                                        <p><?= $text ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon <?= $polygonLine ?>">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? echo(ob_get_clean());
}

function renderQuote1(string $text, bool $invert = false): void
{
    ob_start();
    $pathIcon = "/frontend/dist/img/small-quote-sticker.png";
    $bg = "bg-dark-10";
    $polygonLine = 'yellow-100';
    $sectionClass = "";
    global $APPLICATION;

    if ($APPLICATION->GetCurPage() === "/msb/ved/") {
        $sectionClass = "pb-md-7 pt-md-5 pt-lg-6";
    }
    ?>
    <section class="section-layout <?= $sectionClass ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper <?= $bg ?>">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end" src="<?= $pathIcon ?>" alt="Обратите внимание">
                                    <div class="helper__content text-l">
                                        <p><?= $text ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon <?= $polygonLine ?>">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? echo(ob_get_clean());
}
