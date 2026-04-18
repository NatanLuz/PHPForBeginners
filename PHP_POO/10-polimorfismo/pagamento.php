<?php

declare(strict_types=1);

/**
 * Classe abstrata base para pagamentos.
 *
 * Polimorfismo: classes filhas implementam a mesma assinatura
 * de metodo, cada uma com regra propria.
 */
abstract class Pagamento
{
	protected string $descricao;

	public function __construct(string $descricao)
	{
		$descricao = trim($descricao);

		if ($descricao === '') {
			throw new InvalidArgumentException('Descricao do pagamento e obrigatoria.');
		}

		$this->descricao = $descricao;
	}

	public function getDescricao(): string
	{
		return $this->descricao;
	}

	protected function validarValor(float $valor): void
	{
		if ($valor <= 0) {
			throw new InvalidArgumentException('Valor do pagamento deve ser maior que zero.');
		}
	}

	protected function formatarMoeda(float $valor): string
	{
		return 'R$ ' . number_format($valor, 2, ',', '.');
	}

	abstract public function processar(float $valor): string;
}
