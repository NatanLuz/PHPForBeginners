<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estruturas de Repeticao - PHP</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #1f2937;
        color: #e5e7eb;
        font-family: Consolas, "Courier New", monospace;
        padding: 24px;
    }

    .cmd {
        background: #111827;
        border: 1px solid #374151;
        border-radius: 8px;
        padding: 20px;
        line-height: 1.6;
    }

    h1 {
        margin-bottom: 16px;
        color: #93c5fd;
        font-size: 22px;
    }
    </style>
</head>

<body>
    <h1>Estruturas de Repeticao em PHP</h1>
    <div class="cmd">
        <?php
        function titulo(string $texto): void
        {
            echo "<br><strong>" . $texto . "</strong><br>";
        }

        function linha(string $texto = ""): void
        {
            echo $texto . "<br>";
        }

        titulo("1) FOR - quando voce sabe o total de repeticoes");
        linha("Conceito: o FOR possui inicio, condicao e incremento no mesmo lugar.");
        linha("Sintaxe: for (inicio; condicao; incremento) { ... }");
        linha("Exemplo: contar de 1 ate 5.");

        for ($i = 1; $i <= 5; $i++) {
            linha("FOR -> i = $i");
        }

        titulo("2) WHILE - quando depende de uma condicao");
        linha("Conceito: repete enquanto a condicao for verdadeira.");
        linha("Cuidado: sempre atualize a variavel de controle para evitar loop infinito.");

        $contador = 1;
        while ($contador <= 3) {
            linha("WHILE -> contador = $contador");
            $contador++;
        }

        titulo("3) DO...WHILE - executa pelo menos uma vez");
        linha("Conceito: primeiro executa o bloco, depois verifica a condicao.");
        linha("Uso comum: menus e leituras que precisam acontecer ao menos uma vez.");

        $numero = 1;
        do {
            linha("DO...WHILE -> numero = $numero");
            $numero++;
        } while ($numero <= 2);

        titulo("4) FOREACH - melhor para arrays");
        linha("Conceito: percorre cada item de um array sem precisar de indice manual.");

        $pessoas = [
            ['id' => 1, 'nome' => 'Joao', 'idade' => 20],
            ['id' => 2, 'nome' => 'Maria', 'idade' => 25],
            ['id' => 3, 'nome' => 'Pedro', 'idade' => 17],
            ['id' => 4, 'nome' => 'Ana', 'idade' => 30],
        ];

        foreach ($pessoas as $pessoa) {
            linha("FOREACH -> ID {$pessoa['id']} | Nome {$pessoa['nome']} | Idade {$pessoa['idade']}");
        }

        titulo("5) CONTINUE e BREAK");
        linha("continue: pula somente a iteracao atual e vai para a proxima.");
        linha("break: encerra completamente o laco.");

        for ($n = 1; $n <= 7; $n++) {
            if ($n === 2) {
                linha("CONTINUE acionado no numero 2 (nao processa este numero)");
                continue;
            }

            if ($n === 6) {
                linha("BREAK acionado no numero 6 (encerra o laco)");
                break;
            }

            linha("Numero processado: $n");
        }

        titulo("6) Exemplo pratico - somar valores de um array");
        linha("Objetivo: calcular soma e media de notas usando FOREACH.");

        $notas = [7.5, 8.0, 6.5, 9.0];
        $soma = 0;

        foreach ($notas as $nota) {
            $soma += $nota;
        }

        $media = $soma / count($notas);
        linha("Soma das notas: $soma");
        linha("Media das notas: " . number_format($media, 2));

        titulo("7) Exemplo pratico - filtro de maiores de idade");
        linha("Objetivo: listar apenas pessoas com 18 anos ou mais.");

        foreach ($pessoas as $pessoa) {
            if ($pessoa['idade'] < 18) {
                continue;
            }

            linha("Maior de idade: {$pessoa['nome']} ({$pessoa['idade']} anos)");
        }

        titulo("8) Exercicios guiados (para praticar)");
        linha("Exercicio A: Imprima a tabuada do 5 usando FOR (5 x 1 ate 5 x 10).");
        linha("Exercicio B: Some todos os numeros pares de 1 a 20 usando WHILE.");
        linha("Exercicio C: Percorra um array de nomes com FOREACH e imprima em maiusculo.");
        linha("Exercicio D: Use DO...WHILE para contar de 10 ate 1 (contagem regressiva).");

        titulo("9) Gabarito dos exercicios (confira depois de tentar)");
        linha("A) Tabuada do 5:");
        for ($t = 1; $t <= 10; $t++) {
            linha("5 x $t = " . (5 * $t));
        }

        linha("");
        linha("B) Soma dos pares de 1 a 20:");
        $valor = 1;
        $somaPares = 0;
        while ($valor <= 20) {
            if ($valor % 2 === 0) {
                $somaPares += $valor;
            }
            $valor++;
        }
        linha("Soma dos pares = $somaPares");

        linha("");
        linha("C) Nomes em maiusculo:");
        $nomes = ['lucas', 'bianca', 'rafael'];
        foreach ($nomes as $nome) {
            linha(strtoupper($nome));
        }

        linha("");
        linha("D) Contagem regressiva com DO...WHILE:");
        $regressivo = 10;
        do {
            linha("$regressivo");
            $regressivo--;
        } while ($regressivo >= 1);

        titulo("10) Resumo final - quando usar cada estrutura");
        linha("FOR: quando voce conhece o numero de repeticoes.");
        linha("WHILE: quando a repeticao depende de uma condicao externa.");
        linha("DO...WHILE: quando o bloco precisa rodar pelo menos 1 vez.");
        linha("FOREACH: quando o alvo e um array ou colecao.");
        linha("CONTINUE: para pular apenas uma iteracao.");
        linha("BREAK: para interromper totalmente o laco.");

        linha("");
        titulo("11) Versao 2 - desafios progressivos");
        linha("Orientacao: tente resolver primeiro sem olhar o gabarito.");
        linha("Meta: praticar logica e controle de repeticao em nivel crescente.");

        linha("");
        linha("Nivel Facil:");
        linha("F1) Imprima os numeros de 1 a 15 usando FOR.");
        linha("F2) Imprima os numeros pares de 2 a 20 usando WHILE.");
        linha("F3) Crie um array com 5 frutas e mostre cada fruta com FOREACH.");

        linha("");
        linha("Nivel Medio:");
        linha("M1) Calcule o fatorial de 5 usando FOR.");
        linha("M2) Some os numeros de 1 a 100 que sao multiplos de 3.");
        linha("M3) Em um array de notas, mostre apenas notas >= 7 usando CONTINUE.");

        linha("");
        linha("Nivel Avancado:");
        linha("A1) Mostre a tabuada completa de 1 a 10 (laco dentro de laco).");
        linha("A2) Em um array de numeros, pare no primeiro numero negativo usando BREAK.");
        linha("A3) Conte quantos nomes em um array comecam com a letra A.");

        linha("");
        titulo("12) Gabarito - Versao 2 (confira depois de tentar)");

        linha("F1) Numeros de 1 a 15:");
        for ($f1 = 1; $f1 <= 15; $f1++) {
            linha((string) $f1);
        }

        linha("");
        linha("F2) Pares de 2 a 20:");
        $f2 = 2;
        while ($f2 <= 20) {
            linha((string) $f2);
            $f2 += 2;
        }

        linha("");
        linha("F3) Lista de frutas:");
        $frutas = ['Maca', 'Banana', 'Laranja', 'Uva', 'Manga'];
        foreach ($frutas as $fruta) {
            linha($fruta);
        }

        linha("");
        linha("M1) Fatorial de 5:");
        $fatorial = 1;
        for ($m1 = 1; $m1 <= 5; $m1++) {
            $fatorial *= $m1;
        }
        linha("5! = $fatorial");

        linha("");
        linha("M2) Soma dos multiplos de 3 entre 1 e 100:");
        $somaMultiplos3 = 0;
        for ($m2 = 1; $m2 <= 100; $m2++) {
            if ($m2 % 3 === 0) {
                $somaMultiplos3 += $m2;
            }
        }
        linha("Soma = $somaMultiplos3");

        linha("");
        linha("M3) Notas >= 7:");
        $notasTurma = [6.0, 8.5, 7.0, 5.5, 9.0, 6.8];
        foreach ($notasTurma as $notaTurma) {
            if ($notaTurma < 7) {
                continue;
            }
            linha("Aprovado com nota: $notaTurma");
        }

        linha("");
        linha("A1) Tabuada completa de 1 a 10:");
        for ($a1 = 1; $a1 <= 10; $a1++) {
            linha("Tabuada do $a1:");
            for ($j = 1; $j <= 10; $j++) {
                linha("$a1 x $j = " . ($a1 * $j));
            }
            linha("");
        }

        linha("A2) Parar no primeiro numero negativo:");
        $numeros = [10, 8, 5, 3, -1, 7, 9];
        foreach ($numeros as $numeroLista) {
            if ($numeroLista < 0) {
                linha("Negativo encontrado ($numeroLista). Laco encerrado.");
                break;
            }
            linha("Numero valido: $numeroLista");
        }

        linha("");
        linha("A3) Quantidade de nomes que comecam com A:");
        $nomesLista = ['Ana', 'Bruno', 'Amanda', 'Carlos', 'Arthur', 'Bianca'];
        $quantidadeA = 0;
        foreach ($nomesLista as $nomeLista) {
            if (strtoupper(substr($nomeLista, 0, 1)) === 'A') {
                $quantidadeA++;
            }
        }
        linha("Total de nomes iniciados por A: $quantidadeA");

        linha("");
        linha("Final do programa.");
        ?>
    </div>
</body>

</html>