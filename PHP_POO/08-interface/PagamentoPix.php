<?php

declare(strict_types=1);

require_once __DIR__ . '/InterfacePagamento.php';

class PagamentoPix implements InterfacePagamento
{
    private string $chavePix;

    public function __construct(string $chavePix)
    {
        $chavePix = trim($chavePix);

        if ($chavePix === '') {
            throw new InvalidArgumentException('Chave PIX nao pode ser vazia.');
        }

        $this->chavePix = $chavePix;
    }

    public function getNomeMetodo(): string
    {
        return 'PIX';
    }

    public function pagar(float $valor): string
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('Valor do pagamento deve ser maior que zero.');
        }

        $valorFormatado = number_format($valor, 2, ',', '.');
        return "Pagamento PIX aprovado | Chave: {$this->chavePix} | Valor: R$ {$valorFormatado}";
    }
}
