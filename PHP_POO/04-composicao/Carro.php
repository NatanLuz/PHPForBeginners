<?php

require_once __DIR__ . '/Motor.php';

/**
 * Carro e o objeto principal.
 *
 * Composicao: o Motor e criado dentro do Carro e faz parte dele.
 * O Carro controla ciclo de vida e comportamento do Motor.
 */
class Carro
{
	private string $modelo;
	private int $ano;
	private Motor $motor;
	private int $velocidadeAtual = 0;

	public function __construct(string $modelo, int $ano, int $cilindradasMotor, string $combustivel)
	{
		if ($ano < 1886) {
			throw new InvalidArgumentException('Ano invalido para um carro.');
		}

		$this->modelo = $modelo;
		$this->ano = $ano;

		// Ponto chave da composicao: o Carro cria o Motor internamente.
		$this->motor = new Motor($cilindradasMotor, $combustivel);
	}

	public function ligarCarro(): void
	{
		$this->motor->ligar();
	}

	public function desligarCarro(): void
	{
		$this->velocidadeAtual = 0;
		$this->motor->desligar();
	}

	public function acelerar(int $incremento): void
	{
		if (!$this->motor->estaLigado()) {
			echo "Nao e possivel acelerar: carro desligado." . PHP_EOL;
			return;
		}

		if ($incremento <= 0) {
			echo "Incremento de aceleracao deve ser positivo." . PHP_EOL;
			return;
		}

		$this->velocidadeAtual += $incremento;
	}

	public function frear(int $decremento): void
	{
		if ($decremento <= 0) {
			echo "Decremento de frenagem deve ser positivo." . PHP_EOL;
			return;
		}

		$this->velocidadeAtual -= $decremento;
		if ($this->velocidadeAtual < 0) {
			$this->velocidadeAtual = 0;
		}
	}

	public function getVelocidadeAtual(): int
	{
		return $this->velocidadeAtual;
	}

	// Exibe um resumo completo do objeto principal e do objeto interno.
	public function exibirPainel(): string
	{
		return "Carro: {$this->modelo} ({$this->ano}) | Velocidade: {$this->velocidadeAtual} km/h | " . $this->motor->descrever();
	}
}
