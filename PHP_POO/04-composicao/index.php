<?php

require_once __DIR__ . '/Carro.php';

echo "=== AULA: RELACIONAMENTO POR COMPOSICAO (PHP POO) ===" . PHP_EOL;
echo PHP_EOL;
echo "Conceito rapido:" . PHP_EOL;
echo "- Composicao e uma relacao forte de pertencimento." . PHP_EOL;
echo "- O objeto interno nasce e e controlado pelo objeto principal." . PHP_EOL;
echo "- Aqui: Carro e composto por Motor." . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 1: CRIANDO O CARRO COM MOTOR INTERNO ================" . PHP_EOL;
$carro = new Carro('Sedan LX', 2022, 1600, 'flex');
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 2: LIGAR E ACELERAR ================" . PHP_EOL;
$carro->ligarCarro();
$carro->acelerar(20);
$carro->acelerar(30);
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 3: FREAR ================" . PHP_EOL;
$carro->frear(15);
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 4: DESLIGAR RESETA A VELOCIDADE ================" . PHP_EOL;
$carro->desligarCarro();
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ EXEMPLO 5: REGRAS DE NEGOCIO ================" . PHP_EOL;
echo "Tentando acelerar com carro desligado..." . PHP_EOL;
$carro->acelerar(10);
echo $carro->exibirPainel() . PHP_EOL;
echo PHP_EOL;

echo "================ COMPARACAO RAPIDA: AGREGACAO x COMPOSICAO ================" . PHP_EOL;
echo "Agregacao: departamento usa funcionario, mas funcionario continua existindo separado." . PHP_EOL;
echo "Composicao: carro contem motor, e o carro controla totalmente esse motor." . PHP_EOL;
echo PHP_EOL;

echo "================ RESUMO DIDATICO ================" . PHP_EOL;
echo "1) Carro e a classe principal (todo)." . PHP_EOL;
echo "2) Motor e parte interna (parte)." . PHP_EOL;
echo "3) Carro cria o Motor dentro do construtor (composicao)." . PHP_EOL;
echo "4) Regras de uso ficam no Carro (ligar, acelerar, frear, desligar)." . PHP_EOL;
echo PHP_EOL;

echo "================ MINI EXERCICIO GUIADO ================" . PHP_EOL;
echo "Exercicio A: Crie um segundo carro com motor 2000cc e gasolina." . PHP_EOL;
echo "Exercicio B: Ligue, acelere 3 vezes e mostre o painel." . PHP_EOL;
echo "Exercicio C: Faca frenagens sequenciais e impeça velocidade negativa." . PHP_EOL;
echo "Exercicio D: Tente acelerar desligado e observe a regra de negocio." . PHP_EOL;
