<?php

namespace Sprint\Migration;


class Version20241022181808 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Кросс продажи";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'cross_sale',
            'additional'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
)        );
    }
}
