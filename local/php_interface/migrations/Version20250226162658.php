<?php

namespace Sprint\Migration;


use Bitrix\Iblock\Iblock;

class Version20250226162658 extends Version
{
    protected $author = "vladislav.skokov@dalee.ru";

    protected $description = "Перенос контента для иблока КК из \"сноски\" в \"инфоврезки\"";

    protected $moduleVersion = "4.18.1";

    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('corporate_clients', 'for_corporate_clients_ru');

        $result = Iblock::wakeUp($iblockId)->getEntityDataClass()::getList([
            'filter' => ['!QUOTE_TEXT.VALUE' => false, '=ACTIVE' => 'Y'],
            'select' => ['ID', 'QUOTE' => 'QUOTE_TEXT.VALUE'],
        ]);

        foreach ($result->fetchCollection() as $item) {
            $quotes = $item->get('QUOTE_TEXT');
            $index = 1;

            foreach ($quotes as $quote) {
                if ($index > 3) {
                    continue;
                }

                $item->set('QUOTE_TEXT_' . $index++, $quote->getValue());
            }

            $item->save();
        }
    }
}
