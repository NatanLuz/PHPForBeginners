<?php

// Estruturas de controle em PHP.
// O arquivo mostra exemplos de decisao, repeticao e controle de fluxo.

// 1. IF / ELSE / ELSEIF

$nome = "natan";
$nota1 = 8;
$nota2 = 6;
$media = ($nota1 + $nota2) / 2;

if ($media >= 7) {
    echo "$nome foi aprovado com media $media\n";
}

if ($media >= 7) {
    echo "$nome foi aprovado\n";
} else {
    echo "$nome foi reprovado\n";
}

if ($media >= 9) {
    echo "Nota A - Excelente\n";
} elseif ($media >= 7) {
    echo "Nota B - Bom\n";
} elseif ($media >= 5) {
    echo "Nota C - Passou\n";
} else {
    echo "Nota F - Reprovado\n";
}

// 2. Operadores de comparacao

$idade = 25;

if ($idade == 25) {
    echo "Idade e 25\n";
}

if ($idade != 30) {
    echo "Idade nao e 30\n";
}

if ($idade >= 18) {
    echo "E maior de idade\n";
}

if ("25" === 25) {
    echo "Sao identicos\n";
} else {
    echo "Tipos diferentes\n";
}

// 3. Operadores logicos

$nota = 8;
$presenca = true;

if ($nota >= 7 && $presenca) {
    echo "Pode fazer trabalho final\n";
}

if ($nota >= 7 || $presenca) {
    echo "Pode participar da recuperacao\n";
}

if (!$presenca) {
    echo "Nao compareceu\n";
} else {
    echo "Compareceu\n";
}

// 4. Switch / case

$dia = 3;

switch ($dia) {
    case 1:
        echo "Segunda-feira\n";
        break;
    case 2:
        echo "Terca-feira\n";
        break;
    case 3:
        echo "Quarta-feira\n";
        break;
    case 4:
        echo "Quinta-feira\n";
        break;
    case 5:
        echo "Sexta-feira\n";
        break;
    default:
        echo "Fim de semana\n";
}

// 5. For

echo "\nContando de 1 a 5:\n";
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}

echo "\n\nTabuada do 5:\n";
for ($i = 1; $i <= 10; $i++) {
    echo "5 x $i = " . (5 * $i) . "\n";
}

// 6. Foreach

$notasAlunos = ["Ana" => 9, "Bruno" => 7, "Carlos" => 5];

echo "\nNotas dos alunos:\n";
foreach ($notasAlunos as $aluno => $notaAluno) {
    if ($notaAluno >= 7) {
        echo "$aluno tirou $notaAluno - APROVADO\n";
    } else {
        echo "$aluno tirou $notaAluno - REPROVADO\n";
    }
}

// 7. While

$contador = 1;
echo "\nContando com WHILE:\n";
while ($contador <= 3) {
    echo "Numero: $contador\n";
    $contador++;
}

// 8. Do / while

echo "\nUsando DO/WHILE:\n";
$numero = 1;
do {
    echo "Valor: $numero\n";
    $numero++;
} while ($numero <= 1);

// 9. Break e continue

echo "\nCom BREAK (para no 3):\n";
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        break;
    }
    echo $i . " ";
}

echo "\n\nCom CONTINUE (pula o 3):\n";
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo $i . " ";
}

// Exemplos praticos do mundo real

echo "\n\nExemplo 1: validacao de login\n";
$usuario = "admin";
$senha = "123456";
$usuarioInserido = "admin";
$senhaInserida = "123456";

if ($usuarioInserido === $usuario && $senhaInserida === $senha) {
    echo "Login realizado com sucesso!\n";
} else {
    echo "Usuario ou senha invalidos!\n";
}

echo "\nExemplo 2: calculo de desconto\n";
$valorCompra = 150;
$desconto = 0;

if ($valorCompra > 500) {
    $desconto = 0.20;
} elseif ($valorCompra > 200) {
    $desconto = 0.10;
} elseif ($valorCompra > 100) {
    $desconto = 0.05;
}

$valorFinal = $valorCompra - ($valorCompra * $desconto);
echo "Valor original: R$ $valorCompra\n";
echo "Desconto: " . ($desconto * 100) . "%\n";
echo "Valor final: R$ $valorFinal\n";

echo "\nExemplo 3: categorizacao de idade\n";
$idades = [5, 15, 25, 35, 65];

foreach ($idades as $idadePessoa) {
    switch (true) {
        case $idadePessoa < 12:
            echo "$idadePessoa anos = Crianca\n";
            break;
        case $idadePessoa < 18:
            echo "$idadePessoa anos = Adolescente\n";
            break;
        case $idadePessoa < 60:
            echo "$idadePessoa anos = Adulto\n";
            break;
        default:
            echo "$idadePessoa anos = Idoso\n";
    }
}

echo "\nExemplo 4: validacao de senha\n";
$senhas = ["123456", "Abc@1234", "senha", "P@ss123"];

foreach ($senhas as $pwd) {
    $temMaiuscula = false;
    $temNumero = false;
    $comprimentoOk = strlen($pwd) >= 8;

    if ($pwd != strtolower($pwd)) {
        $temMaiuscula = true;
    }

    for ($i = 0; $i < strlen($pwd); $i++) {
        if (is_numeric($pwd[$i])) {
            $temNumero = true;
            break;
        }
    }

    if ($temMaiuscula && $temNumero && $comprimentoOk) {
        echo "$pwd = SENHA FORTE\n";
    } else {
        echo "$pwd = SENHA FRACA\n";
    }
}

echo "\nExemplo 5: sistema de pontos\n";
$pontos = 350;
$nivel = "";

if ($pontos >= 1000) {
    $nivel = "Diamante";
} elseif ($pontos >= 500) {
    $nivel = "Platina";
} elseif ($pontos >= 250) {
    $nivel = "Ouro";
} elseif ($pontos >= 100) {
    $nivel = "Prata";
} else {
    $nivel = "Bronze";
}

echo "Pontos: $pontos\n";
echo "Nivel: $nivel\n";

echo "\nExemplo 6: jogo de adivinhacao\n";
$numeroSecreto = 7;
$tentativas = [3, 7, 9, 10];
$acertou = false;

foreach ($tentativas as $numeroTentativa) {
    if ($numeroTentativa === $numeroSecreto) {
        echo "Acertou! O numero e $numeroTentativa!\n";
        $acertou = true;
        break;
    } elseif ($numeroTentativa < $numeroSecreto) {
        echo "$numeroTentativa e muito pequeno...\n";
    } else {
        echo "$numeroTentativa e muito grande...\n";
    }
}

if (!$acertou) {
    echo "Game Over! O numero era $numeroSecreto\n";
}

echo "\nExemplo 7: calculadora com switch\n";
$num1 = 10;
$num2 = 5;
$operacao = "+";
$resultado = 0;

switch ($operacao) {
    case "+":
        $resultado = $num1 + $num2;
        break;
    case "-":
        $resultado = $num1 - $num2;
        break;
    case "*":
        $resultado = $num1 * $num2;
        break;
    case "/":
        if ($num2 != 0) {
            $resultado = $num1 / $num2;
        } else {
            echo "Erro: divisao por zero!\n";
        }
        break;
    default:
        echo "Operacao desconhecida!\n";
}

if ($operacao != "/" || $num2 != 0) {
    echo "$num1 $operacao $num2 = $resultado\n";
}

echo "\nExemplo 8: estoque de produtos\n";
$produtos = [
    "Notebook" => 2,
    "Mouse" => 50,
    "Teclado" => 0,
    "Monitor" => 8,
];

foreach ($produtos as $produto => $quantidade) {
    if ($quantidade == 0) {
        echo "$produto: FORA DE ESTOQUE\n";
    } elseif ($quantidade < 5) {
        echo "$produto: QUANTIDADE BAIXA ($quantidade unidades)\n";
    } elseif ($quantidade >= 30) {
        echo "$produto: ESTOQUE ABUNDANTE ($quantidade unidades)\n";
    } else {
        echo "$produto: OK ($quantidade unidades)\n";
    }
}

echo "\nExemplo 9: ranking de jogadores\n";
$jogadores = [
    "Joao" => 2500,
    "Maria" => 1800,
    "Pedro" => 3200,
    "Ana" => 950,
];

arsort($jogadores);

$posicao = 1;
foreach ($jogadores as $nomeJogador => $pontosJogador) {
    if ($posicao == 1) {
        echo "1o lugar - $nomeJogador ($pontosJogador pontos)\n";
    } elseif ($posicao == 2) {
        echo "2o lugar - $nomeJogador ($pontosJogador pontos)\n";
    } elseif ($posicao == 3) {
        echo "3o lugar - $nomeJogador ($pontosJogador pontos)\n";
    } else {
        echo "$posicao o lugar - $nomeJogador ($pontosJogador pontos)\n";
    }
    $posicao++;
}

echo "\nExemplo 10: numeros par e impar\n";
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

foreach ($numeros as $numeroItem) {
    if ($numeroItem % 2 == 0) {
        echo "$numeroItem e PAR\n";
    } else {
        echo "$numeroItem e IMPAR\n";
    }
}
?>


// O arquivo pode ser executado para observar os resultados.

//seguindo outro exemplo que temos por aqui


<?php

$nome = "Usuario";
$idade = 16;

if ($idade < 12) {
    echo "$nome: Acesso NEGADO\n";
} elseif ($idade < 18) {
    echo "$nome: Pode entrar, mas precisa de acompanhante\n";
} else {
    echo "$nome: Acesso LIBERADO\n";
}


// switch case

$num1 = 10;
$num2 = 5;  

$operacao = "";


switch ($operacao) 


{



}