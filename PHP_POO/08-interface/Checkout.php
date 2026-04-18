<?php

declare(strict_types=1);

require_once __DIR__ . '/InterfacePagamento.php';

/**
 * Classe de servico que depende da interface,
 * nao de uma implementacao especifica.
 */
class Checkout
{
    private InterfacePagamento $metodoPagamento;

    public function __construct(InterfacePagamento $metodoPagamento)
    {
        $this->metodoPagamento = $metodoPagamento;
    }

    public function finalizar(float $valor): string
    {
        return $this->metodoPagamento->pagar($valor);
    }

    public function resumoMetodo(): string
    {
        return 'Metodo selecionado: ' . $this->metodoPagamento->getNomeMetodo();
    }
}
