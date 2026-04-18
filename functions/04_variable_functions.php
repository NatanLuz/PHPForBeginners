<?php

// 4) VARIABLE FUNCTIONS
// Uma string com nome de funcao pode ser chamada como funcao.

function sayHello(): void
{
    echo "Hello from sayHello()\n";
}

function sayGoodbye(): void
{
    echo "Goodbye from sayGoodbye()\n";
}

$action = "sayHello";
$action();

$action = "sayGoodbye";
$action();

// Boa pratica: validar antes de chamar dinamicamente.
$possibleFunction = "sayHello";
if (function_exists($possibleFunction)) {
    $possibleFunction();
}
