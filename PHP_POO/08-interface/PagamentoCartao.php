<?php

declare(strict_types=1);

require_once __DIR__ . '/InterfacePagamento.php';

class PagamentoCartao implements InterfacePagamento
{
    private string $bandeira;
    private string $finalCartao;

    public function __construct(string $bandeira, string $finalCartao)
    {
        $bandeira = trim($bandeira);
        $finalCartao = trim($finalCartao);

        if ($bandeira === '') {
            throw new InvalidArgumentException('Bandeira do cartao nao pode ser vazia.');
        }

        if (!preg_match('/^\d{4}$/', $finalCartao)) {
            throw new InvalidArgumentException('Final do cartao deve conter 4 digitos.');
        }

        $this->bandeira = $bandeira;
        $this->finalCartao = $finalCartao;
    }

    public function getNomeMetodo(): string
    {
        return 'Cartao';
    }

    public function pagar(float $valor): string
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('Valor do pagamento deve ser maior que zero.');
        }

        $taxa = $valor * 0.025;
        $valorFinal = $valor + $taxa;

        $valorFormatado = number_format($valorFinal, 2, ',', '.');
        return "Pagamento Cartao aprovado | {$this->bandeira} final {$this->finalCartao} | Valor com taxa: R$ {$valorFormatado}";
    }
}
