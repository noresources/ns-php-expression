<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

/**
 * Implements the visitExpression method of the Expression interface by simply invoking the
 * visitExpression() method of ExpressionVisitor
 */
trait BasicExpressionVisitTrait
{

	/**
	 *
	 * @param ExpressionVisitor $visitor
	 */
	public function visitExpression(ExpressionVisitor $visitor)
	{
		$visitor->visitExpression($this);
	}
}