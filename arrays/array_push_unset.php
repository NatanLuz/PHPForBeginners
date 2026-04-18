<?php

// Exemplos praticos de insercao e remocao em arrays.

// 1) array_push basico
$nomes = ["João", "Maria", "Pedro"];
array_push($nomes, "Ana");
echo "1) array_push básico:\n";
print_r($nomes);

// 2) Inserindo múltiplos valores com array_push
$times = ["Azul", "Vermelho"];
array_push($times, "Verde", "Amarelo");
echo "\n2) array_push com múltiplos valores:\n";
print_r($times);

// 3) Forma mais comum de adicionar itens (operador []).
$usuarios = [];
$usuarios[] = "Natan";
$usuarios[] = "Carlos";
echo "\n3) Operador [] para adicionar:\n";
print_r($usuarios);

// 4) Cenário real: lista de jogadores.
$jogadores = ["Messi", "Neymar", "Cristiano"];
$jogadores[] = "Vinícius"; // adiciona um por vez
array_push($jogadores, "Rodrygo", "De Bruyne"); // adiciona vários

echo "\n4) Lista de jogadores ([], array_push):\n";
print_r($jogadores);

// 5) Remover por indice com unset (nao reindexa automaticamente).
$frutas = ["Maçã", "Banana", "Uva", "Pêra"];
unset($frutas[1]); // remove "Banana"
echo "\n5) unset por índice (mantém chaves originais):\n";
print_r($frutas);

// Reindexando apos unset.
$frutas = array_values($frutas);
echo "\n5b) Reindexando com array_values:\n";
print_r($frutas);

// 6) Remover por valor usando array_search + unset.
$cores = ["azul", "vermelho", "verde", "amarelo"];
$indice = array_search("verde", $cores);
if ($indice !== false) {
    unset($cores[$indice]);
}
echo "\n6) unset por valor (array_search):\n";
print_r($cores);

// 7) Remover primeiro e ultimo elemento com shift e pop.
$filas = ["A", "B", "C"];
$primeiro = array_shift($filas); // remove início
$ultimo = array_pop($filas);     // remove fim

echo "\n7) array_shift e array_pop:\n";
echo "Primeiro removido: $primeiro\n";
echo "Último removido: $ultimo\n";
print_r($filas);

// 8) Remover multiplos itens por condicao com unset.
$numeros = [1, 2, 3, 4, 5, 6];
foreach ($numeros as $i => $n) {
    if ($n % 2 === 0) { // remove pares
        unset($numeros[$i]);
    }
}
echo "\n8) Remover pares com unset:\n";
print_r($numeros);

// Reindexar apos remocao multipla.
$numeros = array_values($numeros);
echo "\n8b) Reindexando após remoção múltipla:\n";
print_r($numeros);

// 9) Esvaziar array versus remover a variavel.
$lista = ["x", "y"];
unset($lista); // remove a variável inteira
// echo $lista; // geraria notice, pois $lista não existe mais

echo "\n9) unset($lista) remove a variável.\n";
$lista2 = ["x", "y"];
$lista2 = []; // esvaziar mantendo a variável

echo "9b) lista2 esvaziada, variável existe:\n";
print_r($lista2);