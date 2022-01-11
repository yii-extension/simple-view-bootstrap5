<?php

declare(strict_types=1);

use Simple\View\Bootstrap5\Asset\ViewBootstrap5Asset;
use Yii\Extension\Asset\Bootstrap5\Bootstrap5IconsAsset;
use Yii\Extension\Bootstrap5\AlertFlash;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var Aliases $aliases
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var CurrentRoute $currentRoute
 * @var Flash $flash
 * @var TranslatorInterface $translator
 * @var WebView $this
 */

$assetManager->registerMany([ViewBootstrap5Asset::class]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class="h-100" lang="en">
        <?= $this->render('_head') ?>
        <?php $this->beginBody() ?>
            <body class="d-flex h-100 text-black">
                <div class="cover-container-fluid d-flex w-100 h-100 mx-auto flex-column">
                    <header class="mb-auto">
                        <?= $this->render('_menu') ?>
                        <?= AlertFlash::widget([$flash])
                            ->bodyContainer()
                            ->bodyContainerAttributes(['class' => 'align-items-center d-flex'])
                            ->iconAttributes(['class' => 'fs-2 me-4'])
                            ->layoutBody('{icon}{body}{button}')
                            ->render() ?>
                    </header>
                    <main class="px-3">
                        <?= $content ?>
                    </main>
                    <footer class='mt-auto bg-dark py-3'>
                        <?= $this->render('_footer') ?>
                    </footer>
                </div>
            </body>
        <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>
