<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Yiisoft\Http\Status;
use Yiisoft\Yii\View\ViewRenderer;

final class NotFoundHandler implements RequestHandlerInterface
{
    public function __construct(private ViewRenderer $viewRenderer)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer
            ->withViewPath('@simple-view-bootstrap5/views')
            ->render('site/404')
            ->withStatus(Status::NOT_FOUND);
    }
}
