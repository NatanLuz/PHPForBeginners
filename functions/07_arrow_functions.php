<?php

// 7) ARROW FUNCTIONS
// Sintaxe curta para expressoes simples.

$double = fn (int $n): int => $n * 2;
$sum = fn (int $a, int $b): int => $a + $b;

echo "Double 15: " . $double(15) . "\n";
echo "Sum 10 + 5: " . $sum(10, 5) . "\n";

$values = [10, 20, 30];
$plusOne = array_map(fn (int $v): int => $v + 1, $values);

echo "Plus one: " . implode(", ", $plusOne) . "\n";
