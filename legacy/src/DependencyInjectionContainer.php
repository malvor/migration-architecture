<?php

declare(strict_types=1);

namespace Legacy;

use Symfony\Component\DependencyInjection\ContainerBuilder;

final class DependencyInjectionContainer
{
    /** @var DependencyInjectionContainer */
    private static $instance;

    /** @var ContainerBuilder */
    private $container;

    /** @return DependencyInjectionContainer */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setContainer(ContainerBuilder $container): void
    {
        $this->container = $container;
    }

    public function getContainer(): ContainerBuilder
    {
        return $this->container;
    }
}
