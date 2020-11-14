<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\TypeConversion as C;
use NoreSources\TypeDescription;
use NoreSources\TypeDescription as D;
use NoreSources\Expression\ExpressionInterface;
use NoreSources\Expression\Identifier;

/**
 * Proof of Concept visitor displaying textual representation of the expression
 */
class TextExpressionInterfaceVisitor implements
	ExpressionInterfaceVisitor
{

	public function __construct()
	{
		$this->text = '';
	}

	/**
	 *
	 * @return string Result of the last expression visit
	 */
	public function __toString()
	{
		return $this->text;
	}

	public function __invoke()
	{
		$args = func_get_args();
		return \call_user_func_array([
			$this,
			'dispatch'
		], $args);

		return $this->text;
	}

	public function dispatch(ExpressionInterface $expression)
	{
		if (!($expression instanceof VisitableExpressionInterface))
			throw new \InvalidArgumentException(
				TypeDescription::getName($expression) . ' is not a ' .
				VisitableExpressionInterface::class);

		$this->text = '';
		$expression->visitExpressionInterface($this);
	}

	public function visitExpressionInterface(
		ExpressionInterface $expression)
	{
		if ($expression instanceof VisitableRange)
		{
			$this->text .= '[';
			$expression->getMin()->visitExpressionInterface($this);
			$this->text .= ', ';
			$expression->getMax()->visitExpressionInterface($this);
			$this->text .= ']';
		}
		elseif ($expression instanceof VisitableSet)
		{
			$this->text .= '{';
			$index = 0;
			foreach ($expression as $e)
			{
				if ($index++ > 0)
					$this->text .= ', ';
				$e->visitExpressionInterface($this);
			}
			$this->text .= '}';
		}
		elseif ($expression instanceof VisitableBinaryOperation)
		{
			if (!($expression->getLeftOperand() instanceof VisitableExpressionInterface))
				throw new \InvalidArgumentException(
					TypeDescription::getName(
						$expression->getLeftOperand()) . ' is not a ' .
					VisitableExpressionInterface::class);

			if (!($expression->getRightOperand() instanceof VisitableExpressionInterface))
				throw new \InvalidArgumentException(
					TypeDescription::getName(
						$expression->getRightOperand()) . ' is not a ' .
					VisitableExpressionInterface::class);
			$expression->getLeftOperand()->visitExpressionInterface(
				$this);
			$this->text .= ' ' . $expression->getOperator() . ' ';
			$expression->getRightOperand()->visitExpressionInterface(
				$this);
		}
		elseif ($expression instanceof VisitableUnaryOperation)
		{
			$operator = $expression->getOperand();
			if (\preg_match('/[a-z0-9]/i', $operator))
				$this->text .= ' ' . $operator . ' ';
			else
				$this->text .= $operator;
		}
		elseif ($expression instanceof VisitableObjectProperty)
		{
			$parent = $expression->getObjectIdentifier();
			if ($parent instanceof Identifier)
			{
				$parent->visitExpressionInterface($this);
				$this->text .= '.';
			}
			$this->text .= $expression->getIdentifier();
		}
		elseif ($expression instanceof VisitableValue)
		{
			$value = $expression->getValue();
			if (\is_string($value))
				$value = '"' . str_replace('"', '\\"', $value) . '"';
			$this->text .= C::toString($value);
		}
		elseif (D::hasStringRepresentation($expression))
		{
			$this->text .= C::toString($expression);
		}
		elseif ($expression instanceof VisitableProcedureInvocation)
		{
			$this->text .= $expression->getFunctionName() . '(';
			$index = 0;
			foreach ($expression->getArguments() as $arg)
			{
				if ($index++ > 0)
					$this->text .= ', ';
				$arg->visitExpressionInterface($this);
			}
			$this->text .= ')';
		}
		else
			throw new ExpressionInterfaceVisitException($this,
				$expression,
				'Unrecognized expression ' . D::getName($expression));
	}

	private function space()
	{
		if (strlen($this->text))
			$this->text .= ' ';
	}

	private $text;
}

