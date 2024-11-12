<?php

namespace Sprint\Migration;


class Version20241112174130 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Корпоративным клиентам разделы";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'corporate_clients',
            'for_corporate_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
)        );
    }
}
