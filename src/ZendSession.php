<?php
/**
 * This file is part of phpab/phpab. (https://github.com/phpab/phpab)
 *
 * @link https://github.com/phpab/phpab for the canonical source repository
 * @copyright Copyright (c) 2015-2016 phpab. (https://github.com/phpab/)
 * @license https://raw.githubusercontent.com/phpab/phpab/master/LICENSE.md MIT
 */

namespace PhpAb\Storage\Adapter;

use Zend\Session\Container;

/**
 * An adapter that makes use of zendframework/zend-session.
 *
 * @package PhpAb
 */
class ZendSession implements AdapterInterface
{
    /**
     * @var Container The session container used to store data.
     */
    private $container;

    /**
     * Initializes a new instance of this class.
     *
     * @param Container $container The container used to store data.
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $identifier The tests identifier
     */
    public function has($identifier)
    {
        return $this->container->offsetExists($identifier);
    }

    /**
     * {@inheritDoc}
     *
     * @param string $identifier The tests identifier name
     */
    public function get($identifier)
    {
        if (!$this->has($identifier)) {
            return null;
        }

        return $this->container[$identifier];
    }

    /**
     * {@inheritDoc}
     *
     * @param string $identifier The tests identifier
     * @param mixed  $participation The participated variant
     */
    public function set($identifier, $participation)
    {
        $this->container[$identifier] = $participation;
    }

    /**
     * {@inheritDoc}
     */
    public function all()
    {
        return $this->container->getArrayCopy();
    }

    /**
     * {@inheritDoc}
     *
     * @param string $identifier The identifier of the test to remove.
     */
    public function remove($identifier)
    {
        if (!$this->has($identifier)) {
            return null;
        }

        $removedValue = $this->container[$identifier];

        unset($this->container[$identifier]);

        return $removedValue;
    }

    /**
     * {@inheritDoc}
     */
    public function clear()
    {
        $removedValues = $this->all();

        $this->container->getManager()->getStorage()->clear($this->container->getName());

        return $removedValues;
    }
}
