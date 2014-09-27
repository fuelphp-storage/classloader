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

class StringTest extends Test
{

	/**
	 * @var String
	 */
	protected $string;

	protected function _before()
	{
		$this->string = new String;
	}

	public function testForge()
	{
		$this->assertInstanceOf(
			'stdClass',
			$this->string->forge('stdClass')
		);
	}

	/**
	 * @expectedException \Fuel\ClassLoader\ResourceNotFoundException
	 */
	public function testForgeInvalid()
	{
		$this->string->forge('NotAClass');
	}

}
