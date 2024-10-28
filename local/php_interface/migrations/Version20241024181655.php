<?php

namespace Sprint\Migration;


class Version20241024181655 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Кредиты категории";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'loans',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Потребительские',
    'CODE' => 'potrebitelskie',
    'SORT' => '1',
    'ACTIVE' => 'Y',
    'XML_ID' => '23',
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'На образование',
    'CODE' => 'na-obrazovanie',
    'SORT' => '2',
    'ACTIVE' => 'Y',
    'XML_ID' => '24',
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  2 => 
  array (
    'NAME' => 'Рефинансирование',
    'CODE' => 'refinansirovanie',
    'SORT' => '3',
    'ACTIVE' => 'Y',
    'XML_ID' => '25',
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  3 => 
  array (
    'NAME' => 'Овердрафт',
    'CODE' => 'overdraft',
    'SORT' => '4',
    'ACTIVE' => 'Y',
    'XML_ID' => '26',
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  4 => 
  array (
    'NAME' => 'Реструктуризация',
    'CODE' => 'restructuring',
    'SORT' => '5',
    'ACTIVE' => 'Y',
    'XML_ID' => '22',
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
