<?php

declare(strict_types=1);

use Yiisoft\Html\Html;

$title = $translator->translate('My Project', [], 'simple-view-bootstrap5');

$this->setTitle(Html::encode($title));
?>

<div class="jumbotron jumbotron-fluid text-center">
    <h1 class="title"><?= $translator->translate('Hello!', [], 'simple-view-bootstrap5') ?></h1>

    <p class="subtitle">
        <?= $translator->translate(
            "Let's start something great with <strong>Yii3</strong>!",
            [],
            'simple-view-bootstrap5'
        ) ?>
    </p>

    <p class="subtitle">
        <a href="https://github.com/yiisoft/docs/tree/master/guide/en" target="_blank" rel="noopener">
            <?= $translator->translate("Don't forget to check the guide.", [], 'simple-view-bootstrap5') ?>
        </a>
    </p>
</div>
