<?php

namespace Sprint\Migration;


class Version20240916133251 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Разделы инфоблока \"документы\"";

    protected $moduleVersion = "4.12.6";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'documents',
            'internal_regulations_and_documents_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Тарифы для физических лиц',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => 'Тарифы для физических лиц, действующие во всех регионах присутствия Банка.',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'Договор банковского обслуживания',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  2 => 
  array (
    'NAME' => 'Типовые документы',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  3 => 
  array (
    'NAME' => 'Паспорта дебетовых карт',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  4 => 
  array (
    'NAME' => 'Иные документы',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
