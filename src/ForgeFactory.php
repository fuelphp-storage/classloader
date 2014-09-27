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
 * Responsible for creating classes to resolve various types of resources.
 *
 * @package Fuel\ClassLoader
 *
 * @since 2.0
 */
class ForgeFactory
{

	protected $baseNamespace = 'Fuel\ClassLoader\Forge\\';

	/**
	 * @var ResourceForgeInterface[]
	 */
	protected $forgeInstances = [];

	/**
	 * Returns true if the factory can forge the given type.
	 *
	 * @param string $type
	 *
	 * @return bool
	 *
	 * @since 2.0
	 */
	public function canForge($type)
	{
		return class_exists($this->baseNamespace.ucfirst($type));
	}

	/**
	 * Returns the scalar type or object class name of the identifier.
	 *
	 * @param mixed $identifier
	 *
	 * @return string
	 *
	 * @since 2.0
	 */
	protected function identifierType($identifier)
	{
		$type = gettype($identifier);

		if ($type == 'object')
		{
			$type = get_class($identifier);

			// Anoying workaround for HHVM compatibility
			if (is_callable($identifier))
			{
				$type = 'closure';
			}
		}

		return $type;
	}

	/**
	 * Attempts to forge a resource for the given identifier.
	 *
	 * @param string $identifier
	 *
	 * @return mixed
	 *
	 * @since 2.0
	 */
	public function forge($identifier)
	{
		$type = $this->identifierType($identifier);

		if ( ! $this->canForge($type))
		{
			throw new UnforgableResourceException("CLO-002: [$type] does not have an associated forge.");
		}

		$forge = $this->getForge($type);

		return $forge->forge($identifier);
	}

	/**
	 * Gets the forging class used to forge instances of the given type.
	 *
	 * @param string $type
	 *
	 * @return ResourceForgeInterface
	 *
	 * @since 2.0
	 */
	protected function getForge($type)
	{
		if ( ! isset($this->forgeInstances[$type]))
		{
			$class = $this->baseNamespace.ucfirst($type);
			$this->forgeInstances[$type] = new $class;
		}

		return $this->forgeInstances[$type];
	}

}
