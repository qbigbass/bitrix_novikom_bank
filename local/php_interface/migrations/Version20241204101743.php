<?php

namespace Sprint\Migration;


class Version20241204101743 extends Version
{
    protected $author = "r.machmutov@astarus.ru";

    protected $description = "Разделы для ИБ Финансовым институтам / Каталог услуг";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'fi_catalog',
            'for_financial_institutes'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Расчетное обслуживание',
    'CODE' => 'raschetnoe-obsluzhivanie',
    'SORT' => '100',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => 'Корреспондентские счета ЛОРО в российских рублях и иностранной валюте',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => NULL,
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  1 => 
  array (
    'NAME' => 'Межбанковские операции',
    'CODE' => 'mezhbankovskie-operatsii',
    'SORT' => '200',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => 'Операции на валютном и денежном рынках, сделки МБК, синдикации',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => NULL,
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => '1',
    'UF_FI_SHOW_CONTACT' => '1',
  ),
  2 => 
  array (
    'NAME' => 'Брокерское обслуживание',
    'CODE' => 'brokerskoe-obsluzhivanie',
    'SORT' => '300',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => 'Услуги профессионального частника рынка ценных бумаг',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => NULL,
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  3 => 
  array (
    'NAME' => 'Доверительное управление',
    'CODE' => 'doveritelnoe-upravlenie',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => 'Экспертное управление активами для достижения ваших инвестиционных целей',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '565',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  4 => 
  array (
    'NAME' => 'Гарантии и обязательства',
    'CODE' => 'garantii-i-obyazatelstva',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '566',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  5 => 
  array (
    'NAME' => 'Организация облигационных займов',
    'CODE' => 'organizatsiya-obligatsionnykh-zaymov',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '567',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  6 => 
  array (
    'NAME' => 'Депозитарное обслуживание',
    'CODE' => 'depozitarnoe-obsluzhivanie',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '568',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  7 => 
  array (
    'NAME' => 'Финансирование экспортно-импортных операций',
    'CODE' => 'finansirovanie-eksportno-importnykh-operatsiy',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '569',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  8 => 
  array (
    'NAME' => 'Система Банк-клиент',
    'CODE' => 'sistema-bank-klient',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '570',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
  9 => 
  array (
    'NAME' => 'Стимулирование экспорта стран СНГ',
    'CODE' => 'stimulirovanie-eksporta-stran-sng',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'UF_FI_ICON' => '571',
    'UF_FI_POS' => NULL,
    'UF_FI_SHOW_SECT' => NULL,
    'UF_FI_SHOW_CONTACT' => NULL,
  ),
)        );
    }
}
