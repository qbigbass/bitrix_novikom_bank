<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?/** @var array $arResult */?>
<?/** @var array $arParams */?>

<?if ($arResult["isFormErrors"] == "Y"){?>
    <?=$arResult["FORM_ERRORS_TEXT"];?>
<?}?>

<?=$arResult["FORM_NOTE"] ?? ''?>

<?if ($arResult["isFormNote"] != "Y") {?>
    <div class="form-call-me-back form-call-me-back--light-blue">
        <div class="form-call-me-back__head">
            <div class="form-call-me-back__title headline-3"><?=$arResult['FORM_TITLE']?></div>
            <div class="form-call-me-back__description body-m-light"><?=$arResult['FORM_DESCRIPTION']?></div>
        </div>
        <form enctype="multipart/form-data" name="<?=$arResult['WEB_FORM_NAME']?>" class="form-call-me-back__form" action="<?=$APPLICATION->GetCurUri()?>" method="POST">
            <div class="error-msg"></div>
            <input type="hidden" name="WEB_FORM_ID" value="<?=$arParams['WEB_FORM_ID']?>">
            <?=bitrix_sessid_post()?>
            <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {?>
                <?$required = ($arQuestion['REQUIRED'] == 'Y') ? 'required' : '';?>
                <?$type = $arQuestion['STRUCTURE'][0]['FIELD_TYPE'];?>
                <?$name = 'form_' . $type . '_' . $arQuestion['STRUCTURE'][0]['ID'];?>
                <div class="a-input js-a-input a-input--ms">
                    <label for="mobile-phone" class="a-input__label body-s-heavy"><?=$arQuestion['CAPTION']?></label>
                    <input id="mobile-phone" class="a-input__input" placeholder="+7" aria-describedby="mobile-phone-hint" type="<?=$type?>" name="<?=$name?>" value="<?=$arResult['arrVALUES'][$name]?>" <?=$required?>>
                </div>
            <?}?>
            <button type="submit" class="a-button a-button--lm a-button--primary a-button--full" name="web_form_submit" value="<?=$arResult['arForm']['BUTTON']?>">
                <?=$arResult['arForm']['BUTTON']?>
            </button>
        </form>
        <button class="a-button a-button--lm a-button--primary a-button--text">
            <span class="a-icon a-button__icon">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chat"></use>
                </svg>
            </span>
            Написать в чат
        </button>
        <div class="form-call-me-back__agreement caption-m">Нажимая кнопку «Перезвоните мне», вы соглашаетесь с условиями предоставления информации</div>
    </div>
<?}?>
