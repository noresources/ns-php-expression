<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

use NoreSources\TypeDescription;
use ArrayObject;

/**
 * Function
 */
class ProcedureInvocation implements Expression, \IteratorAggregate
{

	/**
	 *
	 * @param string $name
	 * @param array $arguments
	 */
	public function __construct($name, $arguments = array())
	{
		$this->functionName = $name;
		$this->arguments = new \ArrayObject();
		foreach ($arguments as $value)
		{
			$this->appendArgument($value);
		}
	}

	/**
	 * Argument iterator
	 *
	 * @return \Iterator
	 */
	public function getIterator()
	{
		return $this->arguments->getIterator();
	}

	/**
	 *
	 * @return string
	 */
	public function getFunctionName()
	{
		return $this->functionName;
	}

	/**
	 *
	 * @return ArrayObject
	 */
	public function getArguments()
	{
		return $this->arguments;
	}

	/**
	 *
	 * @param integer $index
	 * @return ArrayObject
	 */
	public function getArgument($index)
	{
		return $this->arguments[$index];
	}

	/**
	 *
	 * @param Expression $argument
	 * @throws \InvalidArgumentException
	 * @return \NoreSources\Expression\ProcedureInvocation
	 */
	public function appendArgument($argument)
	{
		if (!($argument instanceof Expression))
		{
			$n = Expression::class;
			throw new \InvalidArgumentException(
				TypeDescription::getName($argument) . ' is not a ' . $n);
		}

		$this->arguments->append($argument);

		return $this;
	}

	/**
	 *
	 * @var string
	 */
	private $functionName;

	/**
	 *
	 * @var \ArrayObject
	 */
	private $arguments;
}