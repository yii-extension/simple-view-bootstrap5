<?php

declare(strict_types=1);

use Simple\View\Bootstrap5\Handler\NotFoundHandler;
use Simple\View\Bootstrap5\ViewInjection\CommonViewInjection;
use Simple\View\Bootstrap5\ViewInjection\LayoutViewInjection;
use Yiisoft\Definitions\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@simple-view-bootstrap5' => '@vendor/yii-extension/simple-view-bootstrap5',
            '@layout' => '@simple-view-bootstrap5/views/layout',
        ]
    ],

    'yiisoft/yii/http' => [
        'notFoundHandler' => NotFoundHandler::class,
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CommonViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
        ],
    ],

    'yiisoft/translator' => [
        'categorySources' => [
            Reference::to('categorySourceSimpleViewBootstrap5'),
        ],
    ],
];
