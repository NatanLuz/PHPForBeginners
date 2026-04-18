<?php
declare(strict_types=1);

// Introducao a arrays em PHP.
// Um array pode armazenar varios valores em uma mesma variavel.

function showArray(string $title, array $items): void
{
    echo "\n$title\n";
    print_r($items);
}

$numbers = [1, 2, 3, 4, 5, 6, 7];

// Array associativo: cada fruta possui metadados simples.
$fruits = [
    'abacaxi' => ['color' => 'amarelo', 'in_stock' => true],
    'banana' => ['color' => 'amarelo', 'in_stock' => true],
    'maca' => ['color' => 'vermelho', 'in_stock' => false],
];

$totalItems = count($numbers);
echo "O array numbers possui $totalItems itens.\n";

$numbers[] = 8;
$totalAfterAdd = count($numbers);
echo "Depois de adicionar 8, o array possui $totalAfterAdd itens.\n";

showArray('Array original:', $numbers);

sort($numbers);
showArray('Array ordenado (crescente):', $numbers);

rsort($numbers);
showArray('Array ordenado (decrescente):', $numbers);

showArray('Array associativo de frutas:', $fruits);