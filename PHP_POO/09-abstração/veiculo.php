<?php

declare(strict_types=1);

/**
 * Classe abstrata: nao pode ser instanciada diretamente.
 *
 * Objetivo:
 * - centralizar comportamento comum de qualquer veiculo;
 * - obrigar classes filhas a implementar comportamentos especificos.
 */
abstract class Veiculo
{
	protected string $marca;
	protected string $modelo;
	protected int $ano;
	protected bool $ligado = false;
	protected int $velocidade = 0;

	public function __construct(string $marca, string $modelo, int $ano)
	{
		$marca = trim($marca);
		$modelo = trim($modelo);

		if ($marca === '' || $modelo === '') {
			throw new InvalidArgumentException('Marca e modelo sao obrigatorios.');
		}

		if ($ano < 1886) {
			throw new InvalidArgumentException('Ano invalido para veiculo.');
		}

		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->ano = $ano;
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

	public function getVelocidade(): int
	{
		return $this->velocidade;
	}

	public function exibirPainel(): string
	{
		$estado = $this->ligado ? 'Ligado' : 'Desligado';
		return "{$this->marca} {$this->modelo} ({$this->ano}) | Estado: {$estado} | Velocidade: {$this->velocidade} km/h";
	}

	// Regras especificas variam por tipo de veiculo.

    
	abstract public function acelerar(int $valor): void;

	abstract public function frear(int $valor): void;

	abstract public function tipoVeiculo(): string;
}