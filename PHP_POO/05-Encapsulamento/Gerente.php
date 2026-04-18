<?php

require_once __DIR__ . '/Funcionario.php';

class Gerente extends Funcionario
{
	protected int $quantidadeEquipe;

	public function __construct(string $nome, float $salarioBase, string $departamento, int $quantidadeEquipe)
	{
		parent::__construct($nome, $salarioBase, $departamento);

		if ($quantidadeEquipe < 0) {
			throw new InvalidArgumentException('Quantidade da equipe nao pode ser negativa.');
		}

		$this->quantidadeEquipe = $quantidadeEquipe;
	}

	public function getQuantidadeEquipe(): int
	{
		return $this->quantidadeEquipe;
	}

	// Sobrescrita: gerente tem bonus maior.
	protected function calcularBonus(): float
	{
		$bonusFixo = $this->salarioBase * 0.15;
		$bonusPorEquipe = $this->quantidadeEquipe * 120;
		return $bonusFixo + $bonusPorEquipe;
	}

	public function exibirResumo(): string
	{
		$base = $this->formatarMoeda($this->salarioBase);
		$bonus = $this->formatarMoeda($this->calcularBonus());
		$final = $this->formatarMoeda($this->calcularSalarioFinal());

		return "Gerente: {$this->nome} | Departamento: {$this->departamento} | Equipe: {$this->quantidadeEquipe} | Base: {$base} | Bonus: {$bonus} | Final: {$final}";
	}
}
