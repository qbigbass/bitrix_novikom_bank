<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
/**
 * @global CMain $APPLICATION
 */
$APPLICATION->SetTitle('Private banking');

//$hero = getHero();
//$specialConditions = getSpecialConditions();
//$mainNav = getMainNav();
//$supreme = getSupreme();
//$bankForYou = getBankForYou();
//$services = getServices();
//$contacts = getContacts();

$pbModel = [
    'hero' => [
        'title' => 'Лучшие финансовые инструменты <br>для&nbsp;достижения ваших целей',
        'main_nav' => [
            [
                'title' => 'Главная',
                'link' => '/',
                'class' => 'pb-nav__link',
            ],
            [
                'title' => 'Инвестиционные услуги',
                'link' => '#',
                'class' => 'pb-nav__link',
            ],
            [
                'title' => 'Карта Мир Supreme',
                'link' => '#',
                'class' => 'pb-nav__link',
            ],
            [
                'title' => 'Онлайн-банк',
                'link' => '#',
                'class' => 'btn btn-pb btn-pb--outline d-none d-lg-inline-block',
            ],
        ],
    ],
    'special_conditions' => [
        'title' => 'Особые условия для&nbsp;важных клиентов',
        'items' => [
            [
                'title' => 'Персональное сопровождение',
                'text' => 'Индивидуальный менеджер и&nbsp;команда финансовых консультантов для решения банковских и&nbsp;частных вопросов',
                'list' => [
                    'Выезд менеджера в&nbsp;комфортную для переговоров локацию',
                    'Индивидуальный подход при рассмотрении заявок на&nbsp;кредит любой сложности',
                    'Круглосуточный Консьерж-сервис Aspire Lifestyles',
                ],
                'image' => '/frontend/dist/img/bank01.png',
            ],
            [
                'title' => 'Вклады',
                'text' => 'Повышенная доходость для клиентов с&nbsp;крупным капиталом',
                'image' => '/frontend/dist/img/safe09.png',
            ],
            [
                'title' => 'Кредитование',
                'text' => 'Специальная линейка кредитных продуктов. Упрощённое оформление и&nbsp;короткий срок принятия решения',
                'image' => '/frontend/dist/img/percent03.png',
            ],
        ],
    ],
    'supreme' => [
        'title' => 'Премиальная карта Мир&nbsp;Supreme',
        'subtitle' => 'Дебетовая карта с&nbsp;ежемесячным начислением процентов на&nbsp;остаток средств или кредитная карта с&nbsp;бесплатным снятием наличных.',
        'benefits' => [
            [
                'icon' => '/frontend/dist/img/pb-images/pb-supreme-icons/bank-icon.svg',
                'description' => 'Снятие наличных в&nbsp;любых банкоматах без комиссии',
            ],
            [
                'icon' => '/frontend/dist/img/pb-images/pb-supreme-icons/airplane-icon.svg',
                'description' => 'Доступ в&nbsp;бизнес-залы аэропортов с&nbsp;Mir Pass',
            ],
            [
                'icon' => '/frontend/dist/img/pb-images/pb-supreme-icons/percent-icon.svg',
                'description' => 'Повышенный кэшбэк до&nbsp;30% от&nbsp;покупок',
            ],
            [
                'icon' => '/frontend/dist/img/pb-images/pb-supreme-icons/wallet-icon.svg',
                'description' => 'Дополнительные карты бесплатно',
            ],
            [
                'icon' => '/frontend/dist/img/pb-images/pb-supreme-icons/spb-icon.svg',
                'description' => 'Переводы по&nbsp;номеру телефона до&nbsp;1&nbsp;млн ₽&nbsp;в&nbsp;другие банки по&nbsp;СБП без комиссии',
            ],
        ]
    ],
    'bank_for_you' => [
        'title' => 'Банк для вас',
        'items' => [
            [
                'title' => 'Привилегии',
                'image' => '/frontend/dist/img/pb-images/pb-stars.png',
                'list' => [
                    'Безлимитный доступ в&nbsp;Бизнес-залы аэропортов и&nbsp;ж/д вокзалов по&nbsp;всему миру с&nbsp;сервисом MileOnAir/OnPass',
                    'Специальная партнёрская программас SimpleWinePrive, Beluga Boutique, Wheely, Novikov Group и&nbsp;другими',
                    'Сотрудничество с&nbsp;группой &laquo;Михайлов и&nbsp;партнёры&raquo;&nbsp;&mdash; экспертами в&nbsp;правовых вопросах, налогообложения, наследства, брачно-семейных отношений и&nbsp;прочих',
                ],
            ],
            [
                'title' => 'Наличный оборот',
                'text' => 'Льготный курс обмена валют и&nbsp;услуги инкассации и&nbsp;доставки наличности',
                'image' => '/frontend/dist/img/pb-images/pb-coins.png',
            ],
            [
                'title' => 'Сделки с недвижимостью ',
                'text' => 'Особые условия по&nbsp;ипотеке и&nbsp;сопровождение сделок с&nbsp;недвижимостью (аккредитив',
                'image' => '/frontend/dist/img/pb-images/pb-estate.png',
            ],
        ]
    ],
    'services' => [
        'finance' => [
            'title' => 'Финансовые <span class="d-none d-md-inline">услуги</span>',
            'items' => [
                [
                    'title' => 'Векселя',
                    'text' => 'Доходный и&nbsp;надёжный инструмент инвестирования временно свободных денежных средств. Предлагаем дисконтные, простые процентные и&nbsp;беспроцентные векселя',
                    'image' => '/frontend/dist/img/pb-images/pb-finance-cards/veksel.png',
                ],
                [
                    'title' => 'Перевозка ценностей',
                    'text' => 'Мы&nbsp;располагаем надёжным специализированным транспортом и&nbsp;опытными специалистами: инкассаторами, охраной и&nbsp;кассирами.',
                    'image' => '/frontend/dist/img/pb-images/pb-finance-cards/logistic.png',
                ],
                [
                    'title' => 'Индивидуальные ячейки',
                    'text' => 'Мы&nbsp;располагаем надёжным специализированным транспортом и&nbsp;опытными специалистами: инкассаторами, охраной и&nbsp;кассирами.',
                    'image' => '/frontend/dist/img/pb-images/pb-finance-cards/individualСells.png',
                ],
                [
                    'title' => 'Текущие счета в пяти валютах',
                    'text' => 'Мы&nbsp;располагаем надёжным специализированным транспортом и&nbsp;опытными специалистами: инкассаторами, охраной и&nbsp;кассирами.',
                    'image' => '/frontend/dist/img/pb-images/pb-finance-cards/currentAccount.png',
                ],
                [
                    'title' => 'Конверсионные операции по лучшему курсу',
                    'text' => 'Мы&nbsp;располагаем надёжным специализированным транспортом и&nbsp;опытными специалистами: инкассаторами, охраной и&nbsp;кассирами.',
                    'image' => '/frontend/dist/img/pb-images/pb-finance-cards/conversionOperations.png',
                ],
            ],
        ],
        'investment' => [
            'title' => 'Инвестиционные <span class="d-none d-md-inline">услуги</span>',
            'items' => [
                [
                    'title' => 'Брокерское обслуживание',
                    'text' => 'Совершение сделок с&nbsp;обеспечением рыночных цен и&nbsp;услуг для достижения ваших целей.',
                    'image' => '/frontend/dist/img/pb-images/pb-investment-cards/pb-investment-broker.png',
                ],
                [
                    'title' => 'Доверительное управление',
                    'text' => 'Профессиональное управление инвестиционным портфелем для максимальной выгоды.',
                    'image' => '/frontend/dist/img/pb-images/pb-investment-cards/pb-investment-management.png',
                ],
                [
                    'title' => 'Депозитарное обслуживание',
                    'text' => 'Сопровождение сделок и&nbsp;консультации по&nbsp;вопросам управления активами.',
                    'image' => '/frontend/dist/img/pb-images/pb-investment-cards/pb-investment-deposit.png',
                ],
                [
                    'title' => 'Инвестиционное консультирование',
                    'text' => 'Персонализированный подход к&nbsp;подбору стратегий и&nbsp;инструментов инвестирования.',
                    'image' => '/frontend/dist/img/pb-images/pb-investment-cards/pb-investment-consulting.png',
                ],
            ],
        ],
    ],
    'contacts' => [
        'full_address' => '119180 Москва,ул. Большая Полянка д.&nbsp;50/1&nbsp;стр.&nbsp;1',
        'email' => 'vip@novikom.ru',
        'phone' => '+7 800 250-70-07',
        'image' => '/frontend/dist/img/pb-images/pb-contact-qr.png',
        'map' => '/frontend/dist/img/pb-images/pb-contact-map.png',
    ],
    'footer' => [
        'copyright' => 'Генеральная лицензия № 2546 от 20 ноября 2014 года <br>© 2009 – 2024 АО АКБ «НОВИКОМБАНК»',
        'phone' => '+7 (800) 250-70-07',
        'full_address' => '119180 Москва, ул. Большая Полянка д. 50/1 стр. 1',
    ]
];

?>

<?php
// hero
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "hero", // и отрисовывает в шаблоне
    [
        'CODE' => 'hero',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
// special_conditions
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "special_conditions", // и отрисовывает в шаблоне
    [
        'CODE' => 'special_conditions',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
// supreme
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "supreme", // и отрисовывает в шаблоне
    [
        'CODE' => 'supreme',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
// bank_for_you
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "bank_for_you", // и отрисовывает в шаблоне
    [
        'CODE' => 'bank_for_you',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
// services
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "services", // и отрисовывает в шаблоне
    [
        'CODE' => 'services',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
// become_client
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "become_client", // и отрисовывает в шаблоне
    [
        'CODE' => 'become_client',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php
// contacts
$APPLICATION->IncludeComponent(
    "dalee:content.json", // Компонент достает значение из свойства CONTENT_JSON
    "contacts", // и отрисовывает в шаблоне
    [
        'CODE' => 'contacts',
        'PROPERTY_CODE' => 'CONTENT_JSON',
        'IBLOCK_ID' => iblock('pb_blocks_index'),
    ]
);?>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
