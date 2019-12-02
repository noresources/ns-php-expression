<?php
spl_autoload_register(function($className) {
	$className = strtolower ($className);
	$classMap = array (
		'noresources\expression\textexpressionvisitor' => 'src/TextExpressionVisitor.php',
		'noresources\expression\objectproperty' => 'src/ObjectProperty.php',
		'noresources\expression\range' => 'src/Range.php',
		'noresources\expression\binaryoperation' => 'src/BinaryOperation.php',
		'noresources\expression\identifier' => 'src/Identifier.php',
		'noresources\expression\expression' => 'src/Expression.php',
		'noresources\expression\basicexpressionvisittrait' => 'src/Expression.php',
		'noresources\expression\set' => 'src/Set.php',
		'noresources\expression\unaryoperation' => 'src/UnaryOperation.php',
		'noresources\expression\value' => 'src/Value.php',
		'noresources\expression\procedure' => 'src/Procedure.php',
		'noresources\expression\literal' => 'src/Literal.php',
		'noresources\expression\expressionvisitexception' => 'src/ExpressionVisitor.php',
		'noresources\expression\expressionvisitor' => 'src/ExpressionVisitor.php'
	); // classMap

	if (\array_key_exists ($className, $classMap)) {
		require_once(__DIR__ . '/' . $classMap[$className]);
	}
});