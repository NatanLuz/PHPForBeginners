<?php
declare(strict_types=1);

// Exemplos praticos de insercao e remocao em arrays.

function printExample(string $title, array $data): void
{
    echo "\n$title:\n";
    print_r($data);
}

// 1) array_push basico
$nomes = ["João", "Maria", "Pedro"];
array_push($nomes, "Ana");
printExample('1) array_push basico', $nomes);

// 2) Inserindo múltiplos valores com array_push
$times = ["Azul", "Vermelho"];
array_push($times, "Verde", "Amarelo");
printExample('2) array_push com multiplos valores', $times);

// 3) Forma mais comum de adicionar itens (operador []).
$usuarios = [];
$usuarios[] = "Natan";
$usuarios[] = "Carlos";
printExample('3) Operador [] para adicionar', $usuarios);

// 4) Cenário real: lista de jogadores.
$jogadores = ["Messi", "Neymar", "Cristiano"];
$jogadores[] = "Vinícius"; // adiciona um por vez
array_push($jogadores, "Rodrygo", "De Bruyne"); // adiciona vários
printExample('4) Lista de jogadores ([], array_push)', $jogadores);

// 5) Remover por indice com unset (nao reindexa automaticamente).
$frutas = ["Maçã", "Banana", "Uva", "Pêra"];
unset($frutas[1]); // remove "Banana"
printExample('5) unset por indice (mantem chaves originais)', $frutas);

// Reindexando apos unset.
$frutas = array_values($frutas);
printExample('5b) Reindexando com array_values', $frutas);

// 6) Remover por valor usando array_search + unset.
$cores = ["azul", "vermelho", "verde", "amarelo"];
$indice = array_search("verde", $cores);
if ($indice !== false) {
    unset($cores[$indice]);
}
printExample('6) unset por valor (array_search)', $cores);

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
printExample('8) Remover pares com unset', $numeros);

// Reindexar apos remocao multipla.
$numeros = array_values($numeros);
printExample('8b) Reindexando apos remocao multipla', $numeros);

// 9) Esvaziar array versus remover a variavel.
$lista = ["x", "y"];
unset($lista); // remove a variável inteira
// echo $lista; // geraria notice, pois $lista não existe mais

echo "\n9) unset($lista) remove a variável.\n";
$lista2 = ["x", "y"];
$lista2 = []; // esvaziar mantendo a variável

echo "9b) lista2 esvaziada, variável existe:\n";
print_r($lista2);