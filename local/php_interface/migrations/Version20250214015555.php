<?php

namespace Sprint\Migration;

class Version20250214015555 extends Version
{
    protected $author = "admin";

    protected $description   = "Элементы ИБ \"Банковские карты премиального уровня\"";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\MigrationException
     * @throws Exceptions\RestartException
     * @return bool|void
     */
    public function up()
    {
        $this->getExchangeManager()
             ->IblockElementsImport()
             ->setExchangeResource('iblock_elements.xml')
             ->setLimit(20)
             ->execute(function ($item) {
                 $this->getHelperManager()
                      ->Iblock()
                      ->saveElement(
                          $item['iblock_id'],
                          $item['fields'],
                          $item['properties']
                      );
             });
    }

    /**
     * @throws Exceptions\MigrationException
     * @throws Exceptions\RestartException
     * @return bool|void
     */
    public function down()
    {
        $this->getExchangeManager()
             ->IblockElementsImport()
             ->setExchangeResource('iblock_elements.xml')
             ->setLimit(10)
             ->execute(function ($item) {
                 $this->getHelperManager()
                      ->Iblock()
                      ->deleteElementByCode(
                          $item['iblock_id'],
                          $item['fields']['CODE']
                 );
             });
    }
}
