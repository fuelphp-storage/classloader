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

/**
 * Class Container
 *
 * @package Fuel\ClassLoader
 *
 * @since 2.0
 */
class Container
{

	/**
	 * Contains our known resources
	 *
	 * @var array
	 */
	protected $resources = [];

	/**
	 * Allows the container to forge instances.
	 *
	 * @var ForgeFactory
	 */
	protected $forgeFactory;

	public function __construct(ForgeFactory $factory = null)
	{
		if ($factory === null)
		{
			$factory = new ForgeFactory;
		}

		$this->forgeFactory = $factory;
	}

	/**
	 * Adds a new resource to the container.
	 *
	 * @param string $name
	 * @param mixed  $constructor
	 *
	 * @return $this
	 *
	 * @since 2.0
	 */
	public function register($name, $constructor)
	{
		$this->resources[$name] = $constructor;
	}

	/**
	 * Attempts to forge the named resource to a valid class name.
	 *
	 * @param string $name
	 *
	 * @return string
	 *
	 * @throws UnknownResourceException
	 *
	 * @since 2.0
	 */
	public function resolve($name)
	{
		if ( ! isset($this->resources[$name]))
		{
			throw new UnknownResourceException("CLO-003: [$name] is not a known resource.");
		}

		$resource = $this->resources[$name];
		return $this->forgeFactory->forge($resource);
	}

}
