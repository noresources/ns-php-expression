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

class VisitableObjectProperty extends ObjectProperty implements
	VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

class VisitableRange extends Range implements
	VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

class VisitableBinaryOperation extends BinaryOperation implements
	VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

class VisitableIdentifier extends Identifier implements
	VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

class VisitableProcedureInvocation extends ProcedureInvocation implements
	VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

class VisitableValue extends Value implements
	VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

class VisitableSet extends Set implements VisitableExpressionInterface
{
	use BasicExpressionInterfaceVisitTrait;
}

