<?php

namespace Sprint\Migration;


class Version20240816094522 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Разделы инфоблока кредиты";

    protected $moduleVersion = "4.10.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'credits',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'На образование',
    'CODE' => 'na-obrazovanie',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_ICON' => NULL,
  ),
  1 => 
  array (
    'NAME' => 'Потребительские',
    'CODE' => 'potrebitelskie',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_ICON' => '1',
  ),
  2 => 
  array (
    'NAME' => 'Рефинансирование',
    'CODE' => 'refinansirovanie',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_ICON' => '2',
  ),
)        );
    }
}
