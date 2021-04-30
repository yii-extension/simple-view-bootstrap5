<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Yii\Bootstrap5\Assets\BootstrapAsset;

final class ViewBootstrap5Asset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@simple-view-bootstrap5/storage/asset/css';

    /** @var array */
    public array $css = [
        'site.css'
    ];

    /** @var array */
    public array $depends = [
        BootstrapAsset::class,
        BootstrapIconsAsset::class,
    ];
}
