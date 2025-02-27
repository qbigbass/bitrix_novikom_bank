<?php

namespace Sprint\Migration;


class Version20250227121852 extends Version
{
    protected $author = "admin";

    protected $description = "Private banking categories";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'pb_blocks_index',
            'private_banking'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Особые условия для важных клиентов',
    'CODE' => 'special_conditions',
    'SORT' => '100',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'Премиальная карта Мир Supreme',
    'CODE' => 'supreme',
    'SORT' => '200',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => 'Дебетовая карта с ежемесячным начислением процентов на остаток средств или кредитная карта с бесплатным снятием наличных.',
    'DESCRIPTION_TYPE' => 'text',
  ),
  2 => 
  array (
    'NAME' => 'Банк для вас',
    'CODE' => 'bank_for_you',
    'SORT' => '300',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  3 => 
  array (
    'NAME' => 'Услуги',
    'CODE' => 'services',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Финансовые услуги',
        'CODE' => 'finance',
        'SORT' => '100',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Инвестиционные услуги',
        'CODE' => 'investment',
        'SORT' => '200',
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
