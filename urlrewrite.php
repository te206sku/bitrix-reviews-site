<?php
$arUrlRewrite = array(
    array(
        'CONDITION' => '#^/services/#',
        'RULE' => '',
        'ID' => 'bitrix:catalog',
        'PATH' => '/services/index.php',
        'SORT' => 100,
    ),
    array(
        'CONDITION' => '#^/products/#',
        'RULE' => '',
        'ID' => 'bitrix:catalog',
        'PATH' => '/products/index.php',
        'SORT' => 100,
    ),
    array(
        'CONDITION' => '#^/news/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/news/index.php',
        'SORT' => 100,
    ),
    array(
        'CONDITION' => '#^/reviews/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/reviews/index.php',
        'SORT' => 100,
    ),
);