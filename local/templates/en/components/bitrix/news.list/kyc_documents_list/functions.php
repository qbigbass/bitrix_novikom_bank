<?php

function renderDescription(array $property): bool|string
{
    ob_start();

    foreach ($property['~VALUE'] as $key => $value) { ?>
        <div class="table-tab__row">
            <div class="table-tab__cell text-l fw-semibold dark-70"><?= $property['~DESCRIPTION'][$key] ?></div>
            <div class="table-tab__cell">
                <p class="text-l"><?= $value ?></p>
            </div>
        </div>
    <? }

    return ob_get_clean();
}
function renderFiles(array $files): bool|string
{
    $arFile = [];

    if (!empty($files)) {
        if (is_array($files[0])) {
            $arFile = array_map(function ($file) {
                return [
                    'file' => $file['SRC'],
                    'date' => date('d.m.Y H:i', strtotime($file['TIMESTAMP_X']))
                ];
            }, $files);
        } else {
            $arFile[] = [
                'file' => $files['SRC'],
                'date' => date('d.m.Y H:i', strtotime($files['TIMESTAMP_X']))
            ];
        }
    }

    ob_start();

    foreach ($arFile as $file): ?>
        <a class="d-flex flex-column gap-2 py-3 document-download text-m" href="<?= $file['file'] ?>"
           download=""><?= pathinfo($file['file'], PATHINFO_FILENAME) ?>
            <div class="d-flex gap-1 align-items-center">
                <div class="document-download__file caption-m dark-70">
                    <span class="document-download__date-time"><?= $file['date'] ?></span>
                    <span class="document-download__file-type"><?= pathinfo($file['file'], PATHINFO_EXTENSION) ?></span>
                </div>
                <span class="icon size-s text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                    </svg>
                </span>
            </div>
        </a>
    <? endforeach;

    return ob_get_clean();
}
