<?php

declare(strict_types=1);

require_once __DIR__ . '/pagamento.php';

class PayPal extends Pagamento
{
	private string $emailConta;

	public function __construct(string $descricao, string $emailConta)
	{
		parent::__construct($descricao);

		$emailConta = trim($emailConta);
		if (!filter_var($emailConta, FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Email da conta PayPal invalido.');
		}

		$this->emailConta = $emailConta;
	}

	public function processar(float $valor): string
	{
		$this->validarValor($valor);

		$taxa = $valor * 0.035;
		$total = $valor + $taxa;

		return 'PayPal | ' . $this->getDescricao()
			. ' | Conta: ' . $this->emailConta
			. ' | Total: ' . $this->formatarMoeda($total);
	}
}