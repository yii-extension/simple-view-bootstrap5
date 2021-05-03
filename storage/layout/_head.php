<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\View\WebView;

/**
 * @var string $csrf
 * @var WebView $this
 */
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf" content = <?= $csrf ?>>

    <title><?= Html::encode($this->getTitle()) ?></title>

    <?php $this->head() ?>
</head>
