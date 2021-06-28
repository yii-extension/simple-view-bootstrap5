<?php

declare(strict_types=1);

use Yii\Extension\Bootstrap5\Nav;
use Yii\Extension\Bootstrap5\NavBar;
use Yii\Extension\Simple\Forms\Form;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var CsrfTokenInterface $csrf
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var UrlMatcherInterface $urlMatcher
 */

$config = [

];

$currentUrl = '';
$menuItems = [];

if ($user !== [] && !$user->isGuest()) {
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->csrf($csrf)
                ->begin() .
                    Button::tag()
                    ->class('btn btn-light btn-sm')
                    ->content(
                        'Logout (' . $user->getIdentity()->getUsername() . ')'
                    )
                    ->type('submit') .
                Form::end(),
        ]
    ];
}

if ($urlMatcher->getCurrentRoute() !== null) {
    $currentUrl = $urlMatcher->getCurrentUri()->getPath();
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
