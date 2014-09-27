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

class ForgeFactoryTest extends Test
{

	/**
	 * @var ForgeFactory
	 */
	protected $forge;

	protected function _before()
	{
		$this->forge = new ForgeFactory;
	}

	public function testCanForge()
	{
		$this->assertFalse($this->forge->canForge('fakeClass'));
		$this->assertTrue($this->forge->canForge('string'));
	}

	public function testForge()
	{
		$this->assertInstanceOf(
			'stdClass',
			$this->forge->forge('stdClass')
		);
	}

	/**
	 * @expectedException \Fuel\ClassLoader\UnforgableResourceException
	 */
	public function testInvalidForge()
	{
		$this->forge->forge(new stdClass);
	}


}
