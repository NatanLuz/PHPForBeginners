<?php

require_once __DIR__ . '/contabancaria.php';

/**
 * HERANCA - PARTE 03
 *
 * ContaJuridica especializa a ContaBancaria com:
 * - CNPJ
 * - taxa administrativa por saque
 */
class ContaJuridica extends ContaBancaria
{
    private string $cnpj;
    private float $taxaSaque;

    public function __construct(
        string $titular,
        string $agencia,
        string $numero,
        string $cnpj,
        float $saldoInicial = 0.0,
        float $taxaSaque = 8.50
    ) {
        parent::__construct($titular, $agencia, $numero, $saldoInicial);

        $cnpj = trim($cnpj);
        if ($cnpj === '') {
            throw new InvalidArgumentException('CNPJ nao pode ser vazio.');
        }

        if ($taxaSaque < 0) {
            throw new InvalidArgumentException('Taxa de saque nao pode ser negativa.');
        }

        $this->cnpj = $cnpj;
        $this->taxaSaque = $taxaSaque;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function getTaxaSaque(): float
    {
        return $this->taxaSaque;
    }

    /**
     * Sobrescrita do saque:
     * total debitado = valor solicitado + taxa de saque.
     */
    public function sacar(float $valor): bool
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('Saque deve ser maior que zero.');
        }

        $totalDebito = $valor + $this->taxaSaque;

        if ($totalDebito > $this->saldo) {
            return false;
        }

        $this->saldo -= $totalDebito;
        return true;
    }

    public function exibirResumo(): string
    {
        return parent::exibirResumo()
            . " | CNPJ: {$this->cnpj} | Taxa saque: "
            . $this->formatarMoeda($this->taxaSaque);
    }
}
