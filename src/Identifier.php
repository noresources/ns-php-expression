<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

use NoreSources\StringRepresentation;

/**
 * Arbitrary identifier
 */
class Identifier implements ExpressionInterface, StringRepresentation
{

	/**
	 *
	 * @param string $name
	 *        	Identifier name
	 */
	public function __construct($name)
	{
		$this->identifier = $name;
	}

	/**
	 *
	 * @return string Identifier name
	 */
	public function __toString()
	{
		return $this->identifier;
	}

	/**
	 *
	 * @return string
	 */
	public function getIdentifier()
	{
		return $this->identifier;
	}

	/**
	 *
	 * @var string Identifier name
	 */
	private $identifier;
}