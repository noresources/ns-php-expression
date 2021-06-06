<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * Property name of an object or entity
 */
class ObjectProperty extends Identifier
{

	/**
	 *
	 * @param string $name
	 *        	Property name
	 * @param Identifier $object
	 *        	Owning object name
	 */
	public function __construct($name, Identifier $object = null)
	{
		parent::__construct($name);
		$this->objectIdentifier = $object;
	}

	/**
	 *
	 * @return string Property owner
	 */
	public function getObjectIdentifier()
	{
		return $this->objectIdentifier;
	}

	/**
	 *
	 * @var string
	 */
	private $objectIdentifier;
}