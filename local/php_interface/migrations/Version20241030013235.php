<?php

namespace Sprint\Migration;


class Version20241030013235 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Вклады разделы";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'deposits',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'С растущей ставкой',
    'CODE' => 's-rastushchey-stavkoy',
    'SORT' => '100',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'С пополнением',
    'CODE' => 's-popolneniem',
    'SORT' => '200',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  2 => 
  array (
    'NAME' => 'Со снятием',
    'CODE' => 'so-snyatiem',
    'SORT' => '300',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  3 => 
  array (
    'NAME' => 'С капитализацией',
    'CODE' => 's-kapitalizatsiey',
    'SORT' => '400',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  4 => 
  array (
    'NAME' => 'Пенсионерам',
    'CODE' => 'pensioneram',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
