<?php

// 2) FUNCTION PARAMETERS AND ARGUMENTS
// Parametro: variavel na assinatura da funcao.
// Argumento: valor enviado na chamada.

function registerUser(string $name, int $age, string $role = "Student"): void
{
    echo "Name: $name | Age: $age | Role: $role\n";
}

registerUser("Carlos", 21);
registerUser("Beatriz", 24, "Developer");

// Exemplo variadico: recebe quantidade variavel de argumentos.
function sumScores(int ...$scores): int
{
    return array_sum($scores);
}

echo "Total scores: " . sumScores(10, 20, 30) . "\n";
