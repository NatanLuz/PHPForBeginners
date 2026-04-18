<?php

// Guia rapido de operadores aritmeticos em PHP.
// O arquivo pode ser executado para observar os resultados.

function mostrar($rotulo, $valor) {
	echo $rotulo . ': ';
	var_dump($valor);
}

// Operacoes basicas.
$a = 9;
$b = 7;
mostrar('a + b', $a + $b);
mostrar('a - b', $a - $b);
mostrar('a * b', $a * $b);
mostrar('a / b', $a / $b);

// Divisao inteira, modulo e exponenciacao.
mostrar('intdiv(7, 2)', intdiv(7, 2));
mostrar('7 % 2', 7 % 2);
mostrar('2 ** 3', 2 ** 3);

// Precedencia de operadores.
mostrar('2 + 3 * 4', 2 + 3 * 4);
mostrar('(2 + 3) * 4', (2 + 3) * 4);

// Atribuicao composta.
$x = 5;
$x += 3;
$x *= 2;
$x -= 4;
mostrar('x apos operacoes compostas', $x);

// Coercao numerica em strings.
$textoNumero = '10';
mostrar('"10" + 5', $textoNumero + 5);

// Ponto flutuante e aproximacao.
$p = 0.1 + 0.2;
mostrar('0.1 + 0.2', $p);
mostrar('aproximacao para 0.3', abs($p - 0.3) < 1e-12);

