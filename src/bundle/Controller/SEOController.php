<?php

namespace Edgar\EzUISEOBundle\Controller;

use EzSystems\EzPlatformAdminUi\Notification\NotificationHandlerInterface;
use EzSystems\EzPlatformAdminUiBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Translation\TranslatorInterface;

class SEOController extends Controller
{
    /** @var TokenStorage $tokenStorage */
    protected $tokenStorage;

    /** @var NotificationHandlerInterface $notificationHandler */
    protected $notificationHandler;

    /** @var TranslatorInterface  */
    protected $translator;

    public function __construct(
        TokenStorage $tokenStorage,
        NotificationHandlerInterface $notificationHandler,
        TranslatorInterface $translator
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->notificationHandler = $notificationHandler;
        $this->translator = $translator;
    }

    public function robotsAction()
    {
        return $this->render('@EdgarEzUISEO/sites/seo/robots.html.twig', [
        ]);
    }

    public function sitemapAction()
    {
        return $this->render('@EdgarEzUISEO/sites/seo/sitemap.html.twig', [
        ]);
    }
}
