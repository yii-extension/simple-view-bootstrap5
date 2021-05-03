<?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\CategorySource;
use Yiisoft\Translator\Message\Php\MessageSource;
use Yiisoft\Translator\MessageFormatterInterface;

return [
    'categorySourceSimpleViewBootstrap5' => static function (Aliases $aliases, MessageFormatterInterface $messageFormatter) {
        $messageReader = new MessageSource($aliases->get('@translations'));

        return new CategorySource('simple-view-bootstrap5', $messageReader, $messageFormatter);
    },
];
