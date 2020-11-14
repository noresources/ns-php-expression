<?php
spl_autoload_register(function($className) {
	$className = strtolower ($className);
	$classMap = array (
		'noresources\expression\textexpressionvisitor' => 'src/TextExpressionInterfaceVisitor.php',
		'noresources\expression\objectproperty' => 'src/ObjectProperty.php',
		'noresources\expression\range' => 'src/Range.php',
		'noresources\expression\binaryoperation' => 'src/BinaryOperation.php',
		'noresources\expression\identifier' => 'src/Identifier.php',
		'noresources\expression\expression' => 'src/ExpressionInterface.php',
		'noresources\expression\basicexpressionvisittrait' => 'src/ExpressionInterface.php',
		'noresources\expression\set' => 'src/Set.php',
		'noresources\expression\unaryoperation' => 'src/UnaryOperation.php',
		'noresources\expression\value' => 'src/Value.php',
		'noresources\expression\procedure' => 'src/Procedure.php',
		'noresources\expression\literal' => 'src/Literal.php',
		'noresources\expression\expressionvisitexception' => 'src/ExpressionInterfaceVisitor.php',
		'noresources\expression\expressionvisitor' => 'src/ExpressionInterfaceVisitor.php'
	); // classMap

	if (\array_key_exists ($className, $classMap)) {
		require_once(__DIR__ . '/' . $classMap[$className]);
	}
});