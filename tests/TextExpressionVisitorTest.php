<?php
namespace NoreSources\Expression;

use NoreSources\TypeDescription;
use NoreSources\Test\Expression\TextExpressionVisitor;
use NoreSources\Test\Expression\VisitableBinaryOperation;
use NoreSources\Test\Expression\VisitableIdentifier;
use NoreSources\Test\Expression\VisitableObjectProperty;
use NoreSources\Test\Expression\VisitableProcedureInvocation;
use NoreSources\Test\Expression\VisitableSet;
use NoreSources\Test\Expression\VisitableValue;
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

		$visitor = new TextExpressionVisitor();

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

		$visitor = new TextExpressionVisitor();

		foreach ($tests as $expected => $e)
		{
			$visitor->dispatch($e);
			$result = strval($visitor);
			$this->assertEquals($expected, $result, TypeDescription::getName($e));
		}
	}

	public function testComplex()
	{
		$tests = [
			'name == 123' => new VisitableBinaryOperation(BinaryOperation::EQUAL,
				new VisitableIdentifier('name'), new VisitableValue(123)),
			'table.column in {5, 7, "foo"}' => new VisitableBinaryOperation('in',
				new VisitableObjectProperty('column', new VisitableIdentifier('table')),
				new VisitableSet(
					[
						new VisitableValue(5),
						new VisitableValue(7),
						new VisitableValue('foo')
					])),
			'column := max(5 + 3, pi)' => new VisitableBinaryOperation(':=',
				new VisitableIdentifier('column'),
				new VisitableProcedureInvocation('max',
					[
						new VisitableBinaryOperation(BinaryOperation::PLUS, new VisitableValue(5),
							new VisitableValue(3)),
						new VisitableIdentifier('pi')
					]))
		];

		$visitor = new TextExpressionVisitor();

		foreach ($tests as $expected => $e)
		{
			$visitor->dispatch($e);
			$result = strval($visitor);
			$this->assertEquals($expected, $result, TypeDescription::getName($e));
		}
	}
}
