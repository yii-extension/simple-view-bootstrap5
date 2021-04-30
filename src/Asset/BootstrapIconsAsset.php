<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class BootstrapIconsAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@npm/bootstrap-icons';

    /** @var array */
    public array $css = [
        'font/bootstrap-icons.css',
    ];

    /** @var array */
    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = [
            'filter' => $pathMatcher->only(
                '**/font/bootstrap-icons.css',
                '**/font/fonts/*',
                '**/bootstrap-icons.svg',
            ),
        ];
    }
}
