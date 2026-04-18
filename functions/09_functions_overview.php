<?php
declare(strict_types=1);

// ======================================================
// FUNCTIONS (PHP) - GUIA DE ESTUDO
// ======================================================
// Comentarios em portugues, codigo com nomes em ingles.

echo "=== PHP Functions: Table of Contents ===\n\n";

// ------------------------------------------------------
// 1) User-defined functions
// ------------------------------------------------------
// Sao funcoes criadas por voce para resolver regras do seu sistema.
function showWelcomeMessage(): void
{
    echo "1) User-defined function: Welcome to PHP functions!\n";
}

showWelcomeMessage();

// ------------------------------------------------------
// 2) Function parameters and arguments
// ------------------------------------------------------
// Parametros: variaveis declaradas na assinatura da funcao.
// Argumentos: valores enviados quando a funcao e chamada.
function greetUser(string $name, string $role = "Student"): void
{
    echo "2) Hello, $name. Role: $role\n";
}

greetUser("Ana");
greetUser("Carlos", "Junior Developer");

// ------------------------------------------------------
// 3) Returning values
// ------------------------------------------------------
// Return devolve um resultado para ser usado fora da funcao.
function sumNumbers(int $a, int $b): int
{
    return $a + $b;
}

$sumResult = sumNumbers(20, 22);
echo "3) Returning value: 20 + 22 = $sumResult\n";

// ------------------------------------------------------
// 4) Variable functions
// ------------------------------------------------------
// Em PHP, uma string com o nome da funcao pode ser executada como chamada.
function sayBye(): void
{
    echo "4) Variable function called: Bye!\n";
}

$functionName = "sayBye";
if (function_exists($functionName)) {
    $functionName();
}

// ------------------------------------------------------
// 5) Internal (built-in) functions
// ------------------------------------------------------
// Funcoes internas ja existem no PHP (strlen, strtoupper, date, etc.).
$text = "php for recruits";
$length = strlen($text);
$upper = strtoupper($text);

echo "5) Built-in strlen: $length\n";
echo "   Built-in strtoupper: $upper\n";

// ------------------------------------------------------
// 6) Anonymous functions
// ------------------------------------------------------
// Funcao sem nome, geralmente atribuida a uma variavel.
$multiply = function (int $x, int $y): int {
    return $x * $y;
};

echo "6) Anonymous function: 6 * 7 = " . $multiply(6, 7) . "\n";

// ------------------------------------------------------
// 7) Arrow functions
// ------------------------------------------------------
// Sintaxe curta para funcoes simples de uma unica expressao.
$double = fn (int $n): int => $n * 2;

echo "7) Arrow function: double(11) = " . $double(11) . "\n";

// ------------------------------------------------------
// 8) First class callable syntax
// ------------------------------------------------------
// Desde PHP 8.1, voce pode criar callable com a sintaxe (...).
// Isso cria um objeto Closure a partir de uma funcao existente.
$strlenCallable = strlen(...);
$greetCallable = greetUser(...);

echo "8) First class callable (strlen): " . $strlenCallable("Documentation") . "\n";
$greetCallable("Beatriz", "Trainee");

echo "\n=== Fim da demonstracao ===\n";