<?php

declare(strict_types=1);

require_once __DIR__ . '/contabancaria.php';
require_once __DIR__ . '/contafisica.php';
require_once __DIR__ . '/contajuridica.php';

function secao(string $titulo): void
{
	echo PHP_EOL;
	echo str_repeat('=', 76) . PHP_EOL;
	echo $titulo . PHP_EOL;
	echo str_repeat('=', 76) . PHP_EOL;
}

secao('HERANCA - PARTE 01 (CLASSE BASE)');
echo 'Objetivo: criar uma classe pai com regras comuns para contas.' . PHP_EOL;

$contaBase = new ContaBancaria(
	titular: 'Ana Base',
	agencia: '0001',
	numero: '12345-0',
	saldoInicial: 1000.00
);

echo $contaBase->exibirResumo() . PHP_EOL;

$contaBase->depositar(250.00);
echo 'Apos deposito de R$ 250,00: ' . $contaBase->exibirResumo() . PHP_EOL;

$saqueBase = $contaBase->sacar(300.00);
echo 'Saque de R$ 300,00 na conta base: ' . ($saqueBase ? 'aprovado' : 'negado') . PHP_EOL;
echo $contaBase->exibirResumo() . PHP_EOL;

$saqueBaseInvalido = $contaBase->sacar(5000.00);
echo 'Saque de R$ 5.000,00 na conta base: ' . ($saqueBaseInvalido ? 'aprovado' : 'negado') . PHP_EOL;
echo $contaBase->exibirResumo() . PHP_EOL;

secao('HERANCA - PARTE 02 (CLASSE FILHA + SOBRESCRITA)');
echo 'Objetivo: especializar a regra de saque para conta fisica.' . PHP_EOL;

$contaFisica = new ContaFisica(
	titular: 'Bruno Filho',
	agencia: '0001',
	numero: '99887-1',
	cpf: '123.456.789-00',
	saldoInicial: 500.00,
	limiteChequeEspecial: 700.00
);

echo $contaFisica->exibirResumo() . PHP_EOL;

$saqueComLimite = $contaFisica->sacar(900.00);
echo 'Saque de R$ 900,00 (usa limite): ' . ($saqueComLimite ? 'aprovado' : 'negado') . PHP_EOL;
echo $contaFisica->exibirResumo() . PHP_EOL;

$saqueAcimaLimite = $contaFisica->sacar(400.00);
echo 'Saque de R$ 400,00 (acima do disponivel): ' . ($saqueAcimaLimite ? 'aprovado' : 'negado') . PHP_EOL;
echo $contaFisica->exibirResumo() . PHP_EOL;

secao('HERANCA - PARTE 03 (CONTA JURIDICA + TAXA DE SAQUE)');
echo 'Objetivo: especializar a regra de saque com taxa administrativa.' . PHP_EOL;

$contaJuridica = new ContaJuridica(
	titular: 'Empresa XPTO LTDA',
	agencia: '0001',
	numero: '77777-9',
	cnpj: '12.345.678/0001-99',
	saldoInicial: 2000.00,
	taxaSaque: 12.50
);

echo $contaJuridica->exibirResumo() . PHP_EOL;

$saqueJuridico1 = $contaJuridica->sacar(300.00);
echo 'Saque de R$ 300,00 na conta juridica (+ taxa): ' . ($saqueJuridico1 ? 'aprovado' : 'negado') . PHP_EOL;
echo $contaJuridica->exibirResumo() . PHP_EOL;

$saqueJuridico2 = $contaJuridica->sacar(1800.00);
echo 'Saque de R$ 1.800,00 na conta juridica (+ taxa): ' . ($saqueJuridico2 ? 'aprovado' : 'negado') . PHP_EOL;
echo $contaJuridica->exibirResumo() . PHP_EOL;

secao('RESUMO DIDATICO');
echo '1) Heranca permite reutilizar codigo da classe pai.' . PHP_EOL;
echo '2) A classe filha pode adicionar novos atributos (ex.: CPF, limite).' . PHP_EOL;
echo '3) A classe filha pode sobrescrever metodos (ex.: sacar).' . PHP_EOL;
echo '4) Regras diferentes por tipo de conta (limite, taxa) sem duplicar classe base.' . PHP_EOL;
echo '5) parent::__construct e parent::metodo ajudam no reaproveitamento.' . PHP_EOL;

secao('MINI EXERCICIO GUIADO');
echo 'Exercicio A: Adicione metodo transferir para ContaBancaria e reutilize nas filhas.' . PHP_EOL;
echo 'Exercicio B: Na ContaJuridica, adicione taxa diferente para saque noturno.' . PHP_EOL;
echo 'Exercicio C: Na ContaFisica, cobre tarifa quando usar mais de 80% do limite.' . PHP_EOL;
echo 'Exercicio D: Compare comportamento entre base, fisica e juridica com os mesmos valores.' . PHP_EOL;
