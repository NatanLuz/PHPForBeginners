<?php
declare(strict_types=1);

// Arquivo de testes para operadores aritmeticos.
// Execute para comparar os resultados com o guia principal.

function show(string $label, mixed $value): void
{
    echo $label . ": ";
    var_dump($value);
}

echo "\n1) Operacoes basicas: +, -, *, /\n";
$a = 9;
$b = 7;
show('a + b', $a + $b);   // 16
show('a - b', $a - $b);   // 2
show('a * b', $a * $b);   // 63
show('a / b', $a / $b);   // float(1.2857142857143)

echo "\n2) Divisao inteira e modulo\n";
show('intdiv(7, 2)', intdiv(7, 2)); // 3
show('7 % 2', 7 % 2);               // 1
show('-7 % 2', -7 % 2);             // -1 (sinal segue o dividendo)

echo "\n3) Exponenciacao e precedencia\n";
show('2 ** 3', 2 ** 3);             // 8
show('2 ** 3 ** 2', 2 ** 3 ** 2);   // 512 (direita-associativo: 2 ** (3 ** 2))
show('-(2 ** 2)', -(2 ** 2));       // -4 (**) tem alta precedência; use parênteses para clareza)

echo "\n4) Precedencia e parenteses\n";
show('2 + 3 * 4', 2 + 3 * 4);       // 14
show('(2 + 3) * 4', (2 + 3) * 4);   // 20

echo "\n5) Atribuicao composta\n";
$x = 5;
$x += 3; // 8
$x *= 2; // 16
$x -= 4; // 12
$x /= 3; // 4.0
$x %= 3; // 1.0
$x **= 3; // 1.0 ** 3 => 1.0
show('x após operações compostas', $x);

echo "\n6) Numeros em strings e coercao\n";
$s1 = "10";      // string numérica
$s2 = "3.5";     // string numérica float
show('"10" + 5', $s1 + 5);   // 15 (conversão numérica)
show('"3.5" * 2', $s2 * 2);  // 7.0 (conversão numérica)
// Evite strings não numéricas em operações: podem causar erro nas versões modernas do PHP.

echo "\n7) Precisao de ponto flutuante\n";
$p = 0.1 + 0.2;               // típico: 0.30000000000000004
show('0.1 + 0.2', $p);
show('aproximação ~ 0.3', abs($p - 0.3) < 1e-12); // true se próximo de 0.3

echo "\n8) Divisao por zero\n";
$num = 10;
$den = 0;
if ($den === 0) {
    echo "Divisão por zero evitada (den = 0).\n";
} else {
    show('num / den', $num / $den);
}

echo "\nPronto. Experimentos concluídos.\n";