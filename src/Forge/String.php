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

use Fuel\ClassLoader\ResourceForgeInterface;
use Fuel\ClassLoader\ResourceNotFoundException;

/**
 * Resolves classes from string names.
 *
 * @package Fuel\ClassLoader\Forge
 *
 * @since 2.0
 */
class String implements ResourceForgeInterface
{

	/**
	 * {@inheritdoc}
	 *
	 * @param string $identifier
	 *
	 * @since 2.0
	 */
	public function forge($identifier)
	{
		if ( ! class_exists($identifier))
		{
			throw new ResourceNotFoundException("CLO-001: [$identifier] is not a resolvable class.");
		}

		return new $identifier;
	}

}
