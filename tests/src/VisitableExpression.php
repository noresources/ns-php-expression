<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\Expression;

interface VisitableExpression extends Expression
{

	/**
	 * Called by visitor
	 *
	 * @param ExpressionVisitor $visitor
	 */
	function visitExpression(ExpressionVisitor $visitor);
}