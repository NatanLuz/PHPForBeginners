<?php
declare(strict_types=1);

// Arquivo de testes para operadores logicos.
// Execute para observar o efeito do curto-circuito e da precedencia.

function show(string $label, mixed $value): void
{
    echo $label . ": ";
    var_dump($value);
}

echo "\n1) && e || com curto-circuito\n";
function validar(array $dados): bool
{
    echo "validar\n";
    return !empty($dados);
}

function salvar(array $dados): bool
{
    echo "salvar\n";
    return true;
}

$dados = [];
$ok1 = validar($dados) && salvar($dados); // salvar() não roda se validar() for false
show('ok1', $ok1);

$dados = ['item' => 1];
$ok2 = validar($dados) && salvar($dados); // agora ambos rodam
show('ok2', $ok2);

$flagA = true;
$flagB = false;
show('flagA && flagB', ($flagA && $flagB));
show('flagA || flagB', ($flagA || $flagB));

echo "\n2) Precedencia: and/or vs &&/||\n";
$x = false or true;   // $x fica false (atribuição antes de 'or')
$y = false || true;   // $y fica true (|| tem precedência maior que '=')
show('x (false or true)', $x);
show('y (false || true)', $y);

echo "\n3) Negacoes e truthiness\n";
show('!"" (string vazia)', (!""));
show('!"0" (string "0")', (!"0"));
show('!" " (espaço)', (!" "));
show('![] (array vazio)', (![]));
show('!null', (!null));
show('!0 (inteiro zero)', (!0));

echo "\n4) XOR exclusivo\n";
show('true xor false', (true xor false));
show('true xor true', (true xor true));
show('false xor false', (false xor false));

echo "\n5) Combinando com comparacoes e ternario\n";
$saldo = 100;
$limiteExtra = 0;
$temCredito = ($saldo > 0) || ($limiteExtra > 0);
$mensagem = $temCredito ? "Compra aprovada" : "Saldo insuficiente";
show('temCredito', $temCredito);
show('mensagem', $mensagem);

echo "\nPronto. Experimentos concluídos.\n";