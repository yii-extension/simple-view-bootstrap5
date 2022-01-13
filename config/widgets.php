<?php

declare(strict_types=1);

use Yii\Extension\Bootstrap5\Nav;
use Yii\Extension\Bootstrap5\NavBar;

/** @var array $params */

return [
    Nav::class => [
        'attributes()' => [['class' => 'navbar-nav ms-auto mb-2 mb-lg-0']],
    ],

    NavBar::class => [
        'attributes()' => [['class' => 'navbar navbar-dark navbar-expand-lg bg-dark']],
    ],
];
