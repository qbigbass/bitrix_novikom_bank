<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) :?>
    <nav class="col-lg-12 col-xl-6 d-none d-lg-block">
        <div class="row row-gap-7">
            <?foreach ($arResult as $col => $items) :?>
                <div class="col-4 d-flex flex-column row-gap-2 align-items-start">
                    <?foreach ($items as $item) :?>
                        <?if ($item['PARAMS']['show_only_in_header'] == 'Y') continue;?>

                        <?$class = ($item['HEAD_LINK']) ? 'fw-semibold dark-100' : 'text-s dark-70'?>
                        <a href="<?=$item['LINK']?>" class="<?=$class?>">
                            <?=$item['PARAMS']['alternative_name'] ?? $item['TEXT']?>
                        </a>
                    <?endforeach;?>
                </div>
            <?endforeach;?>
        </div>
    </nav>
<?endif;?>
