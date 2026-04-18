<?php

/**
 * HERANCA - PARTE 01
 *
 * Classe base (superclasse): concentra regras comuns
 * para qualquer tipo de conta.
 */
class ContaBancaria
{
	protected string $titular;
	protected string $agencia;
	protected string $numero;
	protected float $saldo;

	public function __construct(string $titular, string $agencia, string $numero, float $saldoInicial = 0.0)
	{
		$titular = trim($titular);
		$agencia = trim($agencia);
		$numero = trim($numero);

		if ($titular === '') {
			throw new InvalidArgumentException('Titular nao pode ser vazio.');
		}

		if ($agencia === '' || $numero === '') {
			throw new InvalidArgumentException('Agencia e numero sao obrigatorios.');
		}

		if ($saldoInicial < 0) {
			throw new InvalidArgumentException('Saldo inicial nao pode ser negativo.');
		}

		$this->titular = $titular;
		$this->agencia = $agencia;
		$this->numero = $numero;
		$this->saldo = $saldoInicial;
	}

	public function depositar(float $valor): void
	{
		if ($valor <= 0) {
			throw new InvalidArgumentException('Deposito deve ser maior que zero.');
		}

		$this->saldo += $valor;
	}

	public function sacar(float $valor): bool
	{
		if ($valor <= 0) {
			throw new InvalidArgumentException('Saque deve ser maior que zero.');
		}

		if ($valor > $this->saldo) {
			return false;
		}

		$this->saldo -= $valor;
		return true;
	}

	public function getSaldo(): float
	{
		return $this->saldo;
	}

	protected function formatarMoeda(float $valor): string
	{
		return 'R$ ' . number_format($valor, 2, ',', '.');
	}

	public function exibirResumo(): string
	{
		return "Conta {$this->agencia}/{$this->numero} | Titular: {$this->titular} | Saldo: " . $this->formatarMoeda($this->saldo);
	}
}
