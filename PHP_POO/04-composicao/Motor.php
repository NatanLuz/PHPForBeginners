<?php

/**
 * Classe interna do Carro.
 *
 * Em composicao, Motor faz parte do Carro e nao e compartilhado externamente.
 */
class Motor
{
	private int $cilindradas;
	private string $tipoCombustivel;
	private bool $ligado = false;

	public function __construct(int $cilindradas, string $tipoCombustivel)
	{
		if ($cilindradas <= 0) {
			throw new InvalidArgumentException('Cilindradas devem ser maior que zero.');
		}

		$tiposAceitos = ['gasolina', 'etanol', 'flex', 'diesel', 'eletrico'];
		if (!in_array(strtolower($tipoCombustivel), $tiposAceitos, true)) {
			throw new InvalidArgumentException('Tipo de combustivel invalido.');
		}

		$this->cilindradas = $cilindradas;
		$this->tipoCombustivel = strtolower($tipoCombustivel);
	}

	public function ligar(): void
	{
		$this->ligado = true;
	}

	public function desligar(): void
	{
		$this->ligado = false;
	}

	public function estaLigado(): bool
	{
		return $this->ligado;
	}

	public function getCilindradas(): int
	{
		return $this->cilindradas;
	}

	public function getTipoCombustivel(): string
	{
		return $this->tipoCombustivel;
	}

	public function descrever(): string
	{
		$estado = $this->ligado ? 'ligado' : 'desligado';
		return "Motor {$this->cilindradas}cc ({$this->tipoCombustivel}) - {$estado}";
	}
}