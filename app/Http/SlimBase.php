<?php

namespace App\Http;

use Slim\Container;

abstract class SlimBase
{
    /**
     * App container
     * @var Container
     */
    private $container;

    /**
     * Inject items to the app container.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Get items from the app container.
     * @return mixed
     */
    public function  __get($key)
    {
        if ($this->container->{$key}) {
            return $this->container->{$key};
        }
    }
}
