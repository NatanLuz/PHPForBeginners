<?php

declare(strict_types=1);

require_once __DIR__ . '/pagamento.php';

class Boleto extends Pagamento
{
	private int $diasVencimento;

	public function __construct(string $descricao, int $diasVencimento = 3)
	{
		parent::__construct($descricao);

		if ($diasVencimento <= 0) {
			throw new InvalidArgumentException('Dias para vencimento deve ser maior que zero.');
		}

		$this->diasVencimento = $diasVencimento;
	}

	public function processar(float $valor): string
	{
		$this->validarValor($valor);

		// Exemplo didatico: pagamento no boleto com desconto de 2%.
		$desconto = $valor * 0.02;
		$total = $valor - $desconto;

		return 'Boleto | ' . $this->getDescricao()
			. ' | Vence em: ' . $this->diasVencimento . ' dias'
			. ' | Total: ' . $this->formatarMoeda($total);
	}
}
