<?php

namespace Sprint\Migration;


class Version20241127165157 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Категории инфоблока Вкладки";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'tabs',
            'additional'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Кредиты',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Кредит на любые цели для зарплатных клиентов',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Овердрафт',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Реструктуризация',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  1 => 
  array (
    'NAME' => 'Ипотека',
    'CODE' => 'ipoteka',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Первичный рынок',
        'CODE' => 'pervichnyy-rynok',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  2 => 
  array (
    'NAME' => 'Вклады',
    'CODE' => 'vklady-spisok',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Список',
        'CODE' => 'deposit-list',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Рантье',
        'CODE' => 'rante',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  3 => 
  array (
    'NAME' => 'Платежи и переводы',
    'CODE' => 'platezhi-i-perevody',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Операции через банкомат',
        'CODE' => 'operatsii-cherez-bankomat',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Переводы в интернет-банке или приложении',
        'CODE' => 'perevody-v-internet-banke-ili-prilozhenii',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Переводы со счетов',
        'CODE' => 'perevody-so-schetov',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Переводы без открытия счета',
        'CODE' => 'perevody-bez-otkrytiya-scheta',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  4 => 
  array (
    'NAME' => 'Карты',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Социально-платёжная карта «Мир»',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Мир Supreme',
        'CODE' => 'mir-supreme',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Мир Премиальная',
        'CODE' => 'mir-premialnaya',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => ' Мир Премиальная Кредитная',
        'CODE' => 'mir-premialnaya-kreditnaya',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Всегда в плюсе',
        'CODE' => 'vsegda-v-plyuse',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  5 => 
  array (
    'NAME' => 'Корпоративным клиентам',
    'CODE' => 'korporativnym-klientam',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Корпоративным клиентам',
        'CODE' => 'for-corporate-clients',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Лизинг',
        'CODE' => 'lizing',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Сопровождение контрактов',
        'CODE' => 'soprovozhdenie-kontraktov',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Страхование залогового имущества',
        'CODE' => 'strakhovanie-zalogovogo-imushchestva',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  6 => 
  array (
    'NAME' => 'Услуги',
    'CODE' => 'uslugi',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Интернет-банк и Мобильное приложение',
        'CODE' => 'internet-bank-i-mobilnoe-prilozhenie',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Прочие сервисы',
        'CODE' => 'prochie-servisy',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
)        );
    }
}
