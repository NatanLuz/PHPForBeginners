<?php

declare(strict_types=1);

require_once __DIR__ . '/Carro.php';
require_once __DIR__ . '/CarroPrivate.php';
require_once __DIR__ . '/Funcionario.php';
require_once __DIR__ . '/Gerente.php';
require_once __DIR__ . '/Operario.php';

/**
 * Revisao formal de encapsulamento:
 * - public
 * - private
 * - protected
 *
 * Este arquivo consolida as aulas anteriores em um unico roteiro.
 */

function titulo(string $texto): void
{
    echo PHP_EOL;
    echo str_repeat('=', 78) . PHP_EOL;
    echo $texto . PHP_EOL;
    echo str_repeat('=', 78) . PHP_EOL;
}

function linha(string $texto = ''): void
{
    echo $texto . PHP_EOL;
}

function tabelaCabecalho(): void
{
    linha(str_pad('MODIFICADOR', 14) . str_pad('ACESSO EXTERNO', 20) . str_pad('ACESSO NA HERANCA', 20) . 'USO PRINCIPAL');
    linha(str_repeat('-', 78));
}

function tabelaLinha(string $modificador, string $acessoExterno, string $acessoHeranca, string $uso): void
{
    linha(str_pad($modificador, 14) . str_pad($acessoExterno, 20) . str_pad($acessoHeranca, 20) . $uso);
}

titulo('REVISAO FINAL: ENCAPSULAMENTO (PUBLIC x PRIVATE x PROTECTED)');
linha('Objetivo: consolidar diferencas, vantagens e riscos de cada modificador.');

// -----------------------------------------------------------------------------
// 1) PUBLIC
// -----------------------------------------------------------------------------
titulo('1) PUBLIC - Simples, porem com baixo controle de estado');

$carroPublic = new Carro('Honda Civic', 2021, 'Prata');
$carroPublic->ligar();
$carroPublic->acelerar(40);

linha('Estado inicial via metodos:');
linha($carroPublic->exibirPainel());

linha('');
linha('Alteracao direta (permitida com public):');
$carroPublic->velocidade = 999;
$carroPublic->cor = 'Roxo';
linha($carroPublic->exibirPainel());

linha('Analise: public facilita acesso, mas permite quebrar regras de negocio.');

// -----------------------------------------------------------------------------
// 2) PRIVATE
// -----------------------------------------------------------------------------
titulo('2) PRIVATE - Protecao forte do estado interno');

$carroPrivate = new CarroPrivate('Toyota Corolla', 2022, 'Branco');
$carroPrivate->ligar();
$carroPrivate->acelerar(50);

linha('Estado inicial via metodos controlados:');
linha($carroPrivate->exibirPainel());

linha('');
linha('Com private, alteracoes diretas externas sao bloqueadas em tempo de execucao.');
linha('Exemplo nao executado (apenas didatico):');
linha('- $carroPrivate->velocidade = 999; // ERRO de acesso');

linha('Ajuste correto por metodo:');
$carroPrivate->setCor('Cinza');
$carroPrivate->frear(20);
linha($carroPrivate->exibirPainel());

linha('Analise: private aumenta seguranca e previsibilidade do objeto.');

// -----------------------------------------------------------------------------
// 3) PROTECTED
// -----------------------------------------------------------------------------
titulo('3) PROTECTED - Reuso com heranca e encapsulamento intermediario');

$funcionario = new Funcionario('Carlos', 3200.00, 'Administrativo');
$gerente = new Gerente('Fernanda', 8500.00, 'Tecnologia', 8);
$operario = new Operario('Joao', 2800.00, 'Producao', 22, 18.50);

linha('Resumo da hierarquia:');
linha($funcionario->exibirResumo());
linha($gerente->exibirResumo());
linha($operario->exibirResumo());

linha('');
linha('Com protected, classes filhas acessam membros herdados e sobrescrevem regras.');
linha('Exemplo nao executado (apenas didatico):');
linha('- $gerente->salarioBase = 1; // ERRO de acesso externo');

linha('Analise: protected equilibra protecao e extensibilidade na heranca.');

// -----------------------------------------------------------------------------
// 4) TABELA COMPARATIVA
// -----------------------------------------------------------------------------
titulo('4) Tabela comparativa (visao executiva)');

tabelaCabecalho();
tabelaLinha('public', 'Sim', 'Sim', 'Rapidez inicial e APIs abertas.');
tabelaLinha('private', 'Nao', 'Nao', 'Protecao total do estado interno.');
tabelaLinha('protected', 'Nao', 'Sim', 'Heranca com reuso controlado.');

// -----------------------------------------------------------------------------
// 5) DIRETRIZ PROFISSIONAL
// -----------------------------------------------------------------------------
titulo('5) Diretriz profissional recomendada');

linha('1) Comece com atributos private por padrao.');
linha('2) Exponha apenas metodos publicos necessarios (interface da classe).');
linha('3) Use protected quando houver heranca real com necessidade de extensao.');
linha('4) Evite public em atributos de dominio critico (salario, saldo, estado interno).');

// -----------------------------------------------------------------------------
// 6) PROXIMO PASSO
// -----------------------------------------------------------------------------
titulo('6) Proximo passo de estudo');

linha('Sugestao: avancar para polimorfismo formal com interfaces e classes abstratas.');
linha('Assim voce consolida encapsulamento com arquitetura orientada a contratos.');
