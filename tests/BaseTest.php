<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */
namespace NoreSources\Test\Expression;

use NoreSources\Expression\Range;
use NoreSources\Expression\Value;
use PHPUnit\Framework\TestCase;

final class BaseTest extends TestCase
{

	public function testRange1()
	{
		$a = new Range(new Value(1), new Value(5));
		$this->assertInstanceOf(Value::class, $a->getMin(), 'Min');
		$this->assertInstanceOf(Value::class, $a->getMax(), 'Max');

		$a = new Range([
			new Value(1),
			new Value(5)
		]);
		$this->assertInstanceOf(Value::class, $a->getMin(), 'Min');
		$this->assertInstanceOf(Value::class, $a->getMax(), 'Max');
	}

	public function testRangeException()
	{
		$this->expectException(\InvalidArgumentException::class,
			'Invalid argument exception');
		$a = new Range([
			new Value(1),
			false
		]);
	}
}
