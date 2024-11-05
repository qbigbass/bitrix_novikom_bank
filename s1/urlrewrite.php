<?php
$arUrlRewrite=array (
  7 => 
  array (
    'CONDITION' => '#^/for-private-clients/cards/([a-zA-Z0-9_-]*)/([a-zA-Z0-9_-]*)/([a-zA-Z0-9_-]*)/(.*)#',
    'RULE' => 'SECTION_CODE=$1&&ELEMENT_CODE=$2&DETAIL_ELEMENT_CODE=$3',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/for-private-clients/cards/detail.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/for-private-clients/cards/([a-zA-Z0-9_-]*)/(.*)#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/for-private-clients/cards/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/for-private-clients/loans/restructuring/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/for-private-clients/loans/restructuring/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/video([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1&videoconf',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/for-private-clients/loans/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/for-private-clients/loans/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/loans/restructuring/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/loans/restructuring/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/mortgage/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/mortgage/index.php',
    'SORT' => 100,
  ),
  14 => 
  array (
    'CONDITION' => '#^/deposits/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/deposits/index.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/loans/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/loans/index.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/cards/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/cards/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
