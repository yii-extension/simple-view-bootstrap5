<?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\CategorySource;
use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\Message\Php\MessageSource;

return [
    'categorySourceSimpleViewBootstrap5' => static function (Aliases $aliases, MessageFormatterInterface $messageFormatter) {
        $messageReader = new MessageSource($aliases->get('@translations'));

        return new CategorySource('simple-view-bootstrap5', $messageReader, $messageFormatter);
    },
];
