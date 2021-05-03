<?php

declare(strict_types=1);

/**
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlMatcherInterface $urlMatcher
 */

use Yiisoft\Yii\Bootstrap5\Nav;
use Yiisoft\Yii\Bootstrap5\NavBar;
use Yiisoft\Html\Html;

$config = [
    'brandLabel()' => [$translator->translate('My Project', [], 'simple-view-bootstrap5')],
    'options()' => [['class' => 'navbar navbar-dark navbar-expand-lg bg-dark']],
];

$currentUrl = '';
$menuItems = [];

if ($urlMatcher->getCurrentRoute() !== null) {
    $currentUrl = $urlMatcher->getCurrentUri()->getPath();
}

?>

<?= NavBar::widget($config)->begin() ?>

    <?= Nav::widget()
        ->currentPath($currentUrl)
        ->items($menuItems)
        ->options(['class' => 'navbar-nav me-auto'])
    ?>

<?= NavBar::end();
