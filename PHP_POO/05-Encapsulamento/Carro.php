<?php

/**
 * Encapsulamento 01 - Modificador PUBLIC.
 *
 * Nesta etapa, propriedades e metodos publicos podem ser acessados
 * diretamente fora da classe.
 */
class Carro
{
	// PUBLIC: acesso livre dentro e fora da classe.
	public string $modelo;
	public int $ano;
	public string $cor;
	public bool $ligado = false;
	public int $velocidade = 0;

	public function __construct(string $modelo, int $ano, string $cor)
	{
		$this->modelo = $modelo;
		$this->ano = $ano;
		$this->cor = $cor;
	}

	public function ligar(): void
	{
		$this->ligado = true;
	}

	public function desligar(): void
	{
		$this->ligado = false;
		$this->velocidade = 0;
	}

	public function acelerar(int $incremento): void
	{
		if (!$this->ligado) {
			echo "Nao e possivel acelerar: carro desligado." . PHP_EOL;
			return;
		}

		if ($incremento <= 0) {
			echo "Valor de aceleracao deve ser maior que zero." . PHP_EOL;
			return;
		}

		$this->velocidade += $incremento;
	}

	public function frear(int $decremento): void
	{
		if ($decremento <= 0) {
			echo "Valor de frenagem deve ser maior que zero." . PHP_EOL;
			return;
		}

		$this->velocidade -= $decremento;

		if ($this->velocidade < 0) {
			$this->velocidade = 0;
		}
	}

	public function exibirPainel(): string
	{
		$status = $this->ligado ? 'Ligado' : 'Desligado';
		return "Carro: {$this->modelo} ({$this->ano}) | Cor: {$this->cor} | Status: {$status} | Velocidade: {$this->velocidade} km/h";
	}
}