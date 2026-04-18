<?php

/**
 * Encapsulamento 03 - protected.
 *
 * protected permite acesso:
 * - dentro da propria classe
 * - dentro das classes filhas (heranca)
 *
 * Nao permite acesso direto fora da hierarquia.
 */
class Funcionario
{
	protected string $nome;
	protected float $salarioBase;
	protected string $departamento;

	public function __construct(string $nome, float $salarioBase, string $departamento)
	{
		if ($salarioBase < 0) {
			throw new InvalidArgumentException('Salario base nao pode ser negativo.');
		}

		$this->nome = $nome;
		$this->salarioBase = $salarioBase;
		$this->departamento = $departamento;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function getDepartamento(): string
	{
		return $this->departamento;
	}

	public function getSalarioBase(): float
	{
		return $this->salarioBase;
	}

	/**
	 * Metodo protected para reaproveitamento nas classes filhas.
	 */
	protected function formatarMoeda(float $valor): string
	{
		return 'R$ ' . number_format($valor, 2, ',', '.');
	}

	/**
	 * Metodo que pode ser sobrescrito pelas classes filhas.
	 */
	protected function calcularBonus(): float
	{
		return $this->salarioBase * 0.05;
	}

	public function calcularSalarioFinal(): float
	{
		return $this->salarioBase + $this->calcularBonus();
	}

	public function exibirResumo(): string
	{
		$base = $this->formatarMoeda($this->salarioBase);
		$bonus = $this->formatarMoeda($this->calcularBonus());
		$final = $this->formatarMoeda($this->calcularSalarioFinal());

		return "Funcionario: {$this->nome} | Departamento: {$this->departamento} | Base: {$base} | Bonus: {$bonus} | Final: {$final}";
	}
}
