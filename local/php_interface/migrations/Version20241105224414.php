<?php

namespace Sprint\Migration;


class Version20241105224414 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Категории инфоблока спецпредложения";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'special_offers_ru',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Акции банка',
    'CODE' => 'aktsii-banka',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_TAG' => 'Акция',
  ),
)        );
    }
}
