<?php

namespace Edgar\EzUISEOBundle;

use Edgar\EzUISEOBundle\DependencyInjection\Security\PolicyProvider\UISEOPolicyProvider;
use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\EzPublishCoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EdgarEzUISEOBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        /** @var EzPublishCoreExtension $eZExtension */
        $eZExtension = $container->getExtension('ezpublish');
        $eZExtension->addPolicyProvider(new UISEOPolicyProvider($this->getPath()));
    }
}
