<?php

namespace Sprint\Migration;


class Version20241105224611 extends Version
{
    protected $author = "votincev-aa@galagodigital.ru";

    protected $description = "категории инфоблока для детальных старниц карточек";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'cards_detail_pages_ru',
            'for_private_clients_ru'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Социально-платёжная карта «Мир»',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '70',
    'UF_OUTPUT_NAME' => 'Социально-платёжная карта «Мир»',
    'UF_BANNER_STYLE' => '3',
  ),
  1 => 
  array (
    'NAME' => 'Всегда в плюсе',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '221',
    'UF_OUTPUT_NAME' => 'Всегда в плюсе',
    'UF_BANNER_STYLE' => '3',
  ),
  2 => 
  array (
    'NAME' => 'Мир Supreme (дебетовая)',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '222',
    'UF_OUTPUT_NAME' => 'Мир Supreme',
    'UF_BANNER_STYLE' => '1',
  ),
  3 => 
  array (
    'NAME' => 'Мир Премиальная (кредитная)',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '223',
    'UF_OUTPUT_NAME' => 'Мир Премиальная',
    'UF_BANNER_STYLE' => '1',
  ),
  4 => 
  array (
    'NAME' => 'Мир Supreme (кредитная)',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '224',
    'UF_OUTPUT_NAME' => 'Мир Supreme',
    'UF_BANNER_STYLE' => '1',
  ),
  5 => 
  array (
    'NAME' => 'Мир Премиальная (дебетовая)',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '225',
    'UF_OUTPUT_NAME' => 'Мир Премиальная',
    'UF_BANNER_STYLE' => '1',
  ),
  6 => 
  array (
    'NAME' => 'Цифровая карта',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '226',
    'UF_OUTPUT_NAME' => 'Цифровая карта',
    'UF_BANNER_STYLE' => '1',
  ),
  7 => 
  array (
    'NAME' => 'Платежный стикер',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_CARD_ICON' => '236',
    'UF_OUTPUT_NAME' => 'Платежный стикер «Мир»',
    'UF_BANNER_STYLE' => '2',
  ),
)        );
    }
}
