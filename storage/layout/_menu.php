<?php

declare(strict_types=1);

use Yii\Extension\Bootstrap5\Nav;
use Yii\Extension\Bootstrap5\NavBar;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;
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
                ->options(['csrf' => $csrf, 'encode' => false])
                ->begin() .
                    Html::submitButton(
                        'Logout (' . Html::encode($user->getIdentity()->getUsername()) . ')',
                        [
                            'id' => 'logout',
                            'encode' => false,
                        ],
                    ) .
                Form::end(),
            'encode' => false,
            'linkOptions' => ['encode' => false],
            'options' => ['encode' => false],
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
    ->begin();

    Nav::widget()
        ->attributes(['class' => 'navbar-nav me-auto'])
        ->currentPath($currentUrl)
        ->items($menuItems);

NavBar::end();
