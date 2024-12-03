<?php
use Dalee\Helpers\ComponentRenderer\Renderer;

function renderBenefitsTop(CMain $APPLICATION, array $ids, bool $hasPicture = true): string
{
    $renderer = new Renderer($APPLICATION);
    $colCount = $hasPicture ? 3 : 4;

    ob_start();
    $renderer->render('Benefits', $ids, null, [
        'colCount' => $colCount,
        'headerTag' => 'h4'
    ]);

    return ob_get_clean();
}

function renderQuote(string $text, bool $invert = false): void
{
    ob_start(); ?>
    <section class="section-layout py-lg-11<?= $invert ? ' bg-purple-10' : '' ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper <?= $invert ? ' bg-dark-0' : 'bg-purple-10' ?>">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info_orange.png" alt="Обратите внимание" loading="lazy">
                                    <div class="helper__content text-l">
                                        <p><?= $text ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon orange-100">
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
