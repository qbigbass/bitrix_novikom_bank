<?php

namespace Sprint\Migration;


class Version20241111093639 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Ставки по программе бонусы";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
    $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'CardBonusRates',
  'TABLE_NAME' => 'card_bonus_rates',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Ставки по программе "Бонусы"',
    ),
    'en' => 
    array (
      'NAME' => 'Bonus Program Rates',
    ),
  ),
));
    }
}
