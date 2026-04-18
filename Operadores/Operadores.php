<?php

// Guia resumido de operadores em PHP.
// Descomente os exemplos que quiser testar.

$a = "a";
$b = "c";
$c = 9;
$d = 7;

// Comparacao solta e estrita.
// var_dump($a == $b);
// var_dump($a === $b);

// Operador spaceship para comparar valores.
// var_dump($c <=> $d);

// Precedencia entre and/or e &&/||.
// $x = false or true;
// $y = false || true;
// var_dump($x, $y);

// Ternario e coalescencia.
// $user = [];
// $apelido = isset($user['apelido']) ? $user['apelido'] : 'N/A';
// $apelido2 = $user['apelido'] ?? 'N/A';
// var_dump($apelido, $apelido2);

// Concatenacao e atribuicao acumulativa.
// $s = "Ola";
// $s .= " Mundo";
// var_dump($s);

// Uniao de arrays e merge.
// $a1 = [1 => "a"];
// $a2 = [1 => "b", 2 => "c"];
// var_dump($a1 + $a2);
// var_dump(array_merge($a1, $a2));

// Incremento em numeros e strings.
// $n = 7;
// $n++;
// var_dump($n);
// $letra = "z";
// $letra++;
// var_dump($letra);

// Operacoes bitwise.
// $perms = 0b0101;
// $canWrite = ($perms & 0b0100) !== 0;
// var_dump($canWrite);

// Operador Elvis.
// $entrada = "";
// $resultado = $entrada ?: "fallback";
// var_dump($resultado);

// Coalescencia com atribuicao.
// $config = ["timeout" => null];
// $config["timeout"] ??= 30;
// var_dump($config);