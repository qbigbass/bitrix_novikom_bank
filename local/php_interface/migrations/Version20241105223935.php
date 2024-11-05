<?php

namespace Sprint\Migration;


class Version20241105223935 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Категории инфоблока табы";

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
    ),
  ),
  3 => 
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
)        );
    }
}
