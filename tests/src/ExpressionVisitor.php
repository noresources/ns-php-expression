<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\ExpressionInterface;

/**
 * Exception raised while visiting expressions
 */
class ExpressionInterfaceVisitException extends \ErrorException
{

	/**
	 *
	 * @var ExpressionInterfaceVisitor
	 */
	public $visitor;

	/**
	 *
	 * @var ExpressionInterface
	 */
	public $expression;

	/**
	 *
	 * @param
	 *        	ExpressionInterfaceVisitException|ExpressionInterface|string|number Visitor,
	 *        	current ExpressionInterface,
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
			if ($arg instanceof ExpressionInterfaceVisitor)
				$this->visitor = $arg;
			elseif ($arg instanceof ExpressionInterface)
				$this->expression = $arg;
			elseif (\is_string($arg))
				$text .= $arg;
			elseif (\is_integer($arg))
				$code = $arg;

			parent::__construct($text, $code);
		}
	}
}

interface ExpressionInterfaceVisitor
{

	/**
	 * Initiate visit process
	 *
	 * @param ExpressionInterface $expression
	 */
	function dispatch(ExpressionInterface $expression);

	/**
	 * Called by visited ExpressionInterfaces
	 *
	 * @param ExpressionInterface $expression
	 */
	function visitExpressionInterface(ExpressionInterface $expression);
}