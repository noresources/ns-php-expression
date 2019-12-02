<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Expression;

/**
 * Binary operator expression
 */
class BinaryOperation implements Expression
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
	 * @param Expression $leftOperand
	 *        	Left operand
	 * @param unknown $operator
	 *        	Binary operator
	 * @param Expression $rightOperand
	 *        	Right operand
	 */
	public function __construct($operator, Expression $leftOperand, Expression $rightOperand)
	{
		$this->leftOperand = $leftOperand;
		$this->operator = $operator;
		$this->rightOperand = $rightOperand;
	}

	/**
	 *
	 * @return \NoreSources\Expression\Expression
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
	 * @return \NoreSources\Expression\Expression
	 */
	public function getRightOperand()
	{
		return $this->rightOperand;
	}

	public function isArithmetic()
	{
		return (\in_array($this->operator,
			[
				self::PLUS,
				self::MINUS,
				self::DIVIDE,
				self::MULTIPLY,
				self::MODULO
			]));
	}

	public function isComparison()
	{
		return (\in_array($this->operator,
			[
				self::EQUAL,
				self::DIFFER,
				self::LESSER,
				self::LESSER_EQUAL,
				self::GREATER,
				self::GREATER_EQUAL,
				self::LOGICAL_AND,
				self::LOGICAL_OR
			]));
	}

	public function isBitwise()
	{
		return (\in_array($this->operator,
			[
				self::BITWISE_AND,
				self::BITWISE_OR,
				self::BITWISE_SHIFT_LEFT,
				self::BITWISE_SHIFT_RIGHT,
				self::BITWISE_XOR
			]));
	}

	/**
	 *
	 * @var Expression
	 */
	private $leftOperand;

	/**
	 *
	 * @var string
	 */
	private $operator;

	/**
	 *
	 * @var Expression
	 */
	private $rightOperand;
}