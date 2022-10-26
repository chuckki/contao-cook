<?php

namespace Chuckki\ContaoCookBundle\ContaoManager;

use Chuckki\ContaoCookBundle\ChuckkiContaoCookBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ChuckkiContaoCookBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
