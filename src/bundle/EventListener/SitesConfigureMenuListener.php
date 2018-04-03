<?php

namespace Edgar\EzUISEOBundle\EventListener;

use eZ\Publish\API\Repository\PermissionResolver;
use Edgar\EzUISitesBundle\EventListener\ConfigureMenuListener;
use EzSystems\EzPlatformAdminUi\Menu\Event\ConfigureMenuEvent;
use JMS\TranslationBundle\Model\Message;
use JMS\TranslationBundle\Translation\TranslationContainerInterface;

class SitesConfigureMenuListener implements TranslationContainerInterface
{
    const ITEM_SITES_ROBOTS = 'main__sites__robots';
    const ITEM_SITES_SITEMAP = 'main__sites__sitemap';

    /** @var PermissionResolver */
    private $permissionResolver;

    /**
     * ConfigureMenuListener constructor.
     *
     * @param PermissionResolver $permissionResolver
     */
    public function __construct(
        PermissionResolver $permissionResolver
    ) {
        $this->permissionResolver = $permissionResolver;
    }

    /**
     * @param ConfigureMenuEvent $event
     */
    public function onMenuConfigure(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu()->getChild(ConfigureMenuListener::ITEM_SITES);

        if ($this->permissionResolver->hasAccess('uiseo', 'robots')) {
            $menu->addChild(
                self::ITEM_SITES_ROBOTS,
                [
                    'route' => 'edgar.ezuiseo.robots',
                    'extras' => ['icon' => 'pin'],
                ]
            );
        }

        if ($this->permissionResolver->hasAccess('uiseo', 'sitemap')) {
            $menu->addChild(
                self::ITEM_SITES_SITEMAP,
                [
                    'route' => 'edgar.ezuiseo.sitemap',
                    'extras' => ['icon' => 'pin'],
                ]
            );
        }
    }

    /**
     * @return array
     */
    public static function getTranslationMessages(): array
    {
        return [
            (new Message(self::ITEM_SITES_ROBOTS, 'messages'))->setDesc('robots.txt'),
            (new Message(self::ITEM_SITES_SITEMAP, 'messages'))->setDesc('sitemap'),
        ];
    }
}
