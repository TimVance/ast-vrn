<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/o-kompanii/novosti/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/o-kompanii/novosti/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/o-kompanii/aktsii/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/o-kompanii/aktsii/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/galereya/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/galereya/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/katalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/katalog/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/novosti/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/novosti/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/uslugi/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/uslugi/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/aktsii/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/aktsii/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
