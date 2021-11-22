<?php

declare(strict_types=1);

use Yii\Extension\Bootstrap5\Nav;
use Yii\Extension\Bootstrap5\NavBar;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var CsrfTokenInterface $csrf
 * @var CurrentRoute $currentRoute
 * @var bool|null $isGuest
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var string $userName
 * @var WebView $this
 */

$isGuest = $isGuest ?? null;
$menuItems = $this->getParameter('menuItemsIsGuest', []);

if ($isGuest === false) {
    $menuItems = $this->getParameter('menuItemsIsNotGuest', []);
    $menuItems[] = [
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
    ];
}

$currentUrl = $currentRoute->getUri() !== null ? $currentRoute->getUri()->getPath() : '';
?>

<?= NavBar::widget()->brandText($translator->translate('My Project', [], 'simple-view-bootstrap5'))->begin() ?>
    <?= Nav::widget()->currentPath($currentUrl)->items($menuItems) ?>
<?= NavBar::end();
