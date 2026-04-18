<?php

declare(strict_types=1);

require_once __DIR__ . '/veiculo.php';

class Carro extends Veiculo
{
	private int $portas;

	public function __construct(string $marca, string $modelo, int $ano, int $portas)
	{
		parent::__construct($marca, $modelo, $ano);

		if ($portas <= 0) {
			throw new InvalidArgumentException('Quantidade de portas deve ser maior que zero.');
		}

		$this->portas = $portas;
	}

	public function acelerar(int $valor): void
	{
		if (!$this->ligado) {
			echo "Nao e possivel acelerar o carro: veiculo desligado." . PHP_EOL;
			return;
		}

		if ($valor <= 0) {
			echo "Valor de aceleracao invalido para carro." . PHP_EOL;
			return;
		}

		// Carro acelera de forma mais progressiva nesta simulacao.
		$this->velocidade += $valor;
		if ($this->velocidade > 220) {
			$this->velocidade = 220;
		}
	}

	public function frear(int $valor): void
	{
		if ($valor <= 0) {
			echo "Valor de frenagem invalido para carro." . PHP_EOL;
			return;
		}

		$this->velocidade -= $valor;
		if ($this->velocidade < 0) {
			$this->velocidade = 0;
		}
	}

	public function tipoVeiculo(): string
	{
		return 'Carro';
	}

	public function exibirPainel(): string
	{
		return parent::exibirPainel() . " | Tipo: {$this->tipoVeiculo()} | Portas: {$this->portas}";
	}
}
