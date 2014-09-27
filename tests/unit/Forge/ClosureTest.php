<?php
/**
 * @package Fuel\ClassLoader
 * @version 2.0
 * @author Fuel Development Team
 * @license MIT License
 * @copyright 2010 - 2014 Fuel Development Team
 * @link http://fuelphp.com
 */

namespace Fuel\ClassLoader\Forge;

use Codeception\TestCase\Test;
use stdClass;

class ClosureTest extends Test
{

	/**
	 * @var Closure
	 */
	protected $closure;

	protected function _before()
	{
		$this->closure = new Closure;
	}

	public function testForge()
	{
		$closure = function(){
			return new stdClass;
		};

		$this->assertInstanceOf(
			'stdClass',
			$this->closure->forge($closure)
		);
	}

	/**
	 * @expectedException \Fuel\ClassLoader\ResourceNotFoundException
	 */
	public function testForgeInvalid()
	{
		$this->closure->forge('stdClass');
	}

}
