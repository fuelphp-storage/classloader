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

use Fuel\ClassLoader\ResolveException;

/**
 * Defines a class that can resolve a particular identifier.
 *
 * @package Fuel\ClassLoader
 *
 * @since 2.0
 */
interface ResourceForgeInterface
{

	/**
	 * Returns a constructed instance of the identifier.
	 *
	 * @param mixed $identifier The name or identifier to be resolved.
	 *
	 * @return mixed
	 *
	 * @throws ResolveException Thrown if the resource cannot be resolved.
	 *
	 * @since 2.0
	 */
	public function forge($identifier);

}
