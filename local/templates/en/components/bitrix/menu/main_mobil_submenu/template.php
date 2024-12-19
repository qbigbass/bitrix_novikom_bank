<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
    <div class="accordion accordion-flush" id="accordionMenu">
        <?foreach ($arResult['FIRST_LEVEL_MENU'] as $firstLevelItem) {?>
            <?if ($firstLevelItem['IS_PARENT']) {?>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <a class="accordion-button collapsed fw-semibold" href="#collapse1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse1"><?=$firstLevelItem['TEXT']?></a>
                    </div>
                    <div class="accordion-collapse collapse" data-bs-parent="#accordionMenu" id="collapse1">
                        <div class="accordion-body">
                            <div class="row row-gap-4">
                                <?$parentItemIndex = $firstLevelItem['ITEM_INDEX'];?>
                                <?foreach ($arResult['SECOND_LEVEL_MENU'][$parentItemIndex] as $secondLevelItem) {?>
                                    <div class="col-12 col-md-6">
                                        <a href="<?=$secondLevelItem['LINK']?>"><?=$secondLevelItem['TEXT']?></a>
                                    </div>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            <?} else {?>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <a class="accordion-button collapsed fw-semibold" href="<?=$firstLevelItem['LINK']?>"><?=$firstLevelItem['TEXT']?></a>
                    </div>
                </div>
            <?}?>
        <?}?>
    </div>
<?}?>
