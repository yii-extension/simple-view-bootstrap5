<?php

declare(strict_types=1);

/**
 * @var App\ApplicationParameters $app
 * @var Yiisoft\Yii\Web\User\User $user
 * @var array $menuItems
 */

use Yiisoft\Yii\Bootstrap5\Nav;
use Yiisoft\Yii\Bootstrap5\NavBar;
use Yiisoft\Html\Html;

$config = [
    'brandLabel()' => ['My Project'],
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
