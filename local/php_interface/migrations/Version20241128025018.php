<?php

namespace Sprint\Migration;


class Version20241128025018 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Бенефиты разделы";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'benefits',
            'additional'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Платежи и переводы',
    'CODE' => 'platezhi-i-perevody',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Переводы в интернет-банке или приложении',
        'CODE' => 'perevody-v-internet-banke-ili-prilozhenii',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Операции через банкомат',
        'CODE' => 'operatsii-cherez-bankomat',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  1 => 
  array (
    'NAME' => 'Карты',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
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
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Для работников ГК "Ростех"',
            'CODE' => '',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          1 => 
          array (
            'NAME' => 'Для организаций',
            'CODE' => '',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          2 => 
          array (
            'NAME' => 'Для руководителей',
            'CODE' => '',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          3 => 
          array (
            'NAME' => 'Для новых зарплатных клиентов',
            'CODE' => '',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
        ),
      ),
      1 => 
      array (
        'NAME' => 'Мир Supreme Дебетовая',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Мир Supreme Кредитная',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Мир Премиальная (дебетовая)',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Мир Премиальная (кредитная)',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Всегда в плюсе',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
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
      ),
      7 => 
      array (
        'NAME' => 'Платежный стикер «Мир»',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  2 => 
  array (
    'NAME' => 'Корпоративным клиентам',
    'CODE' => 'korporativnym-klienta',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Лизинг',
        'CODE' => 'lizing',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Шапка',
            'CODE' => 'shapka',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          1 => 
          array (
            'NAME' => 'Страница',
            'CODE' => 'stranitsa',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
        ),
      ),
      1 => 
      array (
        'NAME' => 'Сопровождение контрактов',
        'CODE' => 'soprovozhdenie-kontraktov',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Слайдер',
            'CODE' => 'slayder',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          1 => 
          array (
            'NAME' => 'Иконки',
            'CODE' => 'ikonki',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          2 => 
          array (
            'NAME' => 'Таб услуги',
            'CODE' => 'tab-uslugi',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          3 => 
          array (
            'NAME' => 'Варианты банковского сопровождения',
            'CODE' => 'varianty-bankovskogo-soprovozhdeniya',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
        ),
      ),
      2 => 
      array (
        'NAME' => 'Синдицированное кредитование',
        'CODE' => 'sinditsirovannoe-kreditovanie',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Шапка',
            'CODE' => 'shapka',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          1 => 
          array (
            'NAME' => 'Плитка',
            'CODE' => 'plitk',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
        ),
      ),
    ),
  ),
  3 => 
  array (
    'NAME' => 'Специальные предложения',
    'CODE' => 'spetsialnye-predlozheniya',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  4 => 
  array (
    'NAME' => 'Услуги',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'SMS-информирование',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Возможности',
            'CODE' => '',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
          1 => 
          array (
            'NAME' => 'Преимущества',
            'CODE' => '',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
          ),
        ),
      ),
      1 => 
      array (
        'NAME' => 'Интернет-банк и Мобильное приложение',
        'CODE' => '',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  5 => 
  array (
    'NAME' => 'Порядок обращения в банк',
    'CODE' => 'poryadok-obrashcheniya-v-bank',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Общие',
        'CODE' => 'obshchie',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Информация для обращения',
        'CODE' => 'informatsiya-dlya-obrashcheniya',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  6 => 
  array (
    'NAME' => 'Защита от мошенничества',
    'CODE' => 'fraud-protection',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Правила безопасности',
        'CODE' => 'safety-rules',
        'SORT' => '100',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Признаки мошеннического звонка',
        'CODE' => 'signs-fraudulent-call',
        'SORT' => '200',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Держите в секрете данные',
        'CODE' => 'keep-data-secret',
        'SORT' => '300',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Самые распространенные способы мошенничества',
        'CODE' => 'most-common-types-fraud',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Срочно звоните +7 (800) 250-70-07, если:',
        'CODE' => 'call-urgently',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  7 => 
  array (
    'NAME' => 'О банке',
    'CODE' => 'o-banke',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Устойчивое развитие',
        'CODE' => 'ustoychivoe-razvitie',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  8 => 
  array (
    'NAME' => 'Реструктуризация',
    'CODE' => '',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  9 => 
  array (
    'NAME' => 'Ипотека',
    'CODE' => 'ipoteka',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  10 => 
  array (
    'NAME' => 'Вклады',
    'CODE' => 'vklady',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
