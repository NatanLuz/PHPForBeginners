<?php

require_once __DIR__ . '/Funcionario.php';

class Operario extends Funcionario
{
	protected int $horasExtras;
	protected float $valorHoraExtra;

	public function __construct(
		string $nome,
		float $salarioBase,
		string $departamento,
		int $horasExtras,
		float $valorHoraExtra
	) {
		parent::__construct($nome, $salarioBase, $departamento);

		if ($horasExtras < 0) {
			throw new InvalidArgumentException('Horas extras nao pode ser negativa.');
		}

		if ($valorHoraExtra < 0) {
			throw new InvalidArgumentException('Valor da hora extra nao pode ser negativo.');
		}

		$this->horasExtras = $horasExtras;
		$this->valorHoraExtra = $valorHoraExtra;
	}

	public function getHorasExtras(): int
	{
		return $this->horasExtras;
	}

	// Sobrescrita: operario recebe bonus fixo + horas extras.
	protected function calcularBonus(): float
	{
		$bonusFixo = $this->salarioBase * 0.07;
		$bonusHoraExtra = $this->horasExtras * $this->valorHoraExtra;
		return $bonusFixo + $bonusHoraExtra;
	}

	public function exibirResumo(): string
	{
		$base = $this->formatarMoeda($this->salarioBase);
		$bonus = $this->formatarMoeda($this->calcularBonus());
		$final = $this->formatarMoeda($this->calcularSalarioFinal());

		return "Operario: {$this->nome} | Departamento: {$this->departamento} | HE: {$this->horasExtras}h | Base: {$base} | Bonus: {$bonus} | Final: {$final}";
	}
}