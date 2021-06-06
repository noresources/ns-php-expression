<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

use NoreSources\Type\ArrayRepresentation;
use NoreSources\Type\TypeDescription;

/**
 * A list of arbitrary expressions
 */
class Set implements ExpressionInterface, \ArrayAccess, \Countable,
	\IteratorAggregate, ArrayRepresentation
{

	/**
	 *
	 * @param ExpressionInterface[] $expressionList
	 */
	public function __construct($expressionList = array())
	{
		$this->expressions = new \ArrayObject();
		foreach ($expressionList as $e)
		{
			$this->append($e);
		}
	}

	public function offsetExists($offset)
	{
		return $this->expressions->offsetExists($offset);
	}

	public function offsetGet($offset)
	{
		return $this->expressions->offsetGet($offset);
	}

	public function offsetSet($offset, $value)
	{
		if (!$this->isValidElement($value))
			throw new \InvalidArgumentException(
				TypeDescription::getName($value) .
				' is not a valid value');

		$this->expressions->offsetSet($offset, $value);
	}

	public function offsetUnset($offset)
	{
		$this->expressions->offsetUnset($offset);
	}

	public function getArrayCopy()
	{
		return $this->expressions->getArrayCopy();
	}

	public function count()
	{
		return $this->expressions->count();
	}

	public function getIterator()
	{
		return $this->expressions->getIterator();
	}

	public function append(ExpressionInterface $value)
	{
		if (!$this->isValidElement($value))
			throw new \InvalidArgumentException(
				TypeDescription::getName($value) .
				' is not a valid value');

		$this->expressions->append($value);
	}

	protected function isValidElement($element)
	{
		return ($element instanceof ExpressionInterface);
	}

	/**
	 *
	 * @var \ArrayObject
	 */
	private $expressions;
}