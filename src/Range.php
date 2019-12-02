<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * An expression representing an interval between two expressions.
 */
class Range implements Expression
{

	public function __construct(Expression $min, Expression $max)
	{
		$this->interval = [
			$min,
			$max
		];
	}

	public function getInterval()
	{
		return $this->interval;
	}

	public function getMin()
	{
		return $this->interval[0];
	}

	public function getMax()
	{
		return $this->interval[1];
	}

	private $interval;
}