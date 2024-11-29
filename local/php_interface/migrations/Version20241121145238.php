<?php

namespace Sprint\Migration;


class Version20241121145238 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Рейтинги Банка НОВИКОМ разделы";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'ratings',
            'about_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => '2024 год',
    'CODE' => '2024-god',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => '2023 год',
    'CODE' => '2023-god',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
