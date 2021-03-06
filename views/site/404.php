<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var CurrentRoute $currentRoute
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var WebView $this
 */

$this->setTitle('404');
?>

<h1 class="fw-bold text-center"><?= Html::encode($this->getTitle()) ?></h1>

<p class="text-center text-danger">
    <?= $translator->translate('The page', [], 'simple-view-bootstrap5') ?>
    <strong><?= Html::encode($currentRoute->getUri() !== null ? $currentRoute->getUri()->getPath() : '') ?></strong>
    <?= $translator->translate('not found', [], 'simple-view-bootstrap5') ?>.
</p>

<p class="text-center">
    <?= $translator->translate(
        'The above error occurred while the Web server was processing your request',
        [],
        'simple-view-bootstrap5',
    ) ?>.
    <br/>
    <?= $translator->translate(
        'Please contact us if you think this is a server error. Thank you',
        [],
        'simple-view-bootstrap5',
    ) ?>.
</p>

<hr class="mb-3">

<div class="text-center">
    <a class ="btn btn-danger" href="<?= $urlGenerator->generate('home') ?>">
        <?= $translator->translate('Go Back Home', [], 'simple-view-bootstrap5') ?>
    </a>
</div>
