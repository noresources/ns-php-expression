<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

use NoreSources\Type\TypeDescription;
use ArrayObject;

/**
 * Expression representing a procedure invocation
 */
class ProcedureInvocation implements ExpressionInterface,
	\IteratorAggregate
{

	/**
	 *
	 * @param string $name
	 *        	Procedure name
	 * @param array $arguments
	 *        	Liisf of arguments
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
	 * @param ExpressionInterface $argument
	 *        	Argument to append
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function appendArgument($argument)
	{
		if (!($argument instanceof ExpressionInterface))
			throw new \InvalidArgumentException(
				'Argument ' . ($this->arguments->count() + 1) . ' ' .
				TypeDescription::getName($argument) . ' is not a ' .
				ExpressionInterface::class);

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