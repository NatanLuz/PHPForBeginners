<?php

// Exemplo de switch simples para entendimento.


$num1 = 10;
$num2 = 5;
$operacao = "+";


switch ($operacao) {


    case "+":
        $resultado = $num1 + $num2;
        echo "Resultado: $resultado\n";
        break;
    case "-":
        $resultado = $num1 - $num2;
        echo "Resultado: $resultado\n";
        break;
    case "*":
        $resultado = $num1 * $num2;
        echo "Resultado: $resultado\n";
        break;
    case "/":
        if ($num2 != 0) {
            $resultado = $num1 / $num2;
            echo "Resultado: $resultado\n";
        } else {
            echo "Erro: Divisão por zero não é permitida.\n";
        }
        break;
    default:
        echo "Operação inválida. Por favor, escolha uma operação válida (+, -, *, /).\n";
}

// Exemplo de switch para classificação de idade.
$idade = 25;
switch (true) {
    case ($idade >= 0 && $idade <= 12):
        echo "Criança\n";
        break;
    case ($idade >= 13 && $idade <= 19):
        echo "Adolescente\n";
        break;
    case ($idade >= 20 && $idade <= 59):
        echo "Adulto\n";
        break;
    case ($idade >= 60):
        echo "Idoso\n";
        break;
    default:
        echo "Idade inválida.\n";
}