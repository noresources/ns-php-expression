<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * Expression representing an arbitrary value
 */
class Value implements Expression
{

	/**
	 *
	 * @param mixed $value
	 *        	Any kind of value
	 */
	public function __construct($value)
	{
		$this->setValue($value);
	}

	/**
	 *
	 * @param mixed $value
	 *        	Any kind of value
	 */
	public function setValue($value)
	{
		if ($value instanceof Expression)
			throw new \LogicException('Value is already an Expression');
		$this->value = $value;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Expression value
	 *
	 * @var mixed
	 */
	private $value;
}