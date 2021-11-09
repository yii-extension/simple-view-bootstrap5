<?php

declare(strict_types=1);

namespace Simple\View\Bootstrap5\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Yiisoft\Http\Status;
use Yiisoft\Router\CurrentRouteInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class NotFoundHandler implements RequestHandlerInterface
{
    private CurrentRouteInterface $currentRoute;
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;
    private ViewRenderer $viewRenderer;

    public function __construct(
        CurrentRouteInterface $currentRoute,
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator,
        ViewRenderer $viewRenderer
    ) {
        $this->currentRoute = $currentRoute;
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
        $this->viewRenderer = $viewRenderer->withControllerName('site');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer
            ->withViewPath('@simple-view-bootstrap5/storage/views')
            ->render(
                '404',
                [
                    'currentRoute' => $this->currentRoute,
                    'translator' => $this->translator,
                    'urlGenerator' => $this->urlGenerator,
                ],
            )
            ->withStatus(Status::NOT_FOUND);
    }
}
