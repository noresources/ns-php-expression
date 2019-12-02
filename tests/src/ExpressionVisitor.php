<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\Expression;

/**
 * Exception raised while visiting expressions
 */
class ExpressionVisitException extends \ErrorException
{

	/**
	 *
	 * @var ExpressionVisitor
	 */
	public $visitor;

	/**
	 *
	 * @var Expression
	 */
	public $expression;

	/**
	 *
	 * @param
	 *        	ExpressionVisitException|Expression|string|number Visitor, current Expression,
	 *        	error message and error code
	 */
	public function __construct()
	{
		$this->visitor = null;
		$this->expression = null;
		$args = func_get_args();
		$text = '';
		$code = 0;
		foreach ($args as $arg)
		{
			if ($arg instanceof ExpressionVisitor)
				$this->visitor = $arg;
			elseif ($arg instanceof Expression)
				$this->expression = $arg;
			elseif (\is_string($arg))
				$text .= $arg;
			elseif (\is_integer($arg))
				$code = $arg;

			parent::__construct($text, $code);
		}
	}
}

interface ExpressionVisitor
{

	/**
	 * Initiate visit process
	 *
	 * @param Expression $expression
	 */
	function dispatch(Expression $expression);

	/**
	 * Called by visited Expressions
	 *
	 * @param Expression $expression
	 */
	function visitExpression(Expression $expression);
}