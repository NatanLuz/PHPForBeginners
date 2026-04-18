<?php

/**
 * Representa uma pessoa funcionaria da empresa.
 *
 * Esta classe NAO depende de Departamento para existir.
 * Isso e importante para o conceito de agregacao.
 */
class Funcionario
{
	private int $id;
	private string $nome;
	private string $cargo;
	private float $salario;

	public function __construct(int $id, string $nome, string $cargo, float $salario)
	{
		if ($id <= 0) {
			throw new InvalidArgumentException('ID deve ser maior que zero.');
		}

		if ($salario < 0) {
			throw new InvalidArgumentException('Salario nao pode ser negativo.');
		}

		$this->id = $id;
		$this->nome = $nome;
		$this->cargo = $cargo;
		$this->salario = $salario;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function getCargo(): string
	{
		return $this->cargo;
	}

	public function getSalario(): float
	{
		return $this->salario;
	}

	public function aplicarAumento(float $percentual): void
	{
		if ($percentual < 0) {
			throw new InvalidArgumentException('Percentual de aumento nao pode ser negativo.');
		}

		$this->salario += $this->salario * ($percentual / 100);
	}

	public function apresentar(): string
	{
		$salarioFormatado = number_format($this->salario, 2, ',', '.');
		return "#{$this->id} | {$this->nome} | {$this->cargo} | R$ {$salarioFormatado}";
	}
}
