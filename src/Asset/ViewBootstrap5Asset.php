<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Asset;

use Yii\Extension\Asset\Bootstrap5\Bootstrap5Asset;
use Yii\Extension\Asset\Bootstrap5\Bootstrap5IconsAsset;
use Yiisoft\Assets\AssetBundle;

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
        Bootstrap5Asset::class,
        Bootstrap5IconsAsset::class,
    ];
}
