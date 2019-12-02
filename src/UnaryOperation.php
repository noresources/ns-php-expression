<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * Unary operator expression
 */
class UnaryOperation implements Expression
{

	const MINUS = '-';

	const LOGICAL_NOT = 'not';

	/**
	 * One's complement
	 */
	const BITWISE_NOT = '~';

	/**
	 *
	 * @param string $operator
	 *        	Unary operator
	 * @param Expression $operand
	 *        	Operand
	 */
	public function __construct($operator, Expression $operand)
	{
		$this->operand = $operator;
		$this->operand = $operand;
	}

	/**
	 *
	 * @return string
	 */
	public function getOperator()
	{
		return $this->operator;
	}

	/**
	 *
	 * @return \NoreSources\Expression\Expression
	 */
	public function getOperand()
	{
		return $this->operand;
	}

	/**
	 *
	 * @var string Operator
	 */
	private $operator;

	/**
	 *
	 * @var Expression
	 */
	private $operand;
}