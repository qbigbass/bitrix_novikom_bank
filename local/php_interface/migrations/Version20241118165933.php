<?php

namespace Sprint\Migration;


class Version20241118165933 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Разделы инфоблока банковские карты (витрина)";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'cards_list_ru',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Кредитные карты',
    'CODE' => 'kreditnye-karty',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TAG' => NULL,
  ),
  1 => 
  array (
    'NAME' => 'Дебетовые карты',
    'CODE' => 'debetovye-karty',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TAG' => 'Дебетовая карта',
  ),
  2 => 
  array (
    'NAME' => 'Зарплатная карта',
    'CODE' => 'zarplatnaya-karta',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TAG' => NULL,
  ),
  3 => 
  array (
    'NAME' => 'Цифровая карта',
    'CODE' => 'tsifrovaya-karta',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TAG' => NULL,
  ),
  4 => 
  array (
    'NAME' => 'Платежный стикер',
    'CODE' => 'platezhnyy-stiker',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TAG' => NULL,
  ),
)        );
    }
}
