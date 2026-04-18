<?php

declare(strict_types=1);

require_once __DIR__ . '/carro.php';
require_once __DIR__ . '/moto.php';

function secao(string $titulo): void
{
    echo PHP_EOL;
    echo str_repeat('=', 78) . PHP_EOL;
    echo $titulo . PHP_EOL;
    echo str_repeat('=', 78) . PHP_EOL;
}

secao('AULA 09 - ABSTRACAO (PHP POO)');
echo 'Objetivo: entender classe abstrata, heranca e polimorfismo com foco em contrato parcial.' . PHP_EOL;

echo PHP_EOL . 'Conceitos centrais:' . PHP_EOL;
echo '- Classe abstrata nao pode ser instanciada diretamente.' . PHP_EOL;
echo '- Ela oferece base comum e forca metodos abstratos nas classes filhas.' . PHP_EOL;
echo '- Classes filhas implementam os detalhes concretos.' . PHP_EOL;

secao('PARTE 01 - CLASSE ABSTRATA VEICULO');
echo 'Veiculo define estrutura comum: marca, modelo, ano, ligar/desligar e painel.' . PHP_EOL;
echo 'Tambem obriga filhas a implementar: acelerar, frear e tipoVeiculo.' . PHP_EOL;

secao('PARTE 02 - IMPLEMENTACOES CONCRETAS (CARRO E MOTO)');
$carro = new Carro('Toyota', 'Corolla', 2022, 4);
$moto = new Moto('Yamaha', 'MT-07', 2023, 689);

echo $carro->exibirPainel() . PHP_EOL;
echo $moto->exibirPainel() . PHP_EOL;

secao('PARTE 03 - COMPORTAMENTO ESPECIFICO E POLIMORFISMO');
$veiculos = [$carro, $moto];

foreach ($veiculos as $veiculo) {
    echo PHP_EOL . '--- ' . $veiculo->tipoVeiculo() . ' ---' . PHP_EOL;
    echo 'Antes de ligar: ' . $veiculo->exibirPainel() . PHP_EOL;

    $veiculo->acelerar(20); // deve informar que esta desligado

    $veiculo->ligar();
    $veiculo->acelerar(20);
    $veiculo->acelerar(30);
    echo 'Apos acelerar: ' . $veiculo->exibirPainel() . PHP_EOL;

    $veiculo->frear(25);
    echo 'Apos frear: ' . $veiculo->exibirPainel() . PHP_EOL;

    $veiculo->desligar();
    echo 'Apos desligar: ' . $veiculo->exibirPainel() . PHP_EOL;
}

secao('PARTE 04 - BENEFICIO DE ABSTRACAO');
echo 'Com abstracao, voce define uma arquitetura padrao para todos os veiculos.' . PHP_EOL;
echo 'Cada tipo implementa sua regra sem quebrar o contrato da classe base.' . PHP_EOL;
echo 'Isso facilita manutencao, expansao e leitura do sistema.' . PHP_EOL;

secao('RESUMO DIDATICO');
echo '1) Classe abstrata e base de reutilizacao com regras comuns.' . PHP_EOL;
echo '2) Metodos abstratos forcam implementacao nas classes filhas.' . PHP_EOL;
echo '3) Polimorfismo permite tratar carro e moto como Veiculo.' . PHP_EOL;
echo '4) Abstracao reduz repeticao e melhora consistencia do codigo.' . PHP_EOL;

secao('MINI EXERCICIO GUIADO');
echo 'Exercicio A: Crie classe Caminhao extends Veiculo com atributo capacidadeCarga.' . PHP_EOL;
echo 'Exercicio B: Defina aceleracao mais lenta para Caminhao.' . PHP_EOL;
echo 'Exercicio C: Adicione Caminhao no array $veiculos e teste no foreach.' . PHP_EOL;
echo 'Exercicio D: Crie metodo protegido validarVelocidadeMaxima() na classe Veiculo.' . PHP_EOL;
