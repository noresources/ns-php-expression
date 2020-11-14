<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\ExpressionInterface;

interface VisitableExpressionInterface extends ExpressionInterface
{

	/**
	 * Called by visitor
	 *
	 * @param ExpressionInterfaceVisitor $visitor
	 */
	function visitExpressionInterface(
		ExpressionInterfaceVisitor $visitor);
}