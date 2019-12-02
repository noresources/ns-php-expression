<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\BinaryOperation;
use NoreSources\Expression\Identifier;
use NoreSources\Expression\ObjectProperty;
use NoreSources\Expression\ProcedureInvocation;
use NoreSources\Expression\Range;
use NoreSources\Expression\Set;
use NoreSources\Expression\Value;

class VisitableObjectProperty extends ObjectProperty implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

class VisitableRange extends Range implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

class VisitableBinaryOperation extends BinaryOperation implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

class VisitableIdentifier extends Identifier implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

class VisitableProcedureInvocation extends ProcedureInvocation implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

class VisitableValue extends Value implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

class VisitableSet extends Set implements VisitableExpression
{
	use BasicExpressionVisitTrait;
}

