<?php


namespace Fuel\ClassLoader;

use Codeception\TestCase\Test;

class HelloTest extends Test
{
	public function testReturnTrue()
	{
		$this->assertTrue((new Hello)->returnTrue());
	}
}
