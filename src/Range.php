<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

use NoreSources\Container;
use NoreSources\TypeDescription;

/**
 * An expression representing an interval between two expressions.
 */
class Range implements Expression
{

	public function __construct()
	{
		$argc = \func_num_args();
		if ($argc > 0)
			\call_user_func_array([
				$this,
				'setInterval'
			], func_get_args());
	}

	/**
	 *
	 * @return \NoreSources\Expression\Expression[]
	 */
	public function getInterval()
	{
		return $this->interval;
	}

	/**
	 * Set interval values
	 *
	 * @param Expression[] ...$arguments
	 *        	Array of expressions or
	 * @throws \InvalidArgumentException /**
	 *
	 * @throws \InvalidArgumentException
	 */
	public function setInterval()
	{
		$min = null;
		$max = null;

		$argc = \func_num_args();
		$argv = \func_get_args();
		if ($argc == 1 && Container::isArray($argv[0]) &&
			Container::count($argv[0]))
		{
			$min = Container::keyValue($argv[0], 0, null);
			$max = Container::keyValue($argv[0], 1, null);
		}
		else
		{
			$min = Container::keyValue($argv, 0, null);
			$max = Container::keyValue($argv, 1, null);
		}

		if (!(\is_null($min) || ($min instanceof Expression)))
			throw new \InvalidArgumentException(
				'Invalid minimum value. ' . Expression::class .
				' or null expected. Got ' .
				TypeDescription::getName($min));

		if (!(\is_null($max) || ($max instanceof Expression)))
			throw new \InvalidArgumentException(
				'Invalid maximum value. ' . Expression::class .
				' or null expected. Got ' .
				TypeDescription::getName($max));

		$this->interval = [
			$min,
			$max
		];
	}

	/**
	 *
	 * @return \NoreSources\Expression\Expression
	 */
	public function getMin()
	{
		return $this->interval[0];
	}

	/**
	 *
	 * @return \NoreSources\Expression\Expression
	 */
	public function getMax()
	{
		return $this->interval[1];
	}

	/**
	 *
	 * @var Expression[]
	 */
	private $interval;
}