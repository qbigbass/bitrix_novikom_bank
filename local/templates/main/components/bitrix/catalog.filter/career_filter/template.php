<? use Dalee\Helpers\TextHelper;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

require_once __DIR__ . '/functions.php';

?>
<form class="w-100 d-flex flex-column flex-md-row w-100 gap-3 gap-lg-4 gap-xl-6">
    <div class="input-group flex-nowrap d-none d-lg-flex">
        <span class="input-group-icon">
            <span class="icon violet-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                </svg>
            </span>
        </span>
        <input class="form-control form-control-lg text-l"
               type="text"
               placeholder="Поиск по вакансиям"
               aria-label="Поиск по вакансиям"
               data-type="search"
               data-property="text"
               aria-describedby="input-search"
               value="<?= htmlspecialchars($_GET['text'] ?? '') ?>">
    </div>
    <div class="input-group flex-nowrap d-flex d-lg-none">
        <span class="input-group-icon">
            <span class="icon violet-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                </svg>
            </span>
        </span>
        <input class="form-control ps-0 text-s"
               type="text"
               placeholder="Поиск по вакансиям"
               aria-label="Поиск по вакансиям"
               data-type="search"
               data-property="text"
               aria-describedby="#input-search-mobile"
               value="<?= htmlspecialchars($_GET['search']['text'] ?? '') ?>">
    </div>
    <? foreach ($arResult['arrProp'] as $propId => $property):
        $selectedValue = getSelectedValueFromGet($_GET, mb_strtolower($property['CODE']));
        ?>
        <div class="w-100 w-md-50 w-xxl-400w flex-shrink-lg-0">
            <select
                class="form-select form-select--size-small form-select--size-lg-large js-select"
                data-type="property"
                data-property="<?= mb_strtolower($property['CODE']) ?>"
                aria-label="<?= $property['NAME'] ?>"
                data-placeholder="Все <?= TextHelper::getPluralForm(mb_strtolower($property['NAME'])) ?>">
                <option value="all" <?= $selectedValue === 'all' ? 'selected' : '' ?>>
                    Все <?= TextHelper::getPluralForm(mb_strtolower($property['NAME'])) ?>
                </option>
                <? foreach ($property['VALUE_LIST'] as $valueId => $value): ?>
                    <option
                        value="<?= htmlspecialchars($value) ?>"
                        <?= $selectedValue === $value ? 'selected' : '' ?>>
                        <?= htmlspecialchars($value) ?>
                    </option>
                <? endforeach; ?>
            </select>
        </div>
    <? endforeach; ?>
</form>
