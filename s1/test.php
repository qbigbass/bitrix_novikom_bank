<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php'); ?>
<?
ini_set('error_reporting', 'E_ALL');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


use Dalee\Services\PlaceholderManager;

$text = 'Текст #loan_max_term|Кредит на рефинансирование для зарплатных клиентов#, #deposit_min_sum|До востребования|rub#, #deposit_table|Рантье|rub,eur,usd#, #deposit_table|До востребования|rub,eur,usd#';
PlaceholderManager::handle($text);

pre($text);


?>



<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>
