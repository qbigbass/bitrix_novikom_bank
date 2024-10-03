<?php

namespace Sprint\Migration;


class Version20240916133403 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "Категории инфоблока \"Вопросы и ответы\"";

    protected $moduleVersion = "4.12.6";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'qa',
            'support'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Кредиты',
    'CODE' => 'kredity',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
