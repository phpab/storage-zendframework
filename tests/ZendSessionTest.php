<?php
/**
 * This file is part of phpab/phpab. (https://github.com/phpab/phpab)
 *
 * @link https://github.com/phpab/phpab for the canonical source repository
 * @copyright Copyright (c) 2015-2016 phpab. (https://github.com/phpab/)
 * @license https://raw.githubusercontent.com/phpab/phpab/master/LICENSE.md MIT
 */

namespace PhpAb\Storage\Adapter;

use PHPUnit_Framework_TestCase;
use Zend\Session\Container;

class ZendSessionTest extends PHPUnit_Framework_TestCase
{
    private $container;
    private $adapter;

    protected function setUp()
    {
        parent::setUp();

        $this->container = new Container();
        $this->container->getManager()->getStorage()->clear($this->container->getName());

        $this->adapter = new ZendSession($this->container);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::has
     */
    public function testHasFalse()
    {
        // Arrange
        // ...

        // Act
        $result = $this->adapter->has('test');

        // Assert
        $this->assertFalse($result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::has
     */
    public function testHasFalseWithNull()
    {
        // Arrange
        $this->adapter->set('test', null);

        // Act
        $result = $this->adapter->has('test');

        // Assert
        $this->assertFalse($result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::has
     */
    public function testHasTrue()
    {
        // Arrange
        $this->adapter->set('test', 'participation');

        // Act
        $result = $this->adapter->has('test');

        // Assert
        $this->assertTrue($result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::get
     */
    public function testGetInvalid()
    {
        // Arrange
        // ...

        // Act
        $result = $this->adapter->get('test');

        // Assert
        $this->assertNull($result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::get
     */
    public function testGetValid()
    {
        // Arrange
        $this->adapter->set('test', 'participation');

        // Act
        $result = $this->adapter->get('test');

        // Assert
        $this->assertEquals('participation', $result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::set
     */
    public function testSetString()
    {
        // Arrange
        $this->adapter->set('test', 'participation');

        // Act
        $result = $this->adapter->get('test');

        // Assert
        $this->assertEquals('participation', $result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::set
     */
    public function testSetNull()
    {
        // Arrange
        $this->adapter->set('test', null);

        // Act
        $result = $this->adapter->get('test');

        // Assert
        $this->assertNull($result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::all
     */
    public function testAllEmpty()
    {
        // Arrange
        // ...

        // Act
        $result = $this->adapter->all();

        // Assert
        $this->assertEquals([], $result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::all
     */
    public function testAllFilled()
    {
        // Arrange
        $this->adapter->set('key1', 'value1');
        $this->adapter->set('key2', 'value2');

        // Act
        $result = $this->adapter->all();

        // Assert
        $this->assertEquals([
            'key1' => 'value1',
            'key2' => 'value2',
        ], $result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::remove
     */
    public function testRemoveEmpty()
    {
        // Arrange
        // ...

        // Act
        $result = $this->adapter->remove('key1');

        // Assert
        $this->assertNull($result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::remove
     */
    public function testRemoveFilled()
    {
        // Arrange
        $this->adapter->set('key1', 'value1');
        $this->adapter->set('key2', 'value2');

        // Act
        $result = $this->adapter->remove('key1');

        // Assert
        $this->assertEquals('value1', $result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::clear
     */
    public function testClearEmpty()
    {
        // Arrange
        // ...

        // Act
        $result = $this->adapter->clear();

        // Assert
        $this->assertEquals([], $result);
    }

    /**
     * @covers PhpAb\Storage\Adapter\ZendSession::__construct
     * @covers PhpAb\Storage\Adapter\ZendSession::clear
     */
    public function testClearFilled()
    {
        // Arrange
        $this->adapter->set('key1', 'value1');
        $this->adapter->set('key2', 'value2');

        // Act
        $result = $this->adapter->clear();

        // Assert
        $this->assertEquals([
            'key1' => 'value1',
            'key2' => 'value2',
        ], $result);
    }
}
