<?php

// Introducao a arrays em PHP.
// Um array pode armazenar varios valores em uma mesma variavel.

$num = [1, 2, 3, 4, 5, 6, 7];

// Array associativo com chaves textuais.
$frutas = [
    "a" => "abacaxi",
    "b" => "banana",
    "c" => "maca",
    "d" => "damasco",
    "e" => "laranja",
    "f" => "uva",
];

$totArray = count($num);
echo "Esse array possui $totArray itens \n";

$num[] = 6;
print_r($num);

$totA = count($num);
echo "Esse array possui $totA itens \n";

sort($num);
print_r($num);

print_r($num);
print_r($frutas);

// Manipulacao basica de arrays.

// rsort ordena do maior para o menor.