<?php

declare(strict_types=1);

require_once __DIR__ . '/veiculo.php';

class Moto extends Veiculo
{
	private int $cilindradas;

	public function __construct(string $marca, string $modelo, int $ano, int $cilindradas)
	{
		parent::__construct($marca, $modelo, $ano);

		if ($cilindradas <= 0) {
			throw new InvalidArgumentException('Cilindradas devem ser maior que zero.');
		}

		$this->cilindradas = $cilindradas;
	}

	public function acelerar(int $valor): void
	{
		if (!$this->ligado) {
			echo "Nao e possivel acelerar a moto: veiculo desligado." . PHP_EOL;
			return;
		}

		if ($valor <= 0) {
			echo "Valor de aceleracao invalido para moto." . PHP_EOL;
			return;
		}

		// Moto acelera de forma mais agressiva nesta simulacao.
		$this->velocidade += (int) round($valor * 1.2);
		if ($this->velocidade > 260) {
			$this->velocidade = 260;
		}
	}

	public function frear(int $valor): void
	{
		if ($valor <= 0) {
			echo "Valor de frenagem invalido para moto." . PHP_EOL;
			return;
		}

		$this->velocidade -= $valor;
		if ($this->velocidade < 0) {
			$this->velocidade = 0;
		}
	}

	public function tipoVeiculo(): string
	{
		return 'Moto';
	}

	public function exibirPainel(): string
	{
		return parent::exibirPainel() . " | Tipo: {$this->tipoVeiculo()} | Cilindradas: {$this->cilindradas}cc";
	}
}
