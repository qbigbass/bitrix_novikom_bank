<?php

namespace Sprint\Migration;


class Version20240820112859 extends Version
{
    protected $author = "aleksey.sidyagin@dalee.ru";

    protected $description = "Категории инфоблока Карты";

    protected $moduleVersion = "4.10.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'cards',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Дебетовые карты',
    'CODE' => 'debetovye-karty',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TYPE_CARDS' => 'Дебетовая карта',
  ),
  1 => 
  array (
    'NAME' => 'Кредитные карты',
    'CODE' => 'kreditnye-karty',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TYPE_CARDS' => 'Кредитная карта',
  ),
  2 => 
  array (
    'NAME' => 'Цифровая карта',
    'CODE' => 'tsifrovaya-karta',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TYPE_CARDS' => NULL,
  ),
  3 => 
  array (
    'NAME' => 'Платежный стикер',
    'CODE' => 'platezhnyy-stiker',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TYPE_CARDS' => NULL,
  ),
  4 => 
  array (
    'NAME' => 'Зарплатная карта',
    'CODE' => 'zarplatnaya-karta',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TYPE_CARDS' => NULL,
  ),
)        );
    }
}
