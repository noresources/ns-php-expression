<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * Binary operator expression
 */
class BinaryOperation implements ExpressionInterface
{

	const ASSIGN = ':=';

	const EQUAL = '==';

	const DIFFER = '!=';

	const LESSER = '<';

	const LESSER_EQUAL = '<=';

	const GREATER = '>';

	const GREATER_EQUAL = '>=';

	const LOGICAL_AND = 'and';

	const LOGICAL_OR = 'or';

	const MINUS = '-';

	const PLUS = '+';

	const MULTIPLY = '*';

	const DIVIDE = '/';

	const MODULO = '%';

	const BITWISE_AND = '&';

	const BITWISE_OR = '|';

	const BITWISE_XOR = '^';

	const BITWISE_SHIFT_LEFT = '<<';

	const BITWISE_SHIFT_RIGHT = '>>';

	/**
	 *
	 * @param ExpressionInterface $leftOperand
	 *        	Left operand
	 * @param string $operator
	 *        	Binary operator
	 * @param ExpressionInterface $rightOperand
	 *        	Right operand
	 */
	public function __construct($operator,
		ExpressionInterface $leftOperand,
		ExpressionInterface $rightOperand)
	{
		$this->leftOperand = $leftOperand;
		$this->operator = $operator;
		$this->rightOperand = $rightOperand;
	}

	/**
	 *
	 * @return ExpressionInterface
	 */
	public function getLeftOperand()
	{
		return $this->leftOperand;
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
	public function getRightOperand()
	{
		return $this->rightOperand;
	}

	/**
	 *
	 * @return boolean
	 */
	public function isArithmetic()
	{
		return (\in_array($this->operator,
			[
				static::PLUS,
				static::MINUS,
				static::DIVIDE,
				static::MULTIPLY,
				static::MODULO
			]));
	}

	/**
	 *
	 * @return boolean
	 */
	public function isComparison()
	{
		return (\in_array($this->operator,
			[
				static::EQUAL,
				static::DIFFER,
				static::LESSER,
				static::LESSER_EQUAL,
				static::GREATER,
				static::GREATER_EQUAL,
				static::LOGICAL_AND,
				static::LOGICAL_OR
			]));
	}

	/**
	 *
	 * @return boolean
	 */
	public function isBitwise()
	{
		return (\in_array($this->operator,
			[
				static::BITWISE_AND,
				static::BITWISE_OR,
				static::BITWISE_SHIFT_LEFT,
				static::BITWISE_SHIFT_RIGHT,
				static::BITWISE_XOR
			]));
	}

	/**
	 *
	 * @var ExpressionInterface
	 */
	private $leftOperand;

	/**
	 *
	 * @var string
	 */
	private $operator;

	/**
	 *
	 * @var ExpressionInterface
	 */
	private $rightOperand;
}