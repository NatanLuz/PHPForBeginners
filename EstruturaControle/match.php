<?php

// Exemplo 1: match basico para calculadora.
$num1 = 10;
$num2 = 5;
$operacao = "/";

$resultado = match ($operacao) {
    "+" => $num1 + $num2,
    "-" => $num1 - $num2,
    "*" => $num1 * $num2,
    "/" => $num2 !== 0 ? $num1 / $num2 : "Erro: divisao por zero.",
    default => "Operacao invalida.",
};

echo "=== Exemplo 1: Calculadora com match ===\n";
echo "Operacao: {$operacao}\n";
echo "Resultado: {$resultado}\n\n";

// Exemplo 2 (mais avancado): classificacao de atendimento de chamados.
// Aqui usamos match(true) para aplicar regras por prioridade.
$tempoAbertoHoras = 30;
$clienteVip = true;
$impacto = "alto"; // baixo, medio ou alto
$temSlaExpirando = true;

$fila = match (true) {
    // Regra mais critica: impacto alto com SLA prestes a estourar.
    $impacto === "alto" && $temSlaExpirando => "P0 - Acao imediata",

    // Cliente VIP com impacto medio/alto recebe fila preferencial.
    $clienteVip && in_array($impacto, ["medio", "alto"], true) => "P1 - Prioridade VIP",

    // Chamados antigos sobem de prioridade automaticamente.
    $tempoAbertoHoras >= 24 && $impacto !== "baixo" => "P2 - Escalonar para analista senior",

    // Chamados de baixo risco ficam na fila padrao.
    $impacto === "baixo" => "P4 - Fila padrao",

    // Caso residual (medio sem urgencia).
    default => "P3 - Fila normal",
};

echo "=== Exemplo 2: Regras de negocio com match(true) ===\n";
echo "Tempo aberto: {$tempoAbertoHoras}h\n";
echo "Cliente VIP: " . ($clienteVip ? "sim" : "nao") . "\n";
echo "Impacto: {$impacto}\n";
echo "SLA expirando: " . ($temSlaExpirando ? "sim" : "nao") . "\n";
echo "Classificacao final: {$fila}\n";

echo "\n=== Guia completo: match no PHP 8 ===\n";
echo "1) match compara com identidade estrita (===).\n";
echo "2) match retorna valor (e uma expressao).\n";
echo "3) nao existe fall-through como no switch (nao usa break).\n";
echo "4) em geral, deve haver cobertura total (default ou todos os casos).\n\n";

// Exemplo 3: uso basico (equivalente ao exemplo da documentacao).
$comida = "bolo";
$descricaoComida = match ($comida) {
    "apple" => "Essa comida e uma maca",
    "bar" => "Essa comida e um bar",
    "bolo" => "Essa comida e um bolo",
    default => "Comida desconhecida",
};

echo "=== Exemplo 3: Uso basico de match ===\n";
var_dump($descricaoComida);
echo "\n";

// Exemplo 4: identidade estrita (===) versus comparacao fraca de switch.
$entrada = "1";
$resultadoIdentidade = match ($entrada) {
    1 => "inteiro 1",
    "1" => "string 1",
    default => "outro",
};

echo "=== Exemplo 4: Identidade estrita (===) ===\n";
echo "Entrada: '1' (string) => {$resultadoIdentidade}\n\n";

// Exemplo 5: multiplas condicoes no mesmo braco (OR logico).
$mes = "apr";
$diasNoMes = match ($mes) {
    "apr", "jun", "sep", "nov" => 30,
    "jan", "mar", "may", "jul", "aug", "oct", "dec" => 31,
    "feb" => 28,
    default => throw new InvalidArgumentException("Mes invalido: {$mes}"),
};

echo "=== Exemplo 5: Multiplas condicoes por braco ===\n";
echo "Mes {$mes} => {$diasNoMes} dias\n\n";

// Exemplo 6: match precisa ser exaustivo; sem default, pode lancar erro.
echo "=== Exemplo 6: Exaustividade e UnhandledMatchError ===\n";
$condicao = 5;
try {
    $naoExaustivo = match ($condicao) {
        1, 2 => "foo",
        3, 4 => "bar",
    };
    echo "Resultado: {$naoExaustivo}\n";
} catch (UnhandledMatchError $e) {
    echo "Erro capturado: " . $e->getMessage() . "\n";
}
echo "\n";

// Exemplo 7: match(true) para faixas de idade.
$idade = 23;
$faixa = match (true) {
    $idade >= 65 => "senhor",
    $idade >= 25 => "adulto",
    $idade >= 18 => "adolescente",
    default => "crianca",
};

echo "=== Exemplo 7: match(true) com faixas ===\n";
echo "Idade {$idade} => {$faixa}\n\n";

// Exemplo 8: match(true) para conteudo de string (detectar idioma).
$texto = "Bienvenue chez nous";
$idioma = match (true) {
    str_contains($texto, "Welcome"), str_contains($texto, "Hello") => "en",
    str_contains($texto, "Bienvenue"), str_contains($texto, "Bonjour") => "fr",
    default => "desconhecido",
};

echo "=== Exemplo 8: match(true) com strings ===\n";
echo "Texto: {$texto}\n";
echo "Idioma detectado: {$idioma}\n";