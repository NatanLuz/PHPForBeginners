<?php

// 6) ANONYMOUS FUNCTIONS
// Funcao sem nome atribuida a variavel.

$multiply = function (int $a, int $b): int {
    return $a * $b;
};

echo "6 x 7 = " . $multiply(6, 7) . "\n";

// Exemplo comum: usar funcao anonima em array_map.
$numbers = [1, 2, 3, 4];
$squared = array_map(function (int $n): int {
    return $n * $n;
}, $numbers);

echo "Squared: " . implode(", ", $squared) . "\n";
