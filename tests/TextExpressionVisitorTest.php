<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\BinaryOperation;
use NoreSources\Type\TypeDescription;
use PHPUnit\Framework\TestCase;

final class TextExpressionVisitorTest extends TestCase
{

	public function testLiteral()
	{
		$tests = [
			'"Some text"' => 'Some text',
			'123' => 123
			// '2012-12-24T13:14:15+01:00' => new \DateTime('2012-12-24T13:14:15+01:00')
		];

		$visitor = new TextExpressionInterfaceVisitor();

		foreach ($tests as $expected => $value)
		{
			$e = new VisitableValue($value);
			$visitor->dispatch($e);
			$result = strval($visitor);
			$this->assertEquals($expected, $result);
		}
	}

	public function testIdentifiers()
	{
		$tests = [
			'name' => new VisitableIdentifier('name'),
			'property' => new VisitableObjectProperty('property'),
			'object.property' => new VisitableObjectProperty('property',
				new VisitableIdentifier('object'))
		];

		$visitor = new TextExpressionInterfaceVisitor();

		foreach ($tests as $expected => $e)
		{
			$visitor->dispatch($e);
			$result = strval($visitor);
			$this->assertEquals($expected, $result,
				TypeDescription::getName($e));
		}
	}

	public function testComplex()
	{
		$tests = [
			'name == 123' => new VisitableBinaryOperation(
				BinaryOperation::EQUAL, new VisitableIdentifier('name'),
				new VisitableValue(123)),
			'table.column in {5, 7, "foo"}' => new VisitableBinaryOperation(
				'in',
				new VisitableObjectProperty('column',
					new VisitableIdentifier('table')),
				new VisitableSet(
					[
						new VisitableValue(5),
						new VisitableValue(7),
						new VisitableValue('foo')
					])),
			'column := max(5 + 3, pi)' => new VisitableBinaryOperation(
				':=', new VisitableIdentifier('column'),
				new VisitableProcedureInvocation('max',
					[
						new VisitableBinaryOperation(
							BinaryOperation::PLUS, new VisitableValue(5),
							new VisitableValue(3)),
						new VisitableIdentifier('pi')
					]))
		];

		$visitor = new TextExpressionInterfaceVisitor();

		foreach ($tests as $expected => $e)
		{
			$visitor->dispatch($e);
			$result = strval($visitor);
			$this->assertEquals($expected, $result,
				TypeDescription::getName($e));
		}
	}
}
