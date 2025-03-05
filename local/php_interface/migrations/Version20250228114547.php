<?php

namespace Sprint\Migration;


use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\ORM\PropertyValue;

class Version20250228114547 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "перенос инфоврезок для иблока ФИ";

    protected $moduleVersion = "4.18.1";

    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('financial_institutions', 'financial_institutes');

        $result = Iblock::wakeUp($iblockId)->getEntityDataClass()::getList([
            'filter' => ['!QUOTE_TEXT.VALUE' => false, '=ACTIVE' => 'Y'],
            'select' => ['ID', 'QUOTE_TEXT.VALUE', 'QUOTE_TEXT.DESCRIPTION'],
        ]);

        foreach ($result->fetchCollection() as $item) {
            $quotes = $item->get('QUOTE_TEXT');
            $index = 1;

            foreach ($quotes as $quote) {
                if ($index > 3) {
                    continue;
                }

                $value = new PropertyValue($quote->getValue(), $quote->getDescription());
                $item->set('QUOTE_TEXT_' . $index++, $value);
            }

            $item->save();
        }
    }
}
