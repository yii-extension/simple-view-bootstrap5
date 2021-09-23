<?php

declare(strict_types=1);

use Yii\Extension\Bootstrap5\Nav;
use Yii\Extension\Bootstrap5\NavBar;
use Yii\Extension\Simple\Forms\Form;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $csrf
 * @var CurrentRoute $currentRoute
 * @var bool|null $isGuest
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var string $userName
 */

$currentUrl = '';
$isGuest = $isGuest ?? null;
$menuItems = [];

if ($isGuest === false) {
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->csrf($csrf)
                ->begin() .
                    Button::tag()
                    ->class('btn btn-light btn-sm')
                    ->content(
                        'Logout (' . $userName . ')'
                    )
                    ->id('logout')
                    ->type('submit') .
                Form::end(),
        ]
    ];
}

if ($currentRoute->getRoute() !== null) {
    $currentUrl = $currentRoute->getUri() !== null ? $currentRoute->getUri()->getPath() : '';
}
?>

<?= NavBar::widget()
    ->attributes(['class' => 'navbar navbar-dark navbar-expand-lg bg-dark'])
    ->brandText($translator->translate('My Project', [], 'simple-view-bootstrap5'))
    ->begin() ?>

    <?= Nav::widget()
        ->attributes(['class' => 'navbar-nav ms-auto mb-2 mb-lg-0'])
        ->currentPath($currentUrl)
        ->items($menuItems) ?>

<?= NavBar::end();
