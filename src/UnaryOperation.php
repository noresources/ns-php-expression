<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * Unary operator expression
 */
class UnaryOperation implements ExpressionInterface
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
	 * @param ExpressionInterface $operand
	 *        	Operand
	 */
	public function __construct($operator, ExpressionInterface $operand)
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
	 * @return ExpressionInterface
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
	 * @var ExpressionInterface
	 */
	private $operand;
}