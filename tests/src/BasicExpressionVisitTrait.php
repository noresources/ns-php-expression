<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

/**
 * Implements the visitExpressionInterface method of the ExpressionInterface interface by simply
 * invoking the
 * visitExpressionInterface() method of ExpressionInterfaceVisitor
 */
trait BasicExpressionInterfaceVisitTrait
{

	/**
	 *
	 * @param ExpressionInterfaceVisitor $visitor
	 */
	public function visitExpressionInterface(
		ExpressionInterfaceVisitor $visitor)
	{
		$visitor->visitExpressionInterface($this);
	}
}