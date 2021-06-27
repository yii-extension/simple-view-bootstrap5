<?php

declare(strict_types=1);

use Simple\View\Bootstrap5\Asset\ViewBootstrap5Asset;
use Yii\Extension\Asset\Bootstrap5\Bootstrap5IconsAsset;
use Yii\Extension\Bootstrap5\AlertFlash;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Html\Html;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var Flash $flash
 * @var TranslatorInterface $translator
 * @var UrlMatcherInterface $urlMatcher
 * @var WebView $this
 */

$assetManager->register([
    ViewBootstrap5Asset::class,
]);

$aliases->set('@icons', $assetManager->getBundle(Bootstrap5IconsAsset::class)->baseUrl);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class="h-100" lang="en">

        <?= $this->render('_head', ['csrf' => $csrf]) ?>

        <?php $this->beginBody() ?>

            <body class="d-flex h-100 text-center text-black">
                <div class="cover-container-fluid d-flex w-100 h-100 mx-auto flex-column">
                    <header class="mb-auto">
                        <?= $this->render(
                            '_menu',
                            [
                                'csrf' => $csrf,
                                'translator' => $translator,
                                'urlGenerator' => $urlGenerator,
                                'urlMatcher' => $urlMatcher,
                                'user' => $user ?? [],
                            ]
                        ) ?>
                        <?= AlertFlash::widget([$flash]) ?>
                    </header>

                    <main class="px-3">
                        <?= $content ?>
                    </main>

                    <footer class='mt-auto bg-dark py-3'>
                        <?= $this->render('_footer', ['aliases' => $aliases]) ?>
                    </footer>

                </div>

            </body>

        <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>
