<?php

namespace Commander\Service;

use Psr\Container\ContainerInterface;

trait ServiceTrait
{
    /**
     * Dependency container
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     *
     * @return void
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
