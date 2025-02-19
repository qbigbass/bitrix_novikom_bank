<?php

namespace Sprint\Migration;


class Version20250213174332 extends Version
{
    protected $author = "vimbatu@gmail.com";

    protected $description = "Этапы - разделы";

    protected $moduleVersion = "4.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'steps',
            'additional'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Частным клиентам',
    'CODE' => 'chastnym-klientam',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Вклады',
        'CODE' => 'vklady',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Рантье',
            'CODE' => 'rante',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'CHILDS' => 
            array (
              0 => 
              array (
                'NAME' => 'Онлайн',
                'CODE' => 'onlayn',
                'SORT' => '500',
                'ACTIVE' => 'Y',
                'XML_ID' => NULL,
                'DESCRIPTION' => '',
                'DESCRIPTION_TYPE' => 'text',
              ),
              1 => 
              array (
                'NAME' => 'В банке',
                'CODE' => 'v-banke',
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
      1 => 
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
            'NAME' => 'Банковские переводы в офисе',
            'CODE' => 'bankovskie-perevody-v-ofise',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'CHILDS' => 
            array (
              0 => 
              array (
                'NAME' => 'Переводы со счетов',
                'CODE' => 'perevody-so-schetov',
                'SORT' => '500',
                'ACTIVE' => 'Y',
                'XML_ID' => NULL,
                'DESCRIPTION' => '',
                'DESCRIPTION_TYPE' => 'text',
                'CHILDS' => 
                array (
                  0 => 
                  array (
                    'NAME' => 'Как оформить перевод',
                    'CODE' => 'kak-oformit-perevod',
                    'SORT' => '500',
                    'ACTIVE' => 'Y',
                    'XML_ID' => NULL,
                    'DESCRIPTION' => '',
                    'DESCRIPTION_TYPE' => 'text',
                  ),
                  1 => 
                  array (
                    'NAME' => 'Как получить перевод',
                    'CODE' => 'kak-poluchit-perevod',
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
                'NAME' => 'Переводы без открытия счета',
                'CODE' => 'perevody-bez-otkrytiya-scheta',
                'SORT' => '500',
                'ACTIVE' => 'Y',
                'XML_ID' => NULL,
                'DESCRIPTION' => '',
                'DESCRIPTION_TYPE' => 'text',
                'CHILDS' => 
                array (
                  0 => 
                  array (
                    'NAME' => 'Как оформить перевод',
                    'CODE' => 'kak-oformit-perevod',
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
        ),
      ),
      2 => 
      array (
        'NAME' => 'Кредиты',
        'CODE' => 'kredity',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Кредит на любые цели для зарплатных клиентов',
            'CODE' => 'kredit-na-lyubye-tseli-dlya-zarplatnykh-klientov',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'CHILDS' => 
            array (
              0 => 
              array (
                'NAME' => 'Этапы кредитования',
                'CODE' => 'etapy-kreditovaniya',
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
        'NAME' => 'Карты',
        'CODE' => 'karty',
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
            'CODE' => 'sotsialno-platyezhnaya-karta-mir',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'CHILDS' => 
            array (
              0 => 
              array (
                'NAME' => 'Для новых зарплатных клиентов',
                'CODE' => 'dlya-novykh-zarplatnykh-klientov',
                'SORT' => '500',
                'ACTIVE' => 'Y',
                'XML_ID' => NULL,
                'DESCRIPTION' => '',
                'DESCRIPTION_TYPE' => 'text',
                'CHILDS' => 
                array (
                  0 => 
                  array (
                    'NAME' => 'Три шага для удобного и комфортного использования зарплатной карты',
                    'CODE' => 'tri-shaga-dlya-udobnogo-i-komfortnogo-ispolzovaniya-zarplatnoy-karty',
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
        ),
      ),
    ),
  ),
  1 => 
  array (
    'NAME' => 'Корпоративным клиентам',
    'CODE' => 'korporativnym-klientam',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
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
            'NAME' => 'Варианты банковского сопровождения',
            'CODE' => 'varianty-bankovskogo-soprovozhdeniya',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'CHILDS' => 
            array (
              0 => 
              array (
                'NAME' => 'Банковское сопровождение контракта, заключенного в соответствии с 44-ФЗ',
                'CODE' => 'bankovskoe-soprovozhdenie-kontrakta-zaklyuchennogo-v-sootvetstvii-s-44-fz',
                'SORT' => '500',
                'ACTIVE' => 'Y',
                'XML_ID' => NULL,
                'DESCRIPTION' => '',
                'DESCRIPTION_TYPE' => 'text',
                'CHILDS' => 
                array (
                  0 => 
                  array (
                    'NAME' => 'Как организовать банковское сопровождение коммерческих контрактов?',
                    'CODE' => 'kak-organizovat-bankovskoe-soprovozhdenie-kommercheskikh-kontraktov',
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
        ),
      ),
    ),
  ),
  2 => 
  array (
    'NAME' => 'Услуги',
    'CODE' => 'uslugi',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Биометрическая идентификация',
        'CODE' => 'biometricheskaya-identifikatsiya',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => NULL,
        'DESCRIPTION' => '',
        'DESCRIPTION_TYPE' => 'text',
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Как и где можно сдать биометрические данные в Единую Биометрическую систему?',
            'CODE' => 'kak-i-gde-mozhno-sdat-biometricheskie-dannye-v-edinuyu-biometricheskuyu-sistemu',
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
)        );
    }
}
