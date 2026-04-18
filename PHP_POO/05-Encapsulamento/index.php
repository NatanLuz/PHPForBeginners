<?php

require_once __DIR__ . '/Carro.php';

echo "=== AULA: ENCAPSULAMENTO 01 (MODIFICADOR PUBLIC) ===" . PHP_EOL;
echo PHP_EOL;
echo "Conceito rapido:" . PHP_EOL;
echo "- Encapsulamento organiza dados e comportamentos dentro da classe." . PHP_EOL;
echo "- Com public, os membros podem ser acessados de fora da classe." . PHP_EOL;
echo "- E bom para aprender, mas exige cuidado para nao quebrar regras do objeto." . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 1: CRIANDO OBJETO ================" . PHP_EOL;
$carro = new Carro('Honda Civic', 2021, 'Prata');
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 2: CHAMANDO METODOS PUBLICOS ================" . PHP_EOL;
$carro->ligar();
$carro->acelerar(30);
$carro->acelerar(20);
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 3: ACESSANDO PROPRIEDADES PUBLICAS DIRETAMENTE ================" . PHP_EOL;
echo "Modelo atual: " . $carro->modelo . PHP_EOL;
echo "Cor atual: " . $carro->cor . PHP_EOL;

// Como e public, pode alterar fora da classe.
$carro->cor = 'Preto';
echo "Nova cor apos alteracao direta: " . $carro->cor . PHP_EOL;
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 4: RISCO DO PUBLIC (ALTERACAO INDEVIDA) ================" . PHP_EOL;
echo "Alterando velocidade para um valor irreal diretamente..." . PHP_EOL;
$carro->velocidade = 999;
echo $carro->exibirPainel() . PHP_EOL;
echo "Isso mostra por que nas proximas aulas usamos private + metodos de controle." . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 5: VOLTANDO AO FLUXO CORRETO ================" . PHP_EOL;
$carro->frear(1000);
echo $carro->exibirPainel() . PHP_EOL;
$carro->desligar();
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ RESUMO DIDATICO ================" . PHP_EOL;
echo "1) public permite acesso total ao membro da classe." . PHP_EOL;
echo "2) Facilita o entendimento inicial de objetos em POO." . PHP_EOL;
echo "3) Sem controle, pode gerar estados invalidos no objeto." . PHP_EOL;
echo "4) Proximo passo natural: encapsular melhor com private/protected." . PHP_EOL;
echo PHP_EOL;

echo "================ MINI EXERCICIO GUIADO ================" . PHP_EOL;
echo "Exercicio A: Crie um segundo carro e altere modelo/cor diretamente." . PHP_EOL;
echo "Exercicio B: Teste acelerar com carro desligado e observe a mensagem." . PHP_EOL;
echo "Exercicio C: Defina velocidade diretamente e depois corrija com frear()." . PHP_EOL;
echo "Exercicio D: Compare o que foi alterado por metodo e por acesso direto." . PHP_EOL;
