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
 * Resolves classes from closures.
 *
 * @package Fuel\ClassLoader\Forge
 *
 * @since 2.0
 */
class Closure implements ResourceForgeInterface
{

	/**
	 * {@inheritdoc}
	 *
	 * @param \Callable $identifier
	 *
	 * @since 2.0
	 */
	public function forge($identifier)
	{
		if ( ! is_callable($identifier))
		{
			throw new ResourceNotFoundException("CLO-004: [$identifier] is not a callable.");
		}

		return $identifier();
	}

}
