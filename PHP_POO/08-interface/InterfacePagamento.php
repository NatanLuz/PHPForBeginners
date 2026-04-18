<?php

declare(strict_types=1);

/**
 * Contrato de pagamento.
 *
 * Toda classe que implementar esta interface deve obrigatoriamente
 * definir os metodos abaixo.
 */
interface InterfacePagamento
{
    public function getNomeMetodo(): string;

    public function pagar(float $valor): string;
}
