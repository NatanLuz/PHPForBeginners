<?php

require_once __DIR__ . '/contabancaria.php';

/**
 * HERANCA - PARTE 02
 *
 * Classe filha (subclasse): especializa comportamentos
 * da classe base ContaBancaria.
 */
class ContaFisica extends ContaBancaria
{
	private string $cpf;
	private float $limiteChequeEspecial;

	public function __construct(
		string $titular,
		string $agencia,
		string $numero,
		string $cpf,
		float $saldoInicial = 0.0,
		float $limiteChequeEspecial = 0.0
	) {
		parent::__construct($titular, $agencia, $numero, $saldoInicial);

		$cpf = trim($cpf);
		if ($cpf === '') {
			throw new InvalidArgumentException('CPF nao pode ser vazio.');
		}

		if ($limiteChequeEspecial < 0) {
			throw new InvalidArgumentException('Limite do cheque especial nao pode ser negativo.');
		}

		$this->cpf = $cpf;
		$this->limiteChequeEspecial = $limiteChequeEspecial;
	}

	public function getCpf(): string
	{
		return $this->cpf;
	}

	public function getLimiteChequeEspecial(): float
	{
		return $this->limiteChequeEspecial;
	}

	/**
	 * Sobrescrita do saque:
	 * - Conta base: so permite sacar ate o saldo.
	 * - Conta fisica: permite sacar ate saldo + limite.
	 */
	public function sacar(float $valor): bool
	{
		if ($valor <= 0) {
			throw new InvalidArgumentException('Saque deve ser maior que zero.');
		}

		$disponivel = $this->saldo + $this->limiteChequeEspecial;

		if ($valor > $disponivel) {
			return false;
		}

		$this->saldo -= $valor;
		return true;
	}

	public function exibirResumo(): string
	{
		// Reaproveita resumo da classe base e adiciona dados da filha.
		return parent::exibirResumo()
			. " | CPF: {$this->cpf} | Limite: "
			. $this->formatarMoeda($this->limiteChequeEspecial);
	}
}