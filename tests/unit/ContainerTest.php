<?php
/**
 * @package Fuel\ClassLoader
 * @version 2.0
 * @author Fuel Development Team
 * @license MIT License
 * @copyright 2010 - 2014 Fuel Development Team
 * @link http://fuelphp.com
 */

namespace Fuel\ClassLoader;

use Codeception\TestCase\Test;
use stdClass;

class ContainerTest extends Test
{

	/**
	 * @var Container
	 */
	protected $container;

	protected function _before()
	{
		$this->container = new Container;
	}

	public function testResolveWithString()
	{
		$class = 'stdClass';
		$name = 'test';

		$this->container->register($name, $class);

		$this->assertInstanceOf(
			$class,
			$this->container->resolve($name)
		);
	}

	public function testResolveWithClosure()
	{
		$name = 'closure';
		$closure = function(){
			return new stdClass;
		};

		$this->container->register($name, $closure);

		$this->assertInstanceOf(
			'stdClass',
			$this->container->resolve($name)
		);
	}

	/**
	 * @expectedException \Fuel\ClassLoader\UnknownResourceException
	 */
	public function testUnknownResolve()
	{
		$this->container->resolve('does not exist');
	}


}
