<?php
/** @var array $arResult */

use Dalee\Services\ContentPlaceholderManager;

$properties = [
    'DOCUMENTS' => function($documents) {
        ob_start();
        foreach ($documents as $document) {
            $file = $document['SRC'];
            $date = date('d.m.y H:i', strtotime($document['TIMESTAMP_X']));
            $fileType = explode('.', $file)[1];
            ?>
            <a class="d-flex flex-column gap-1 py-3 document-download text-m" href="<?= $file ?>" download="<?= $document['ORIGINAL_NAME'] ?>">
                <?= explode('.', $document['ORIGINAL_NAME'])[0] ?>
                <div class="d-flex gap-1 align-items-center">
                    <div class="document-download__file caption-m dark-70">
                        <span class="document-download__date-time"><?= $date ?></span>
                        <span class="document-download__file-type"><?= $fileType ?></span>
                    </div>
                    <span class="icon size-s text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                        </svg>
                    </span>
                </div>
            </a>
            <?
        }
        return ob_get_clean();
    }
];

$placeholderManager = new ContentPlaceholderManager($properties, true);
$placeholderManager->processResult($arResult);

$arResult['PLACEHOLDER_CLASS'] = $placeholderManager;
